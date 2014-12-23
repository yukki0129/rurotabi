<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
include 'serch.php';
if(isset($_GET['code'])){
$code = $_GET['code'];
}else{
$code = "error";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>エリア選択 - Kyotoreasure</title>
<!--Main Script-->
<script type="text/javascript" src="./js/text.js"></script>
<link rel="stylesheet"
       href="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" />
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js">
</script>
<link href="./css/main.css" rel="stylesheet" type="text/css">
</head>
<body>

<!--Header-->
<div data-role="page">
  <div data-role="header" data-theme="b" data-position="fixed">
     <a href="#panel" class="ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left">Menu</a>
    <h1>プラン詳細</h1>
     <a href="login.html" class="ui-btn ui-btn-a ui-btn-right">Logout</a>
  </div>

<!--Panel menu-->
<div id="panel" data-role="panel" data-display="overlay">
	<h3>Menu</h3>
    <a href="login.html" class="ui-btn ui-btn-a">Logout</a>
    <a href="#" data-rel="close"
      class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-left">閉じる</a>
</div>

<!--Main Contents-->
<div role="main" class="ui-content">
  <div align="center">
  <img src="./img/logo_rurotabi.png" width="100%" style="max-width:500px" alt="Kyotoreasure"><br/>
<?php 
if($code != "error"){
print('<h2>'.@$str[$code][1].'</h2>');
}else{
  print('<h2>エラー</h2>');
}
  ?>

  <!--loadURL...-->
<?php 
$geturl = "data/plan/".@$str[$code][11];
?>
<?php
if($geted_page = @file_get_contents($geturl)){
echo $geted_page;
}else{
  echo("<span style='color:red;'>データ取得エラー</span><br/>指定されたデータ(<strong>".$geturl."</strong>)は存在しませんでした。<br/>プランデータが作成されていないかcsvファイルの指定間違いです。<br/>恐れ入りますが、報告していただければ幸いです。<br/>");
}

?>
</div>
 
</div>

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


</body>
</html>