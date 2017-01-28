<?php
  require "buildHeader.php";

  function searchLive($token, $tag) {

  $tags = urlencode($tag);
  $requestUrl = "https://apiv2.twitcasting.tv/search/lives?type=tag&context=$tags&lang=ja&limit=30";

  $requestPref = buildHeader($token);

  $response = file_get_contents($requestUrl, false, $requestPref);
  return $response;

}

?>
