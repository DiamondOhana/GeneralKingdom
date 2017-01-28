<?php
function updateToken($clientId, $clientSecret, $callbackUrl) {
  $state = 'hoge';

  //session_start();

  // 最初に開いたとき、セッションにCSRF対策トークンを入れてツイキャスの認可画面に飛ばす
  if (!isset($_GET['state'])) {
      $_SESSION['state'] = $state;
      $authorizationUrl = "https://apiv2.twitcasting.tv/oauth2/authorize?client_id=${clientId}&response_type=code&state=${state}";
      header("Location: ${authorizationUrl}");
      exit;
  }

  // コールバックで戻ってきたとき、CSRF対策としてstateを検証する
  if ($_SESSION['state'] != $_GET['state']) {
      exit;
  }

  // アクセストークン取得APIで必要なパラメーター
  $params = array(
      'code' => $_GET['code'], // コールバックで受け取ったcodeが必要
      'grant_type' => 'authorization_code',
      'client_id' => $clientId,
      'client_secret' => $clientSecret,
      'redirect_uri' => $callbackUrl,
  );


  $data = http_build_query($params);

  $context = stream_context_create(array(
      'http' => array(
          'method' => 'POST', //POST
          'content' => $data,
          'header' => 'Content-Type: application/x-www-form-urlencoded',
      )
  ));

  date_default_timezone_set("Asia/Tokyo");
  $result = file_get_contents('https://apiv2.twitcasting.tv/oauth2/access_token', false, $context);
  $token = json_decode($result, true)["access_token"];
  $expireTime = json_decode($result, true)["expires_in"];

  //Culclate expire date
  $now = new DateTime();
  $expireDate = $now->modify("$expireTime seconds");

  $tokenFile = './conf/token.txt';
  $expireFile = './conf/expire.txt';

  file_put_contents($tokenFile, $token);
  file_put_contents($expireFile, $expireDate->format('Y-m-d H:i:s'));
}

?>
