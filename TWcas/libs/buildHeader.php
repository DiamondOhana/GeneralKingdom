<?php
function buildHeader($token) {

  return stream_context_create(array(
  'http' => array(
        'method' => 'GET',
        'header' => "Accept: application/json\r\n" .
                    "X-Api-Version: 2.0'\r\n" .
                    "Authorization: Bearer $token \r\n"
        )
  ));
}

?>
