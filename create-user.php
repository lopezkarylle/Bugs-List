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
  "username": "lopezkarylle",
  "password": "imnayeon22",
  "real_name": "Karylle L. Lopez",
  "email": "lopez.karylle@auf.edu.ph",
  "access_level": {
    "name": "updater"
  },
  "enabled": false,
  "protected": false
}';
$request = new Request('POST', 'https://ipt10-2022.mantishub.io/api/rest/users/', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
