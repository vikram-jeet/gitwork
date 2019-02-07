<?php

/**
 * Class DSWebServiceRequest
 * This class a common class to send SOAP request to DebitSuccess Web Services
 */

class DSWebServiceRequest
{
    private $user;
    private $endpoint;
    protected $request;
    protected $result;

    public function __get( $key )
    {
        return $this->request[ $key ];
    }

    public function __set( $key, $value )
    {
        $this->request[ $key ] = $value;
    }


    public function __construct($user, $endpoint)
    {
        $this->user = $user;
        $this->endpoint = $endpoint;
    }

    /**
     * Prepare request for posting a customer account
     * @param $args object - parameters which is strongly named
     */
    public function PreparePostAccountRequestFromArray($args){
        $args->User = $this->user;
        foreach ($args as $key => $value){
            if (isset($value)){
                $this->request[$key] = $value;
            }
        }
        $this->ChangeDatesFormat();
    }

    /**
     * Prepare request without date fields
     * @param $args object - parameters which is strongly named
     */
    public function PrepareRequestWithoutDateFromArray($args){
        $args->User = $this->user;
        foreach ($args as $key => $value){
            if (isset($value)){
                $this->request[$key] = $value;
            }
        }
    }

    /**
     * Send a SOAP request to DebitSuccess' WebService
     *
     * @return object | string answer object from the WebService or an error message
     */
    public function WebServicesRequest($operation){
        try{
            $client = new SoapClient($this->endpoint);
            $response = $client->$operation(array("request"=>$this->request));
            $this->result = $response;
        }catch(Exception $e){
            $this->result = "Code: ". $e->getCode() . ". Message: " . $e->getMessage();
        }
        return $this->result;
    }

    /**
     * Get a status message from a response
     * @return string  - the status field from the response message
     */
    public function GetRequestStatus(){
        $status = '';
        try{
            if(isset($this->result->PostCustomerAccountResult->Status)){
                $status = $this->result->PostCustomerAccountResult->Status;
            }
        }catch (Exception $e){
            $status = "Something went wrong, a status field was missing, check you request.";
        }
        return $status;
    }

    /**
     * If request failed - get all error messages from DebitSuccess response
     * @return string JSON object
     */
    public function PrepareJsonErrorMessageFromResponse(){
        $notes = $this->result->PostCustomerAccountResult->ResponseNotes->ResponseMessageNote;
        $array = [];
        if (!is_array($notes)){
            $array = $this->AddNoteToArray($array, $notes);
        }else{
            foreach ($notes as $note){
                $array = $this->AddNoteToArray($array, $note);
            }
        }
        return json_encode($array);
    }

    /**
     * Add error notes from DS response to array
     * @param $array - array of DS notes
     * @param $note - the current error note
     * @return mixed - array of DS notes with one more error note
     */
    private function AddNoteToArray($array, $note){
        array_push($array, array(
                'NoteType' => $note->NoteType,
                'Code' => $note->Code,
                'Note' => $note->Note
            )
        );
        return $array;
    }

    /**
     * All the dates in your request should be formatted as YYYY-MM-DD
     * Also do not forget setup a right time zone
     * The list of supported timezones
     * http://php.net/manual/en/timezones.php
     */
    private function ChangeDatesFormat(){
        date_default_timezone_set('Pacific/Auckland');
        if (isset($this->request['DateOfBirth'])){
            $this->request['DateOfBirth'] = $this->PrepareDateFormat($this->request['DateOfBirth']);
        }
        // If the start date is not specified explicitly set it up from tomorrow
        if (isset($this->request->DateAccountStarted)){
            $this->request->DateAccountStarted = $this->PrepareDateFormat($this->request->DateAccountStarted);
        }else{
            $today = date("Y-m-d");
            $this->request['DateAccountStarted'] = date("Y-m-d", strtotime($today . "+1 days"));
        }
        // If the first day of payments is not specified set it up equal to the DateAccountStarted
        if (isset($this->request['RecurringScheduleStartDate']) && ($this->request['RecurringScheduleStartDate']) != ''){
            $this->request['RecurringScheduleStartDate'] = $this->PrepareDateFormat($this->request['RecurringScheduleStartDate']);
        }else{
            $this->request['RecurringScheduleStartDate'] = $this->request['DateAccountStarted'];
        }
    }

    /**
     * Convert the date, which is given as a string to YYYY-DD-MM format
     *
     * @param $date string the date in format accepted by date().
     * @return bool|string date in YYYY-MM-DD format or FALSE on failure
     */
    private function PrepareDateFormat($date){
        $dateObj = new DateTime($date);
        return date_format($dateObj,"Y-m-d");
    }   
    
}