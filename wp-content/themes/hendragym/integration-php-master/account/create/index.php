<?php
    // Load libraries and handle request data
    require_once '../../lib/setup.php';
    $postdata = json_decode(file_get_contents('php://input'));
    $request = HandleJsonObject($postdata);
    // Prepare the request
    $user = new DSUser(USER, PASS);
    $request['ContractPrefix'] = CONTRACT_PREFIX;
    $postRequestObj = new DSRequestPostCustomerAccount($request);
    $request = new DSWebServiceRequest($user, DS_WSDL);
    // Send the request
    $request->PreparePostAccountRequestFromArray($postRequestObj);
    // Handle a result
    $result = $request->WebServicesRequest('PostCustomerAccount');
    if ($request->GetRequestStatus() == 'Failed'){
        $response = $request->PrepareJsonErrorMessageFromResponse();
    }else{
        $response = $result;
    }
    // Return the result
    echo json_encode(array('response'=>$response));
