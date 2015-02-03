<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
include 'serch.php';
if(isset($_GET['code'])){
$code = $_GET['code'];
}else{
$code = "error";
}
$nowUrl = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$page_title=$str[$code][1];
/*
以下、ページ文字コードがUTF-8ではない場合のコード
$utf8_title = mb_convert_encoding($page_title, "UTF-8");
$utf8_url =  mb_convert_encoding($nowUrl, "UTF-8");
$linemsg = $utf8_title.' - '.$utf8_url;
*/
$linemsg = '「'.$page_title.'」　: '.$nowUrl.' - るろたび ';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php echo($page_title);?> - るろたび</title>
<!--Main Script-->
<script type="text/javascript" src="./js/text.js"></script>
<!--jQuery Load-->
<script src="./js/jquery-1.11.1.min.js"></script>
<script src="./js/jquery.mobile-1.4.5.min.js"></script>
<link href="./css/main.css" rel="stylesheet" type="text/css">
<link href="./css/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
function get_url_js()
{
  var vars = new Object, params;
  var temp_params = window.location.search.substring(1).split('&');
  for(var i = 0; i <temp_params.length; i++) {
    params = temp_params[i].split('=');
    vars[params[0]] = params[1];
  }
  return vars;
}

</script>
</head>
<body>
<!--Header-->
<div data-role="page" data-title="<?php echo($page_title);?> - るろたび">
  <div data-role="header" data-theme="b" data-position="fixed">
     <a href="#panel" class="ui-btn ui-btn-b ui-btn-icon-notext ui-icon-bars ui-corner-all">Menu</a>
    <h1>プラン詳細</h1>
     <a href="first.html" class="ui-btn ui-btn-b ui-btn-right ui-btn-icon-notext ui-icon-search ui-corner-all" data-ajax='false'>Re-Serch</a>
  </div>
<!--Panel Contents-->
<div id="panel" data-role="panel" data-display="overlay">
    <a href="first.html" class="ui-btn ui-btn-a ui-btn-icon-left ui-icon-search" data-ajax='false'>プラン検索</a>
    <a href="javascript:void(0)" onClick="SetCookie()" class="ui-btn ui-btn-a ui-btn-icon-left ui-icon-star" style="margin:-10px 0px 0px 0px;">このプランを保存</a>
    <p id="output" style="margin:-10px 0px -10px 0px;"></p>
    <p id="output2" style="margin:-10px 0px -10px 0px;"></p>
    <a href="first.html" class="ui-btn ui-btn-a ui-btn-icon-left ui-icon-back" data-rel="back" data-direction="reverse" style="margin:-10px 0px -10px 0px;">戻る</a>
    <a href="index.html" class="ui-btn ui-btn-a ui-btn-icon-left ui-icon-home">トップページ</a>
    <a href="#" data-role="button" data-rel="close" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-left" data-inline='true'>閉じる</a>
</div>

<!--Main Contents-->
<div role="main" class="ui-content">
  <div align="center">
  <img src="./img/logo_rurotabi.png" width="100%" style="max-width:500px" alt="るろたび"><br/>
<?php 
if($code != "error"){
print('<h2>'.@$str[$code][1].'</h2>');
}else{
  print('<h2>エラー</h2>');
}
  ?>
</div>
<!--Share buttons -->
<div data-role="collapsible"  style="font-size:small;width:80%; margin: 0 auto;" data-mini="true" data-collapsed-icon='star'><h3 align="center">たびシェア</h3><p align="center">
  <a href="https://twitter.com/share" class="twitter-share-button" data-lang="ja" data-size="large" data-count="none" data-hashtags="るろたび">ツイート</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<a href="line://msg/text/<?php echo($linemsg);?>"><img src="img/line_button.png" width="115" height="28" alt="LINEで送る" /></a>
<a href="http://www.facebook.com/share.php?u=<?php echo($nowUrl);?>"><img src="img/fb_btn.png" alt="Facebookでシェア" border="0" /></a>
<br/><strong><a href="#">ツイートキャンペーン実施中！</a></strong><br/>ハッシュタグ「#るろたび」をつけてつぶやいて、賞品をGETしよう！</p></div>

<div>

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
 


<div data-role="footer" data-position="fixed">
    <div data-role="navbar">
        <ul>
          <li><a href="index.html"　data-rel="back" data-direction="reverse">戻る</a></li>
          <li><a href="index.html">トップ</a></li>
          <li><a href="first.html" class="ui-btn-active" data-ajax="false">再検索</a></li>
        </ul>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
//cookieセット時の動作
function cookie_warn(){
  if(window.confirm('プランは一つしか保存できません。続けると、前に保存したコースは削除されますが、それでもよろしいですか？')){
  var CookieInfo = "savecode="+codenum+";max-age=2592000";
  document.cookie = CookieInfo;
  window.alert("このプランを保存しました");
  }else{
    window.alert('キャンセルされました'); // 警告ダイアログを表示
  }
}



function SetCookie(){
  url_ref = get_url_js();
  codenum = url_ref['code'];

saveurl = GetCookie('code');
if(typeof(saveurl) == "undefined"){
  var CookieInfo = "savecode="+codenum+";max-age=2592000";
  document.cookie = CookieInfo;
  alert("このプランを保存しました");
  }else{
  cookie_warn();
  }




}
</script>
<script type="text/javascript">
textget();
textget2();
  </script>

</body>
</html>