<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
include 'serch.php';
if(isset($_GET['mapcode'])){
$mapcode = $_GET['mapcode'];
}else{
$mapcode = "error";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>MAP リダイレクト - るろたび</title>
<!--Script CSS Load-->
<script type="text/javascript" src="./js/text.js"></script>
<!--jQuery Load-->
<script src="./js/jquery-1.11.1.min.js"></script>
<script src="./js/jquery.mobile-1.4.5.min.js"></script>
<link href="./css/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
<link href="./css/main.css" rel="stylesheet" type="text/css">
</head>
<body>


<!--Header-->
<div data-role="page" data-title="リダイレクト - るろたび">
  <div data-role="header" data-theme="b" data-position="fixed">
<a href="#panel" class="ui-btn ui-btn-b ui-btn-icon-notext ui-icon-bars ui-corner-all">Menu</a>
    <h1>リダイレクト確認</h1>
     <a href="first.html" class="ui-btn ui-btn-b ui-btn-right ui-btn-icon-notext ui-icon-search ui-corner-all" data-ajax='false'>Re-Serch</a>
  </div>
<!--Panel Contents-->
<div id="panel" data-role="panel" data-display="overlay">
    <a href="first.html" class="ui-btn ui-btn-a ui-btn-icon-left ui-icon-search" data-ajax='false'>プラン検索</a>
    <p id="output" style="margin:-10px 0px -10px 0px;"></p>
    <p id="output2" style="margin:-10px 0px -10px 0px;"></p>
    <a href="first.html" class="ui-btn ui-btn-a ui-btn-icon-left ui-icon-back" data-rel="back" data-direction="reverse" style="margin:-10px 0px -10px 0px;">戻る</a>
    <a href="index.html" class="ui-btn ui-btn-a ui-btn-icon-left ui-icon-home">トップページ</a>
    <a href="#" data-role="button" data-rel="close" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-left" data-inline='true'>閉じる</a>
</div>


<!--Main Contents-->
<div role="main" class="ui-content">
  <div align="center">
  <img src="./img/logo_rurotabi.png" width="100%" style="max-width:500px" alt="Kyotoreasure"><br/></div>
  <p><strong>以下のページにリダイレクトしようとしています！</strong><br/>
  ここより先は外部のサイトとなります。<br>
  </p>
  <?php
  $mapurl = $str[$mapcode][14];
  echo('<a href="'.$mapurl.'">'.$mapurl.'</a>');
   ?>
   <br>
  </div>

<!--Footer Content-->
<div data-role="footer" data-position="fixed">
    <div data-role="navbar">
        <ul>
            <li><a href="first.html" class="ui-btn-active" data-ajax="false">再検索</a></li>
            <li><a href="index.html">トップ</a></li>
            <li><a href="login.html">ログアウト</a></li>
        </ul>
    </div>
</div>
</div>
<!--Footer Content End-->

<script type="text/javascript">
textget();
textget2();
  </script>
</body>
</html>