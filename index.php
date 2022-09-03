<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

define('TOKEN', 'n2SiB6v7UAqknYr52n5-d-yagXVEtYbR');
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/');

$client = new Client();
$headers = [
  'Authorization' => TOKEN
];
$request = new Request('GET', MANTISHUB_URL.'api/rest/issues?page_size=10&page=1', $headers);
$res = $client->sendAsync($request)->wait();
$bugs = $res->getBody()->getContents();



$bugs_list = json_decode($bugs);
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>IPT10 Bugs</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
    body {
        color: #000000;
        background: #f5f5f5;
		font-family: 'Roboto', sans-serif;
	}
    .table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
		min-width: 1000px;
        background: #fff;
        padding: 20px;        
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 8px 0 0;
        font-size: 22px;
    }
 
        
</style>

</head>
<body>

    <div class="container">
        <div class="table">
            <div class="table-wrapper">
                <div class="table-title">
                <div class="row">
                <div class="col-sm-8"><h1><b>IPT10 Bugs List</b></h1></div>
                <div class="col-sm-8"><h2><b><a href="#">Lopez, Karylle L.</a></b></h2></div>
                <div class="col-sm-4">
                </div>
            </div>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Summary</th>
                            <th>Severity</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            foreach ($bugs_list->issues as $bug):
                        ?>
                        <tr>
                        <td><?=$bug->id;?></td>
                        <td><?=$bug->summary;?></td>
                        <td><?=$bug->severity->name;?></td>
                        <td><?=$bug->status->name;?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>        
    </div>     
</body>
</html>
