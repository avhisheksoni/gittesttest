<?php


$apiUrl = 'http://localhost:8000/api/useredit/3';

// Make the HTTP request using file_get_contents
$response = file_get_contents($apiUrl);

// Check for errors or handle API response validation here

// Decode the JSON response
$dataArray = json_decode($response, true);

// Check for JSON decoding errors
if ($dataArray === null && json_last_error() !== JSON_ERROR_NONE) {
    // Handle decoding errors
    die('Error decoding JSON data: ' . json_last_error_msg());
}

// Now $dataArray contains the data as an associative array
print_r($dataArray);

     // $ch = curl_init();


     // $csvFile = $_FILES['file']['tmp_name'];
     // $endpoint = "http://127.0.0.1:8000/api/useredit/3" 
     // curl_setopt($ch, CURLOPT_URL, $endpoint);
     // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     // $resp	= curl_exec($ch);

     // if($e = curl_error($ch)){
     // 	echo $e;
     // }
     // else{
     // 	$decode = json_decode($resp);
     // 	print_r($decode);
     // }

     // curl_close($ch);


// Open the CSV file for reading
// $file = fopen($csvFile, 'r');

// // Check if the file is successfully opened
// if ($file !== false) {
//     // Initialize an empty array to store the data
//     $data = array();

//     // Loop through each row in the CSV file
//     while (($row = fgetcsv($file)) !== false) {
//         // Add the row data to the array
//         $data[] = $row;
//     }

//     // Close the file
//     fclose($file);

//     // Display the imported data (you can modify this part based on your needs)
//     // $dataget = '885909950805';
//     print_r($data);

//     } else {
//     // Handle error if the file cannot be opened
//     echo 'Unable to open file';
// }
// echo $endpoint;

?>