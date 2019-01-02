<?php
// Construct an HTTP POST request
$clientlogin_url = "https://www.google.com/accounts/ClientLogin";
$clientlogin_post = array(
    "accountType" => "HOSTED_OR_GOOGLE",
    "Email" => "aoperations01@gmail.com",
    "Passwd" => "Inurture123",
    "service" => "writely",
    "source" => "ABCD"
);

// Initialize the curl object
$curl = curl_init($clientlogin_url);

// Set some options (some for SHTTP)
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $clientlogin_post);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// Execute
$response = curl_exec($curl);

// Get the Auth string and save it
preg_match("/Auth=([a-z0-9_-]+)/i", $response, $matches);
$auth = $matches[1];

echo "The auth string is: " . $auth;

//ClientLogin assumes you login once and use the auth string for all on-going requests (more info: ClientLogin – Google Code). Here’s a simple example of how to retrieve some data //from a Google Docs account, show filename, author and file type. Make sure the simplexml php extension is installed and activated.

// Include the Auth string in the headers
// Together with the API version being used

$headers = array(
    "Authorization: GoogleLogin auth=" . $auth,
    "GData-Version: 3.0",
);

// Make the request
curl_setopt($curl, CURLOPT_URL, "https://drive.google.com/drive/folders/1ycOpyn1SQp4vBRyLVfgvhwpU--evPd6j?ogsrc=32");
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, false);

$response = curl_exec($curl);
curl_close($curl);
echo $response;
// Parse the response
/* $response = simplexml_load_string($response);

// Output data
foreach($response->entry as $file) {
	echo "File: " . $file->title . "<br />";
	echo "Type: " . $file->content["type"] . "<br />";
	echo "Author: " . $file->author->name . "<br /><br />";
} */
?>