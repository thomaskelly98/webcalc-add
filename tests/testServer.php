<?php
echo "Test Script Starting\n";

use GuzzleHttp\Client;

$client = new Client();


// no params
$response = $client->get('http://0.0.0.0:9000');
$body = $response->getBody();

$expect_response = json_encode(array(
	"error" => true,
	"string" => "Param x is missing",
	"answer" => 0
));
if ($body==$expect_response)
{
    echo "Test Passed\n";
}
else
{
    echo "Test Failed\n";
    echo "Expected response: ";
    echo $expect_response;
    echo "\nActual Response: ";
    echo $body;
    exit(1); // exit code not zero - error
}

// x empty
$response = $client->get('http://0.0.0.0:9000/?x=');
$body = $response->getBody();

$expect_response = json_encode(array(
	"error" => true,
	"string" => "Param x is missing",
	"answer" => 0
));
if ($body==$expect_response)
{
    echo "Test Passed\n";
}
else
{
    echo "Test Failed\n";
    echo "Expected response: ";
    echo $expect_response;
    echo "\nActual Response: ";
    echo $body;
    exit(1); // exit code not zero - error
}

// no x
$response = $client->get('http://0.0.0.0:9000/?y=12');
$body = $response->getBody();

$expect_response = json_encode(array(
	"error" => true,
	"string" => "Param x is missing",
	"answer" => 0
));
if ($body==$expect_response)
{
    echo "Test Passed\n";
}
else
{
    echo "Test Failed\n";
    echo "Expected response: ";
    echo $expect_response;
    echo "\nActual Response: ";
    echo $body;
    exit(1); // exit code not zero - error
}

// y empty
$response = $client->get('http://0.0.0.0:9000/?x=12&y=');
$body = $response->getBody();

$expect_response = json_encode(array(
	"error" => true,
	"string" => "Param y is missing",
	"answer" => 0
));
if ($body==$expect_response)
{
    echo "Test Passed\n";
}
else
{
    echo "Test Failed\n";
    echo "Expected response: ";
    echo $expect_response;
    echo "\nActual Response: ";
    echo $body;
    exit(1); // exit code not zero - error
}

// no y
$response = $client->get('http://0.0.0.0:9000/?x=12');
$body = $response->getBody();

$expect_response = json_encode(array(
	"error" => true,
	"string" => "Param y is missing",
	"answer" => 0
));
if ($body==$expect_response)
{
    echo "Test Passed\n";
}
else
{
    echo "Test Failed\n";
    echo "Expected response: ";
    echo $expect_response;
    echo "\nActual Response: ";
    echo $body;
    exit(1); // exit code not zero - error
}

// x as string
$response = $client->get('http://0.0.0.0:9000/?x=the&y=12');
$body = $response->getBody();

$expect_response = json_encode(array(
	"error" => true,
	"string" => "Param x is not an integer",
	"answer" => 0
));
if ($body==$expect_response)
{
    echo "Test Passed\n";
}
else
{
    echo "Test Failed\n";
    echo "Expected response: ";
    echo $expect_response;
    echo "\nActual Response: ";
    echo $body;
    exit(1); // exit code not zero - error
}

// y as string
$response = $client->get('http://0.0.0.0:9000/?x=12&y=the');
$body = $response->getBody();

$expect_response = json_encode(array(
	"error" => true,
	"string" => "Param y is not an integer",
	"answer" => 0
));
if ($body==$expect_response)
{
    echo "Test Passed\n";
}
else
{
    echo "Test Failed\n";
    echo "Expected response: ";
    echo $expect_response;
    echo "\nActual Response: ";
    echo $body;
    exit(1); // exit code not zero - error
}

// valid input
$response = $client->get('http://0.0.0.0:9000/?x=12&y=12');
$body = $response->getBody();

$expect_response = json_encode(array(
	"error" => false,
	"string" => "12+12=24",
	"answer" => 24
));
if ($body==$expect_response)
{
    echo "Test Passed\n";
}
else
{
    echo "Test Failed\n";
    echo "Expected response: ";
    echo $expect_response;
    echo "\nActual Response: ";
    echo $body;
    exit(1); // exit code not zero - error
}

echo "\n\nAll tests passed.\n";
exit(0); // exit code 0 - success