<?php
function getUsername($token) {
  $requestUrl = 'https://apiv2.twitcasting.tv/verify_credentials';
  $requestPref = stream_context_create(array(
    'http' => array(
    'method' => 'GET',
    'header' => "Accept: application/json\r\n".
                "X-Api-Version: 2.0'\r\n".
                "Authorization: Bearer $token \r\n"
    )
  ));

  $response= file_get_contents($requestUrl, false, $requestPref);


  $userName = json_decode($response,true)["user"]["name"];

  return $userName;

}


function getUserId($token) {
  $requestUrl = 'https://apiv2.twitcasting.tv/verify_credentials';
  $requestPref = stream_context_create(array(
    'http' => array(
    'method' => 'GET',
    'header' => "Accept: application/json\r\n".
                "X-Api-Version: 2.0'\r\n".
                "Authorization: Bearer $token \r\n"
    )
  ));

  $response= file_get_contents($requestUrl, false, $requestPref);

  $userId = json_decode($response,true)["user"]["id"];

  return $userId;

}
