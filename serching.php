<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
include 'serch.php';

/*
このページの意義
セッションに保存する際なぜか1ページ置かないと情報が定着しない？
為、とりあえずで作ったページ。実質0秒で飛ばしても問題ないが、
利用者に不信感を与えるので、3秒ほど待機(あくまでも無意味)
をしてから移動する。移動中にはアニメーションを提示する。
*/
if(isset($_POST['duration'])){
$_SESSION['duration'] = $_POST['duration'];
}else{
$_SESSION['duration'] = "所要時間を取得できませんでした";
}

if(isset($_POST['wantdo'])){
$_SESSION['wantdo'] = $_POST['wantdo'];
}else{
$_SESSION['wantdo'] = "目的を取得できませんでした";
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
<!--jQuery Load-->
<script src="./js/jquery-1.11.1.min.js"></script>
<script src="./js/jquery.mobile-1.4.5.min.js"></script>
<link href="./css/main.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	window.addEventListener('load', function () {  
    setTimeout(gopage, 3000);  
}, false);

	function gopage(){
		location.href = "confilm.php";
		document.getElementById("nextpage").innerHTML="<a href='confilm.php'  class='ui-btn' data-transition='slide'>次へ</a><br><small>※恐れ入りますが、「次へ」ボタンを押してお進みください。</small>";
	}

	function doScroll() {  
    if (window.pageYOffset === 0) {  
        window.scrollTo(0, 1);  
    }
    }  
</script>
</head>
<body>

<!--Header-->
<div data-role="page">
  <div data-role="header" data-theme="b" data-position="fixed">
     <a href="#panel" class="ui-btn ui-btn-b ui-btn-icon-notext ui-icon-bars ui-corner-all">Menu</a>
    <h1>検索中</h1>
     <a href="first.html" class="ui-btn ui-btn-b ui-btn-right ui-btn-icon-notext ui-icon-search ui-corner-all" data-ajax='false'>Re-Serch</a>
  </div>
<!--</div>-->

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
<p>検索中です...</p>

  <!--loading...-->
  <div class="loader">
	<span></span>
	<span></span>
	<span></span>
	<span></span>
	<span></span>
</div>

  <p id="nextpage"></p>
</div>
 
</div>

</div>


</body>
</html>