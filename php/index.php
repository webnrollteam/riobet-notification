<?php

use Google\Auth\ApplicationDefaultCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

include 'vendor/autoload.php';

// specify the path to your application credentials
putenv('GOOGLE_APPLICATION_CREDENTIALS=./riobet-7585b-fedb02b78d3b.json');

// define the scopes for your API call
$scopes = ['https://www.googleapis.com/auth/firebase.messaging'];

// create middleware
$middleware = ApplicationDefaultCredentials::getMiddleware($scopes);
$stack = HandlerStack::create();
$stack->push($middleware);

// create the HTTP client
$client = new Client([
  'handler' => $stack,
  'base_uri' => 'https://fcm.googleapis.com',
  'auth' => 'google_auth'  // authorize all requests
]);

$registrationToken = 'elRe57LSH94:APA91bEOjGtcl8FalwTBmXfB233MpJqAOzXlgSvV1ZIBxCQTSjxnCZ0KuvD_k59czC9WOYGqV4MSt8LzapKt8lbBu_K0wkkaGnIuL3v9BTk-h8Fe506XMKqP57U2skj3N8mxTxFqQ1qA';

$payload = [
  "message" => [
    "notification" => [
      "title" => $_POST['title'],
      "body" => $_POST['body']
    ],
    "token" => $_POST['token'],
  ],
];

// make the request
$response = $client->post(
  'v1/projects/riobet-7585b/messages:send',
  [
    'json' => $payload,
  ]
);

// show the result!
print_r((string) $response->getBody());
