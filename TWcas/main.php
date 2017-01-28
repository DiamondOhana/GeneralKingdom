<?php

require "libs/updateToken.php";
require "libs/searchLive.php";
require "libs/getUsername.php";

$clientId = '81534202.8b97503a01e9021c236295ce656ee6b653ef7c7601c04f2b26309fb3c77baa16';
$clientSecret = 'ef164d71f72c04046c93d82442aefed1986ee6ac4eba25342861b47612d891fa';
$callbackUrl = 'http://localhost:8000/active-questions.php';
$state = 'hoge';

session_start();

//check expire date
$expireFile = './conf/expire.txt';
$expireDate = file_get_contents($expireFile);
date_default_timezone_set("Asia/Tokyo");
$now = new DateTime();
if (strtotime($expireDate) < strtotime($now->format('Y-m-d H:i:s'))) {
    updateToken($clientId, $clientSecret, $callbackUrl);
}

//Read User Token **necessary
$tokenFile = './conf/token.txt';
$token = file_get_contents($tokenFile);

function searchActiveLive($tag) {
  global $token;
  return searchLive($token, $tag);
}

function showName() {
  global $token;
  return getUsername($token);
}

var_dump(showName());
