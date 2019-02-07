<?php

/**
 *  Class DsGetCustomerAccountById
 *  Get a customer account by id
 */
class DsGetCustomerAccountById
{
    public $Id;
    public $User;
    public $AccountReferenceNo;
    public $ExternalAccountReferenceNo;
    public $RequestInitiator;

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