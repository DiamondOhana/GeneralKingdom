<?php

require "getToken.php";

$clientId = '81534202.8b97503a01e9021c236295ce656ee6b653ef7c7601c04f2b26309fb3c77baa16';
$clientSecret = 'ef164d71f72c04046c93d82442aefed1986ee6ac4eba25342861b47612d891fa';
$callbackUrl = 'http://localhost:8000/active-questions.php';
$state = 'hoge';

$tags = urlencode("顔出し");
$requestUrl = "https://apiv2.twitcasting.tv/search/lives?type=tag&context=$tags&lang=ja&limit=30";

session_start();

//check expire date
$expireFile = './conf/expire.txt';
$expireDate = file_get_contents($expireFile);
date_default_timezone_set("Asia/Tokyo");
$now = new DateTime();
if (strtotime($expireDate) < strtotime($now->format('Y-m-d H:i:s'))) {
    getToken($clientId, $clientSecret, $callbackUrl);
}

//Read User Token
$tokenFile = './conf/token.txt';
$token = file_get_contents($tokenFile);

//Build Headers for request
$requestPref = stream_context_create(array(
    'http' => array(
        'method' => 'GET',
        'header' => "Accept: application/json\r\n" .
            "X-Api-Version: 2.0'\r\n" .
            "Authorization: Bearer $token \r\n"
    )
));

$response = file_get_contents($requestUrl, false, $requestPref);

$movieData = json_decode($response, true);
$live = $movieData;

for ($i=0; $i < 30; $i++) {
    $liveUrl = $live["movies"][$i]["movie"]["link"];
    $liveTitle = $live["movies"][$i]["movie"]["title"];
    $liveUrl = $liveUrl . "/embed/live-320-0";
    echo "<div class=\"movie-title\">";
    echo $liveTitle;
    echo "</div>";
    echo "<div class=\"movie-frame\">";
    echo "<script type=\"text/javascript\"  src=\"$liveUrl\"></script>";
    echo "</div>";
}
//echo "<script type=\"text/javascript\"  src=\"$liveUrl\"></script>";
//echo "</div>";
//}

