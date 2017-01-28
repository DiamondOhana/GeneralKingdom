<?php
require "main.php"
?>

<!DOCTYPE html>
<html lang=“ja”>
<head>
    <meta charset=“UFT-8”>
    <title><?php echo showName(); ?>さんのTWcas袋</title>
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
            $tag = "顔出し";
            $response = searchActiveLive($tag);

            $movieData = json_decode($response, true);
            $live = $movieData;

            for ($i = 0; $i < 30; $i++) {
                echo "<div class=\"movie-content\">";
                $liveUrl = $live["movies"][$i]["movie"]["link"];
                $liveTitle = $live["movies"][$i]["movie"]["title"];
                $liveUrl = $liveUrl . "/embed/live-320-0";
                echo "<div class=\"movie-title\">";
                echo $liveTitle;
                echo "</div>";
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

