<?php
    // Load libraries and handle request data
    require_once '../../lib/setup.php';
    $getData     = json_decode(file_get_contents('php://input'));
    $requestData = HandleJsonObject($getData);
    // Prepare the request
    $user = new DSUser(USER, PASS);
    if ($requestData['Method'] == 'GetCustomerAccountByAccountId')
    {
        $getRequestObj = new DsGetCustomerAccountById($requestData);
    }
    elseif ($requestData['Method'] == 'GetCustomerAccountForDateRange')
    {
        $getRequestObj = new DsGetCustomerAccountsForDateRange($requestData);
    }
    $request = new DSWebServiceRequest($user, DS_WSDL);
    // Send the request
    $request->PrepareRequestWithoutDateFromArray($getRequestObj);
    // Handle a result
    $result = $request->WebServicesRequest($requestData['Method']);
    if ($request->GetRequestStatus() == 'Failed'){
        $response = $request->PrepareJsonErrorMessageFromResponse();
    }else{
        $response = $result;
    }
    // Return the result
    echo json_encode(array('response'=>$response));
