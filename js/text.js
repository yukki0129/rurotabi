function rt1(){
	console.log("TESTMES");
var num = Math.floor(Math.random() * 5);
var date = new Date();
var hour = date.getHours();

if(0 <= hour && 5 >= hour){
	greeting = "こんばんは。";
	time_com = "早朝の京都を堪能してください！";
}else if(6 <= hour && 11 >= hour){
	greeting = "おはようございます！";
	time_com = "ちょっと遠くまで出かけてみませんか";
}else if(12 <= hour && 13 >= hour){
	greeting = "ランチタイムですね。";
	time_com = "<a href='login.html'>近くのランチスポット</a>へ行ってみませんか？";
}else if(14 <= hour && 17 >= hour){
	greeting = "こんにちは。";
	time_com = "この時間は＊＊＊が空いているかも！";
}else if(18 <= hour && 23 >= hour){
	greeting = "こんばんは。";
	time_com = "ライトアップを見に行きませんか？";
}else{
	greeting = "こんにちは(error)";
	time_com="error";
}


switch(num){
	case 0:
		radn_txt = "今日はどこに出かけましょうか？";
		break;
	case 1: //時間による指定
		radn_txt = time_com;
		break;
}

document.write(greeting + "<br/>"+time_com);
}
//rt1 is end//

function time_check(){ //夜時のみライトアップ(option)追加(jquery)
  obj = document.detail.duration;

  index = obj.selectedIndex;
  if (index != 0){
    check_detail = obj.options[index].value;

    if(check_detail == "20to01"){ //夜間(20-01)には…
    $(function(){
    var option = $('<option />');
    option.val("light");
    option.html('ライトアップでロマンチック');
    $('#wantdo').append(option);//ライトアップを追加
});
    }else{
    	$('select#wantdo option[value="light"]').remove();
    	
    }
  }
}

//time_check is end//

//copy rights//
function CopyYear(){
	var date = new Date();
	NowYear = date.getFullYear();
	CopyTxt = "<h3>Thanks for watching.</h3>";
	/*
	if(NowYear > 2014){
		CopyTxt = ("&copy; 2014-"+NowYear+" Project るろたび.");
	}else if(NowYear === 2014){
		CopyTxt = ("&copy; 2014 Project　るろたび.");
	}else{
		CopyTxt = ("&copy; Project　るろたび.");
	}
	*/
}

function myFunc(){
     myTbl = new Array("日","月","火","水","木","金","土");
     myD = new Date();

     myYear = myD.getFullYear();
     myMonth = myD.getMonth() + 1;
     myDate = myD.getDate();
     myDay = myD.getDay();
     myHours = myD.getHours();
     myMinutes = myD.getMinutes();
     mySeconds = myD.getSeconds();

     myMess1 = myYear + "年" + myMonth + "月" + myDate + "日";
     myMess2 = myTbl[myDay] + "曜日";
     myMess3 = myHours + "時" + myMinutes + "分" + mySeconds + "秒";
     myMess = myMess1 + " " + myMess2 + " " + myMess3;
     document.write( myMess );
}