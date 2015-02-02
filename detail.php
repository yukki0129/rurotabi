<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
include 'serch.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>エリア選択 - Kyotoreasure</title>
<script type="text/javascript" src="./js/text.js"></script>
<link rel="stylesheet"
       href="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" />
<!--jQuery Load-->
<script src="./js/jquery-1.11.1.min.js"></script>
<script src="./js/jquery.mobile-1.4.5.min.js"></script>
</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<link href="./css/main.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php

if(isset($_POST['entry_area'])){
$text = $_POST['entry_area'];
}else{
$text = "NG";
}

switch($_POST['entry_area']){
	case "area01":
		$text = "京都駅周辺";
		$_SESSION['AREA'] = "KYOTO";
		break;
	case "area02":
		$text = "金閣寺付近";
		$_SESSION['AREA'] = "KINKAKU";
		break;
	case "area03":
		$text = "銀閣寺付近";
		$_SESSION['AREA'] = "GINKAKU";
		break;
	case "area04":
		$text = "嵐山付近";
		$_SESSION['AREA'] = "ARASHI";
		break;
	case "area00":
		$text = "エリア指定なし";
		$_SESSION['AREA'] = "UNSELECTED";
		break;
	default:
		$text="<span style='color:red;'>エラーが発生しました。<br/>最初からやり直してください。</span>";
		$_SESSION['AREA'] = "ERROR";
		}
?>

<div data-role="page">
  <div data-role="header" data-theme="b" data-position="fixed">
     <a href="#panel" class="ui-btn ui-btn-b ui-btn-icon-notext ui-icon-bars ui-corner-all">Menu</a>
    <h1>詳細条件</h1>
      <a href="first.html" class="ui-btn ui-btn-b ui-btn-right ui-btn-icon-notext ui-icon-search ui-corner-all" data-ajax='false'>Re-Serch</a>
  </div>
  <div role="main" class="ui-content" align="center">
  <img src="./img/logo_rurotabi.png" width="100%" style="max-width:500px" alt="Kyotoreasure"><br/>
  場所：<strong><?php echo $text;?></strong><br/>
  
  詳しい条件を選んでください<br/>
   <div role="main" class="ui-content">
    <!--<form method="POST" action="confilm.php" name="detail" data-ajax="false">-->
    <form method="POST" action="serching.php" name="detail" data-ajax="false">
      <div class="ui-field-contain">
       <label for="duration">所要時間：</label>
       <br/>
       <select id="duration" name="duration" onChange="time_check()">
         <option value="2h">ミニ観光</option>
         <option value="6h">半日コース</option>
         <option value="12h">1日まるごと！</option>
         <option value="8to12">午前中のみ</option>
         <option value="20to01">夜の京都</option>
       </select>
       <br/>
       <label for="wantdo">何がしたい？：</label>
       <br/>
         <select id="wantdo" name="wantdo">
         <option value="thekyoto">正統派京都観光</option>
         <option value="date">デートコース</option>
         <option value="minor">隠れスポット巡り</option>
         <option value="natural">京都の自然を体感</option>
       </select>
       <button class="ui-btn" type="submit">次へ</button>
     </div>
    </form>
  </div>
  <?php
  echo("state:".$_SESSION['AREA'].".");
  ?>
<script type="text/javascript">

  </script>
  <p id="gmap"></p>
  </div>
  <div data-role="footer">
    <h3>Copyright 2014, Rurotabi Project.</h3>
  </div>
</div>

</body>
</html>