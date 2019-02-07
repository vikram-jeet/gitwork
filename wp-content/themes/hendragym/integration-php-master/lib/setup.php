<?php
/**
 * This file loads dependencies and setups constants
 */

defined("USER") || define("USER", "");
defined("PASS") || define("PASS", "");
defined("CONTRACT_PREFIX") || define("CONTRACT_PREFIX", "");
defined("DS_WSDL") || define("DS_WSDL", "https://oc-test.services.debitsuccess.com/DSWebService/DSServices.svc?wsdl");

/**
 * This function is using to autoload DS classes
 */
spl_autoload_register(function ($class_name) {
    try{
        require_once 'class_'. $class_name . '.php';
    }catch (Exception $err){
        throw new Exception("Unable to load $class_name." . "Reason: " . $err->getMessage());
    }
});

/**
 * This functions handles json input
 * @param $object JsonSerializable a JSON request from Angulat
 * @return array
 */
function HandleJsonObject($object){
    $request = array();
    foreach ($object as $key => $value) {
        if(!is_object($value)){
            $request[$key] = $value;
        }else{
            $request[$key] = $value->value;
        }
    }
    return $request;
}