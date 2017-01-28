<?php
  require "main.php";
?>

<!DOCTYPE html>
<html lang=“ja”>
<head>
    <meta charset=“UFT-8”>
    <title><?php echo showName(); ?>のTWcas袋</title>
    <link rel="stylesheet" type="text/css" href="sp_base.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<!-- pc -->
<div class="pc-only">
<body>
<div class=header>
    <div class=header-child>
        <div class=header-menu><a href="index.php" class=link1>ホーム</a></div>
        <div class=header-menu><a href="ask-question.php" class=link1>質問する</a></div>
        <div class=header-menu><a href="active-questions.php" class=link1>質問を探す</a></div>
        <div class=header-menu><a href="hello.php" class=link1>ようこそ</a></div>
    </div>
</div>

<div class=main>
    <div class=main-section>
        <div class=main-section-title>
            <p>ツイキャス使って問題解決！</p>
            <h1>ツイキャス知恵袋</h1>
            <img src="logo.png" width="200" height=auto >
        </div>
    </div>
    <div class=sub-section1>
        <div class=subsection-boxes>
            <ul class=subsection-boxes-box>
                <p class="section-p">ツイキャス知恵袋って何？</p>
        </div>
    </div>
</div>
<div class=sub-section2>
    <div class=subsection-boxes>
        <div class=subsection-boxes-box>
            <p class="section-p">質問してみよう！</p>
            <div class="button-box"><input class="button-normal" type="button" onclick="location.href='allq.html'"value="Click!"></div>
        </div>
    </div>
</div>
<div class=sub-section1>
    <div class=subsection-boxes>
        <div class=subsection-boxes-box>
            <p class="section-p">質問を探してみよう！</p>
        </div>
    </div>
</div>
</div>
</body>
</div>

<!-- pc -->
<!-- sp -->
<div class="sp-only">
<div id="sp-header">

  <nav>
    <ul style="list-style:none;">
    <li class="sp-nav-icon sp-logo"><a href="index.php"><img src="bird.png" width="170" ></a></li>
    <li class="sp-nav-menu"><a href="active-questions.php">質問一覧</a></li>
    <li class="sp-nav-menu"><a href="ask-question.html">質問する</a></li>
    <li class="sp-nav-menu"><a href="hello.php">ようこそ</a></li>
  </ul>
  </nav>
</div>

<body>
  <div id="sp-wrap">

    <div class="sp-main-logo">

      <div class="sp-twcas-logo">
        <img src="logo.png" width="300">
      </div>

      <div class="sp-yc-logo">
        <img src="chie-logo.png" width="800">
      </div>

    </div>

  </div>
</body>

<div id="sp-footer">
  <nav>
    <ul style="list-style:none;">
      <li class="sp-fot-icon">copyright 2017 general kingdom</li>
    </ul>
  </nav>
</div>
</div>
<!-- sp -->


</html>
