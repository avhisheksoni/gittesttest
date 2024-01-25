<?php
header('Content-Type: application/json');

// Specify the path to your CSV file
 $csvFile = $_FILES['file']['tmp_name'];


// Open the CSV file for reading
$file = fopen($csvFile, 'r');

// Check if the file is successfully opened
if ($file !== false) {
    // Initialize an empty array to store the data
    $data = array();

    // Loop through each row in the CSV file
    while (($row = fgetcsv($file)) !== false) {
        // Add the row data to the array
        $data[] = $row;
    }

    // Close the file
    fclose($file);

    // Display the imported data (you can modify this part based on your needs)
    $dataget = '885909950805';
    // print_r($data[1]);




    // https://api.upcitemdb.com/prod/trial/lookup?upc=0885909950805

} else {
    // Handle error if the file cannot be opened
    echo 'Unable to open file';
}

header("Content-Type: application/json");
$user_key = 'only_for_dev_or_pro';
$endpoint = 'https://api.upcitemdb.com/prod/trial/lookup';

$ch = curl_init();
/* if your client is old and doesn't have our CA certs
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);*/
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
curl_setopt($ch,CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  // "user_key: $user_key",
  // "key_type: 3scale",
  "Accept: application/json",
  "Accept-Encoding: gzip,deflate"
));

// HTTP GET
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_URL, $endpoint.'?upc='.$dataget);
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if ($httpcode != 200)
  echo "error status $httpcode...\n";
else 

  //echo $response;
$response2 = file_get_contents($endpoint.'?upc='.$dataget);
// $jsonData = trim(substr($response2, strpos($response2, '{')));

echo $response2;

// $dataArray = json_decode($response2, true);
// if ($dataArray === null) {
//     // Handle decoding errors
//     die('Error decoding JSON data');
// }

// $csvFilePath = 'output.csv';

// // Open the CSV file for writing
// $csvFile = fopen($csvFilePath, 'w');

// // Write header row if needed (optional)
// $header = array_keys($dataArray[0]);
// fputcsv($csvFile, $header);

// // Write data rows
// foreach ($dataArray as $row) {
//     fputcsv($csvFile, $row);
// }

// // Close the CSV file
// fclose($csvFile);
/* if you need to run more queries, do them in the same connection.
 * use rawurlencode() instead of URLEncode(), if you set search string
 * as url query param
 * for search requests, change to sleep(6)
 */
sleep(2);
// proceed with other queries
curl_close($ch);


?>
