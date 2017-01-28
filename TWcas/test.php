<?php
$clientId = '3036520021.2636d2d1aa43b5dd6971df16c980770e2983fe415a4520a5c0e7e06050c88680';
$clientSecret = 'a36263ff733100061a7c19ed2c0d224682bf364554308ebedfda075d70675f30';
$callbackUrl = 'http://localhost:8000';
$state = 'hogehogehogehogehogehoge';

session_start();

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
            'method' => 'POST',
                    'content' => $data,
                            'header' => 'Content-Type: application/x-www-form-urlencoded',
                                )   
    ));

$result = file_get_contents('https://apiv2.twitcasting.tv/oauth2/access_token', false, $context);

// サンプルなのでアクセストークンを画面に表示させてしまう
var_dump($result);

