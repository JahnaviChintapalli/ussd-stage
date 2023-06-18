<?php

function greetings() {
    echo "Hello World!";
};


function lifeQuotes() {
    // $name = $_POST['name'];
    // $email = $_POST['email'];
    echo 'in';

    // Step 4: Prepare and send the request
    $apiUrl = 'https://leadmiddlewarestaging.insurancedekho.com/api/life/v1/quotes?'; 
    // $apiUrl = "https://brokeragemasterstaging.insurancedekho.com/api/v1/master/get-life-coverage-details"

    // $data = [
    //     'age' => 26,
    //     'annualIncome' => "1000000",
    //     'occupationCode' => "salaried",
    //     'policyTerm' => 27,
    // ];

    $jsonData = ["leadId"=> "648b14ac0a97d846d1406425",
    "planType"=> "term",
    "payType"=> "regular_pay",
    "returnType"=> "lump_sum",
    "paymentMode"=> "monthly",
    "source"=> "B2C",
    "subSource"=> "INSURANCE-DEKHO",
    "medium"=> "INSURANCE-DEKHO",
    "dob"=> "1999-07-20T00:00:00.000Z",
    "gender"=> "M",
    "isTobacco"=> "0",
    "annualIncome"=> "1000000",
    "annualIncomeDisplayName"=> "10 Lac to 14.9 Lac",
    "occupation"=> "salaried",
    "educationQualification"=> "graduate",
    "sumAssured"=> 20000000,
    "coverUpto"=> 50,
    "customerName"=> "test lead",
    "occupationDisplayName"=> "Salaried",
    "educationQualificationDisplayname"=> "College graduate & above",
    "subPlanType"=> "base",
    "isdetailsUpdated"=> 0,
    "pincode"=> "122010",
    "currentStep"=> "quote",
    "isNri"=> 0];
    // $jsonData = {
    //     "age": 23,
    //     "annualIncome": "1000000",
    //     "occupationCode": "salaried",
    //     "policyTerm": 27
    // }
    // echo $jsonData;
    // print_r($jsonData);
    $reqData = json_encode($jsonData);
    // $options = [
    //     'http' => [
    //         'header'  => "Content-type: application/json",
    //         'method'  => 'POST',
    //         'content' => http_build_query($data),
    //     ],
    // ];
    $headers = [
        'header'  => "Content-type: application/json",
    ];
    // $context  = stream_context_create($options);
    // $response = file_get_contents($apiUrl, false, $context);
    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $reqData);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($curl);

    if ($response === false) {
        echo "ERROR>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>";
        echo 'Error: ' . curl_error($curl);
    } else {
        // Process the response as needed
        echo "Res>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>";
        print_r(json_decode($response));
    }

    curl_close($curl);
}



?>