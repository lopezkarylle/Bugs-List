<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client();
$headers = [
  'Authorization' => 'n2SiB6v7UAqknYr52n5-d-yagXVEtYbR',
  'Content-Type' => 'application/json'
];
$body = '{
  "text": "lopez.karylle@auf.edu.ph",
  "view_state": {
    "name": "public"
  }
}';
$request = new Request('POST', 'https://ipt10-2022.mantishub.io/api/rest/issues/16/notes', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
