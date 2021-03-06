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
<title>検索結果 - るろたび</title>
<!--Script CSS Load-->
<script type="text/javascript" src="./js/text.js"></script>
<!--jQuery Load-->
<script src="./js/jquery-1.11.1.min.js"></script>
<script src="./js/jquery.mobile-1.4.5.min.js"></script>
<link href="./css/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
<link href="./css/main.css" rel="stylesheet" type="text/css">
<?php
$allcount = 0;
?>

</head>
<body>


<!--Header-->

<div data-role="page" data-title="検索結果 - るろたび">
  <div data-role="header" data-theme="b" data-position="fixed">
<a href="#panel" class="ui-btn ui-btn-b ui-btn-icon-notext ui-icon-bars ui-corner-all">Menu</a>
    <h1>プラン詳細</h1>
     <a href="first.html" class="ui-btn ui-btn-b ui-btn-right ui-btn-icon-notext ui-icon-search ui-corner-all" data-ajax='false'>Re-Serch</a>
  </div>

<!--Panel menu-->
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
              if($time_check >= $str[$i][4]){
							print("<li><a href='plan.php?code=".$str[$i][0]."' data-ajax='false' data-transition='slide'><img src='./img/top/".$str[$i][12]."'><h2>".$str[$i][1]);
              if($time_check == $str[$i][4]){
                print("<img src='./img/king_1.png'>");
              }else if((($time_check+120) <= $str[$i][4]) || (($time_check-120) <= $str[$i][4])){
                print("<img src='./img/king_2.png'>");
              }else if((($time_check+180) <= $str[$i][4]) || (($time_check-180) <= $str[$i][4])){
                print("<img src='./img/king_3.png'>");
              }
                print("</h2>");
              
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
}
print("</ul>");
$allcount = $agreement_count;
if($error_state == true){
	print('<div align="center"><div class="wrapper"><div class="box2">');
	print("<strong>エラーが発生しました</strong><br/>条件の取得に失敗しました<br/>");
	print("<span style='color:red;'>検索中に更新ボタンなどを押すとエラーになる場合がございます。</span><br/>");
	print("恐れ入りますが<a href='first.html' data-ajax='false'>再検索</a>を<br/>お願い致します。</div></div>");
	print("<img src='./img/chara/notfound2.png'></div>");

}elseif($agreement_count == 0){
	print('<div align="center"><div class="wrapper"><div class="box2">');
	print("<strong>ごめんなさい！</strong><br/>条件にマッチするコースが<br/>ありませんでした。<br/>");
	print("条件を変えて<a href='first.html' data-ajax='false'>再検索</a><br/>してみてください！</div></div>");
	print("<img src='./img/chara/notfound2.png'></div>");
	//単純にデータがなかった時用

	}else{
	print("<br/><div align='center'>以上で検索結果は終了です</div>");
	//検索結果あり
}



  ?>
</div>

<!--Main Contents End-->

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

<!--Panel script-->
<script type="text/javascript">
textget();
textget2();
  </script>
  
</body>
</html>