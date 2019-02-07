<?php

/**
 *  Class DsGetCustomerAccountsForDateRange
 *  Get customer accounts for a date range
 */
class DsGetCustomerAccountsForDateRange
{
    public $Id;
    public $User;
    public $AccountReferenceNo;
    public $EndDate;
    public $ExternalAccountReferenceNo;
    public $RequestInitiator;
    public $StartDate;

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