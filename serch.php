<?php
//指定処理

/*
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
*/
$get_area = $_SESSION['AREA'];
$get_time = $_SESSION['duration'];
$get_want = $_SESSION["wantdo"];
$error_state = false;

switch($_SESSION['duration']){
	case "2h":
		$text1 = "ミニ観光";
		break;
	case "6h":
		$text1 = "半日コース";
		break;
	case "12h":
		$text1 = "1日丸ごと！";
		break;
	case "8to12":
		$text1 = "午前中のみ";
		break;
	case "20to01":
		$text1 = "夜の京都";
		break;
	default:
		$text1="<span style='color:red;'>取得エラー</span>";
		$error_state = true;
		break;
		}

switch($_SESSION['wantdo']){
	case "thekyoto":
		$text2 = "正統派京都観光";
		break;
	case "date":
		$text2 = "デートコース";
		break;
	case "minor":
		$text2 = "隠れスポット巡り";
		break;
	case "light":
		$text2 = "ライトアップを見る！";
		break;
	case "natural":
		$text2 = "京都の自然を体感";
		break;
	default:
		$text2 ="<span style='color:red;'>取得エラー</span>";
		$error_state = true;
		break;
		}
		
switch($_SESSION['AREA']){
	case "KYOTO":
		$text3 = "京都駅周辺";
		break;
	case "KINKAKU":
		$text3 = "金閣寺付近";
		break;
	case "KIYOMIZU":
		$text3 = "清水寺付近";
		break;
	case "ARASHI":
		$text3 = "嵐山付近";
		break;
	case "UNSELECTED":
		$text3 = "エリア指定なし";
		break;
	case "NOW":
		$text3 = "現在地周辺";
		break;
	default:
		$text3 ="<span style='color:red;'>取得エラー</span>";
		$error_state = true;
		break;
		}
//指定処理ここまで



//追加すべき項目：時間(get_time)に合致する条件設置
switch ($get_want) {//何をしたいかの検索
	case 'thekyoto':
		$min_kyot = 70;
		$min_date = 0;
		$min_hide = 0;
		$min_natu = 20;
		$min_ligh = 0;
		break;
	
	case 'date':
		$min_kyot = 50;
		$min_date = 70;
		$min_hide = 0;
		$min_natu = 10;
		$min_ligh = 0;
		break;

	case 'minor':
		$min_kyot = 20;
		$min_date = 0;
		$min_hide = 70;
		$min_natu = 10;
		$min_ligh = 0;
		break;

	case 'light':
		$min_kyot = 0;
		$min_date = 50;
		$min_hide = 0;
		$min_natu = 0;
		$min_ligh = 100;//100固定
		break;

	case 'natural':
		$min_kyot = 40;
		$min_date = 20;
		$min_hide = 0;
		$min_natu = 40;
		$min_ligh = 0;
		break;

	default:
		$min_kyot = 100;
		$min_date = 100;
		$min_hide = 100;
		$min_natu = 100;
		$min_ligh = 100;
		break;
}
//6-10 : Kyo,da,hi,nat,lig

$fileName = "./data/placelist.csv";
$handle = fopen($fileName, "r");
$file_count = 0;

for ($i=0;!feof($handle);$i++){
    $csv=fgets($handle);
    //mb_convert_variables("UTF-8", "SJIS", $csv); 
    $str[$i]=explode(",",$csv);
    $file_count++;
}

fclose($handle);

//str[n][n2]に格納完了

?>