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
<!--Script Load-->
<script type="text/javascript" src="./js/text.js"></script>
<link rel="stylesheet"
       href="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" />
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js">
</script>
<link href="./css/main.css" rel="stylesheet" type="text/css">
<?php
$allcount = 0;
?>

</head>
<body>

<!--Header-->
<div data-role="page">
  <div data-role="header" data-theme="b" data-position="fixed">
     <a href="#panel" class="ui-btn ui-btn-a ui-icon-gear ui-btn-icon-left">Menu</a>
    <h1>検索結果</h1>
     <a href="login.html" class="ui-btn ui-btn-a ui-btn-right">Logout</a>
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
  <img src="./img/logo_rurotabi.png" width="100%" style="max-width:500px" alt="Kyotoreasure"><br/></div>
  <p><strong>以下のコースを検索しました</strong><br/>
  	<small>
  	どこ行く？ : <?php echo ($text3);?><br/>
  	使える時間 : <?php echo ($text1);?><br/>
  	何したい？ : <?php echo ($text2);?><br/>
  	</small>
  </p>
  <!--Counter-->
  <p id="countview"></p>
  <p>
  <!--Serch result-->
  <?php 
  
  /*Debug
  print("SEL : ".$get_want);
  print("京都 limit = ".$min_kyot."<br/>");
  print("デー limit = ".$min_date."<br/>");
  print("隠れ limit = ".$min_hide."<br/>");
  print("自然 limit = ".$min_natu."<br/>");
  print("ライ　limit = ".$min_ligh."<br/>");
  */
							print("<ul data-role='listview'>");
  $agreement_count = 0;
  for ($i=0; $i < $file_count ; $i++) {
	if($get_area == $str[$i][3] || $get_area == "UNSELECTED"){ //エリア合致 or 

		#print("【京".$str[$i][5]."】【愛".$str[$i][6]."】【隠".$str[$i][7]."】【緑".$str[$i][8]."】【光".$str[$i][9]."】<br/>");
		if($min_kyot <= $str[$i][5]){ //Kyoto
			if($min_date <= $str[$i][6]){ 
				if($min_hide <= $str[$i][7]){
					if($min_natu <= $str[$i][8]){
						if($min_ligh <= $str[$i][9]){

							print("<li><a href='plan.php?code=".$str[$i][0]."' data-ajax='false' data-transition='slide'><img src='./img/top/".$str[$i][12]."'><h2>".$str[$i][1]."</h2>");
							print("<p>".$str[$i][2]."<br/>");
							$needtime_h =  floor ($str[$i][4] / 60); 
							$needtime_m = $str[$i][4] % 60; 
							$needtime = $needtime_h."時間".$needtime_m."分";
							print("所要時間：".$needtime."</p></a>");
							//print("<tr><td>【京".$str[$i][5]."】【愛".$str[$i][6]."】【隠".$str[$i][7]."】【緑".$str[$i][8]."】【光".$str[$i][9]."】</td></tr>");//debug
							print("</li>");
							$agreement_count++;//このカウントが0＝表示件数0
						}
					}
				}
			}
		}
	}
}
print("</ul>");

$allcount = $agreement_count;
if($error_state == true){
	print('<div align="center"><div class="wrapper"><div class="box">');
	print("<strong>エラーが発生しました</strong><br/>条件の取得に失敗しました<br/>");
	print("<span style='color:red;'>検索中に更新ボタンなどを押すとエラーになる場合がございます。</span><br/>");
	print("恐れ入りますが<a href='mailform.php'>再検索</a>を<br/>お願い致します。</div></div>");
	print("<img src='./img/chara/notfound2.png'></div>");
	//更新系エラー用

}elseif($agreement_count == 0){
	print('<div align="center"><div class="wrapper"><div class="box">');
	print("<strong>ごめんなさい！</strong><br/>条件にマッチするコースが<br/>ありませんでした。<br/>");
	print("条件を変えて<a href='mailform.php'>再検索</a><br/>してみてください！</div></div>");
	print("<img src='./img/chara/notfound2.png'></div>");
	//単純にデータがなかった時用

	}else{
	print("<br/><div align='center'>以上で検索結果は終了です</div>");
	//検索結果あり
}



  ?>
</div>

<!--Main Contents End-->

  <!--
  <div data-role="footer" data-position="fixed">
    <h3>Copyright 2014, Project Kyotreasure.</h3>
  </div>
</div>
-->

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
<!--Data Count-->
<script type="text/javascript">
	var chg = <?php echo $allcount; ?>;
	$(document).ready(function(){
 	var countview = document.getElementById('countview');
	countview.innerHTML = '総件数：'+chg+'<br/>';
	});
</script>

</body>
</html>