function rt1(){
	console.log("TESTMES");
var num = Math.floor(Math.random() * 2);
var date = new Date();
var hour = date.getHours();
var greeting = "";

if((0 <= hour) && (5 >= hour)){
	greeting = "こんばんは。<br/>早朝の京都を堪能してください！";
}else if((6 <= hour) && (11 >= hour)){
	greeting = "おはようございます！<br/>ちょっと遠くまで出かけてみませんか";
}else if((12 <= hour && 13 >= hour)){
	greeting = "ランチタイムですね。<br/><a href='login.html'>近くのランチスポット</a>へ行ってみませんか？";
}else if((14 <= hour && 17 >= hour)){
	greeting = "こんにちは。<br/>京都を楽しんでください！";
}else if((18 <= hour && 23 >= hour)){
	greeting = "こんばんは。<br/>ライトアップを見に行きませんか？";
}else{
	greeting = "こんにちは(error)";
}
document.write(greeting);
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
 function textget(){
        rundom_num = Math.floor(Math.random()*35)+1;
        rundom_link = '<a href="plan.php?code='+rundom_num+'" class="ui-btn ui-btn-a ui-btn-icon-left ui-icon-recycle" data-ajax="false">ランダムプラン</a>';
        target = document.getElementById("output");
        target.innerHTML = rundom_link;
        }
        function textget2(){
            saveurl = GetCookie('savecode');
            url_put = '<a href="plan.php?code='+saveurl+'" class="ui-btn ui-btn-a ui-btn-icon-left ui-icon-heart" data-ajax="false">保存したプラン</a>';
            target2 = document.getElementById("output2");
            target2.innerHTML = url_put;
        }


function GetCookie( name ){
    var result = null;
    var cookieName = name + '=';
    var allcookies = document.cookie;
    var position = allcookies.indexOf( cookieName );
    if( position != -1 ){
        var startIndex = position + cookieName.length;
        var endIndex = allcookies.indexOf( ';', startIndex );
        if( endIndex == -1 ){
            endIndex = allcookies.length;
        }
        result = decodeURIComponent(
            allcookies.substring( startIndex, endIndex ) );
    }

    return result;
}

