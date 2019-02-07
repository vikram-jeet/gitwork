<?php

/**
 * Class DSRequestPostCustomerAccount
 * Create and post a customer account
 */
class DSRequestPostCustomerAccount
{
    public $Id;
    public $User;
    public $AccountCode;
    public $AccountCountry;
    public $AccountHolder;
    public $AccountNo;
    public $AccountNotes;
    public $AccountType;
    public $BillingAddress;
    public $BillingCity;
    public $BillingCountry;
    public $BillingLocality;
    public $BillingPostcode;
    public $BillingState;
    public $BillingSuburb;
    public $BusinessNumber;
    public $BusinessSTD;
    public $BusinessCountryCode;
    public $ContractPrefix;
    public $CreditCardType;
    public $DateAccountStarted;
    public $DateCreated;
    public $DateOfBirth;
    public $EmailAddress;
    public $EmergencyName;
    public $EmergencyNumber;
    public $EmergencySTD;
    public $EmergencyCountryCode;
    public $ExpiryDate;
    public $ExternalAccountReferenceNo;
    public $Gender;
    public $FirstName;
    public $FixedTerm;
    public $HomeNumber;
    public $HomeSTD;
    public $HomeCountryCode;
    public $InitialOneOffScheduleDescription;
    public $InitialOneOffScheduleInstalment;
    public $InitialOneOffScheduleStartDate;
    public $LastName;
    public $MiddleName;
    public $MobileNumber;
    public $MobileSTD;
    public $MobileCountryCode;
    public $PhysicalAddress;
    public $PhysicalCity;
    public $PhysicalCountry;
    public $PhysicalLocality;
    public $PhysicalPostcode;
    public $PhysicalState;
    public $PhysicalSuburb;
    public $RecurringScheduleDescription;
    public $RecurringScheduleFrequency;
    public $RecurringScheduleInstalment;
    public $RecurringScheduleStartDate;
    public $RequestInitiator;
    public $Term;
    public $TermType;
    public $Title;
    public $FixTotalValue;
    public $TotalValue;
    public $WaiveEstFee;

    public function __construct($propertyArray)
    {
        foreach ($propertyArray as $key => $value){
            $this->$key = filter_var ($value, FILTER_SANITIZE_STRING);
        }
    }

    public function __get( $key )
    {
        return $this->$key;
    }

    public function __set( $key, $value )
    {
        $this->$key = $value;
    }
}