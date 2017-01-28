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
?>

<!DOCTYPE html>
<html lang=“ja”>
<head>
    <meta charset=“UFT-8”>
    <title>TWcas袋</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="sp_base.css">

</head>

<body>

<!-- pc -->
<div class="pc-only">
    <div class=header>
        <div class=header-child>
            <div class=header-menu><a href="index.php" class=link1>ホーム</a></div>
            <div class=header-menu><a href="ask-question.php" class=link1>質問する</a></div>
            <div class=header-menu><a href="active-questions.php" class=link1>質問一覧</a></div>
            <div class=header-menu><a href="hello.php" class=link1>ようこそ！</a></div>
        </div>
    </div>

    <div class=main>
        <div class="question-box">
            <p>現在回答受付中の質問一覧です。</p>
            <?php

            $response = file_get_contents($requestUrl, false, $requestPref);

            $movieData = json_decode($response, true);
            $live = $movieData;

            for ($i = 0; $i < 30; $i++) {
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
            ?>
        </div>
    </div>
</div>
<!--pc -->

<!--sp -->
<div class="sp-only">
    <div id="sp-header">

        <nav>
            <ul style="list-style:none;">
                <li class="sp-nav-icon sp-logo"><a href="index.php"><img src="bird.png" width="170"></a></li>
                <li class="sp-nav-menu"><a href="active-questions.php"> 質問一覧</a></li>
                <li class="sp-nav-menu"><a href="ask-question.php"> 質問する</a></li>
                <li class="sp-nav-menu"><a href="hello.php"> ようこそ</a></li>
            </ul>
        </nav>
    </div>
    <div id="sp-wrap">

        <div class="sp-movie-desc">
            現在回答待ちをしている質問の一覧です。
        </div>

        <div class="sp-movie-box">

            <div class="sp-movie-content">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/4Sd3iIdM4Co" frameborder="0"
                        allowfullscreen></iframe>
            </div>
            <div class="sp-movie-content">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/4Sd3iIdM4Co" frameborder="0"
                        allowfullscreen></iframe>
            </div>
            <div class="sp-movie-content">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/4Sd3iIdM4Co" frameborder="0"
                        allowfullscreen></iframe>
            </div>
            <div class="sp-movie-content">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/4Sd3iIdM4Co" frameborder="0"
                        allowfullscreen></iframe>
            </div>
            <div class="sp-movie-content">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/4Sd3iIdM4Co" frameborder="0"
                        allowfullscreen></iframe>
            </div>


        </div>

    </div>

</body>

<div id="sp-footer">
    <nav>
        <ul style="list-style:none;">
            <li class="sp-fot-icon"> copyright 2017 general kingdom</li>
        </ul>
    </nav>
</div>

</div >
<!--sp -->

</body >

