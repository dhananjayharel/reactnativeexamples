<?php
//echo "REF::".$_SERVER['HTTP_REFERER'];
$visited = 0;
if (!isset($_COOKIE['stitiv'])) {$_COOKIE['stitiv'] = 0;
$visits = $_COOKIE['stitiv'] + 1;
setcookie('stitiv',$visits,time()+3600,'/');
}
else
if(isset($_COOKIE['stitiv']) && $_COOKIE['stitiv'] <2 ){
//echo "Plese login to the system";
$visited = 2;
setcookie('stitiv',$visited,time()+3600,'/');
}
else{
$visited = $_COOKIE['stitiv'];
$visited = $visited  + 1;
setcookie('stitiv',$visited,time()+3600,'/');
}
 
///djrequire_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
$srcpath=$_GET["examplepath"];
$courseid=$_GET["courseid"];
$loggedin = $_GET["loggedin"];

$username;
if(isset($_COOKIE['SIDKK'])||!empty($_COOKIE['SIDKK'])){
$username=$_COOKIE['SIDKK'];
}

?>




<!DOCTYPE HTML>
<html>
<head>
<title>skillstack</title>
 <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta property="og:title" content="SkillStack"/>  
  <meta property="og:description" content="The accurate way to screen your tech candidates"/>  
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
   <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">

    <link rel="icon" type="image/png" href="/assets/images/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/assets/images/favicon-16x16.png" sizes="16x16" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type='text/javascript'>
var examplePath='<?php echo $srcpath ?>';
var courseId='<?php echo $courseid ?>';
var visited = <?php echo $visited ?>;
var loggedin = '<?php echo $loggedin ?>';
var lodingDone = false;
var loadingCount = 0;

$(document).ready(function(){
	if(visited==15 && loggedin =='false'){
    console.log("expired");
	$("#session-expired").css("display","flex");
}
else
{
	$.ajax({url: "https://www.skillstack.com/api/RunningContainers/getavailablecontainerhttp",
  type: "GET",
  data: {courseid : courseId},
   xhrFields: {
      withCredentials: true
   }, 
  dataType: "json", success: function(result){
  
   console.log("'https://www.skillstack.com/"+result.nginxPath+"/'");
   //$("#testWindow").src="'https://www.skillstack.com/"+result.nginxPath+"/'";
   //result.nginxPath = "testcourse";
   document.getElementById("testWindow").src=document.location.protocol+"//www.skillstack.com/"+result.nginxPath+"/#/home/project/"+courseId+"/"+examplePath+"";
   //console.log("https://www.skillstack.com/testcourse/#/home/project/"+courseId+"/"+examplePath+"");
   //document.getElementById("testWindow").src="https://www.skillstack.com/testcourse/#/home/project/mark_trego_python_beginners/part10";
   checkIframe();
  }});
  }
	
	
})
onload=function(){
	
}
</script>
<script type='text/javascript' src='CookieUtility.js' ></script>
<style>
body{
margin:0;
}
#footer a{
text-decoration:none;
color:rgb(28, 97, 216);
}
#content{
background-color:#f3f3f3;
height: 100%;
position: absolute;
width: 100%;
}

#theia-mini-browser-load-indicator{
    position: absolute;
    background-image: url(https://pixelpapa.com/wp-content/uploads/2018/11/19.gif);
    z-index: 9999;
    height: 100%;
    width: 100%;
    background-position: center;
    color: white;
    text-align: center;
}

#session-expired{
	 position: absolute;
     font-size:1.7em;
    z-index: 9999;
    height: 100%;
    width: 100%;
    background-position: center;
    color: white;
    text-align: center;
	display:none;
	background-color:black;
}
#testWindow{
border:0;
position:absolute;
}
.arrow-left{
	border-top: 0px solid transparent;
    border-bottom: 28px solid transparent;
    border-right: 20px solid #007ACC;
    position: absolute;
    top: 0px;
    left: -19px;
}
@media screen and (max-width: 600px) {
  #countdownstrip{
    overflow:hidden;
	position: absolute;
    color: white;
    z-index: 9999;
    top: 4px;
    opacity: 0.4;
	width:300px;
	margin-left:auto;
	margin-right:auto;
	left:0;
	width:50px;
	height:29px;
    background: #007ACC;
  }
  .desktopview{
   display:none;
  }
}
@media screen and (min-width: 610px) {
#countdownstrip{
	position: absolute;
    color: white;
    z-index: 9999;
    top: 4px;
    opacity: 0.4;
    height: 27px;
	width:150px; 
	margin-left:auto;
	margin-right:auto;
	left:0;
	right:0;
    background: #007ACC;
	
}
}
#smallstrip{
	height: 4px;
    opacity: 0.4;
    position: absolute;
    width: 100%;
    top: 0px;
    z-index: 9999999;
    background-color: #007ACC;
	/*-webkit-animation: bgcolor 20s infinite;*/
    /*animation: bgcolor 10s infinite;*/
    /*-webkit-animation-direction: alternate;*/
    /*animation-direction: alternate;*/
}
#timer{
	position: absolute;
    z-index: 9999;
    top: 0px;
    right: 0px;
    border-top: 20px solid transparent;
}
.triangle-top-left{
	width: 0;
    height: 0;
    border-top: 28px solid #007ACC;
    border-right: 20px solid transparent;
    position: absolute;
    top: 0px;
    right: -20px;
}

.triangle-top-left.red{
	 border-top: 28px solid red;
	 -webkit-transition: border-top 2000ms linear;
    -ms-transition: border-top 2000ms linear;
    transition: border-top 2000ms linear;
}
.arrow-left.red{
  border-right: 20px solid red;
-webkit-transition: border-right 2000ms linear;
    -ms-transition: border-right 2000ms linear;
    transition: border-right 2000ms linear;  
}
#smallstrip.red, #countdownstrip.red{
   background-color: red;
   -webkit-transition: background-color 2000ms linear;
    -ms-transition: background-color 2000ms linear;
    transition: background-color 2000ms linear;    
}


    .blink_me {
    animation: blinker 1s linear infinite;
    }
    @keyframes blinker {
    50% {
    opacity: 0;
    }
    } 

@keyframes bgcolor {
    0% {
        background-color: #45a3e5
    }

    30% {
        background-color: #66bf39
    }

    60% {
        background-color: #eb670f
    }

    90% {
        background-color: #f35
    }

    100% {
        background-color: #864cbf
    }
}

#smallstripcontainer{
display:none;
}
#countdownstrip{
display:none;
}

</style>
<script type="text/javascript">

 function checkIframe() {
        console.log("in check iframe");
        const myiframe = document.getElementById('testWindow');
        const loadingIndicator = document.querySelector('#theia-mini-browser-load-indicator');
	
        if (window.navigator.userAgent.search(/Firefox/)) {
            myiframe.onload = function () {
				console.log("myiframe.onload done");
                console.log('firefox...');
				loadingCount++;
				if(loadingCount==2){
				setTimeout(function(){
				console.log("checkIframe done");
				lodingDone = true;
                loadingIndicator.style.display = 'none';
							    if(loggedin =='false'){
									var fiveMinutes = 60 * 5,
									display = document.querySelector('#time');
									startTimer(fiveMinutes, display);
									$("#countdownstrip").slideDown();
								}
				},100);
				}
            };
        } else {
            myiframe.onreadystatechange = function () {
				console.log("myiframe.readyState"+myiframe.readyState);
                if (myiframe.readyState == 'complete') {
                 	loadingCount++;
				if(loadingCount==2){
						setTimeout(function(){
							console.log("checkIframe done");
							lodingDone = true;
							loadingIndicator.style.display = 'none';
							//$("#countdownstrip").slideDown();
							    if(loggedin =='false'){
									var fiveMinutes = 60 * 5,
									display = document.querySelector('#time');
									startTimer(fiveMinutes, display);
									$("#countdownstrip").slideDown();
								}
							
							},100);
					}
                }
            }
        }

    }
	function startTimer(duration, display) {
	
	//show the timer
	$('#countdownstrip').show();
	$('#smallstripcontainer').show();
    var timer = duration, minutes, seconds;
    var tick_ = setInterval(function () {
		var currentOpacity = parseFloat($("#countdownstrip").css("opacity"));
		     currentOpacity = currentOpacity + 0.002;
			 $("#countdownstrip").css("opacity",currentOpacity);
			  $("#smallstrip").css("opacity",currentOpacity);
			 
		if(timer<60){
			$("#countdownstrip").css("opacity",1);
			  $("#smallstrip").css("opacity",1);
			 $("#countdownstrip").addClass("red");
			 $(".triangle-top-left").addClass("red");
			 $(".arrow-left").addClass("red");
			 $("#smallstrip").addClass("red");
		}
         if(timer<30){
			 $("#countdownstrip").css("opacity",1);
			  $("#smallstrip").css("opacity",1);
			 $("#countdownstrip").addClass("blink_me");;
			 $(".triangle-top-left").addClass("blink_me");
			 $(".arrow-left").addClass("blink_me");;
			 $("#smallstrip").addClass("blink_me");;
		}
		
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            //timer = duration;
			window.clearInterval(tick_);
		$("#session-expired").css("display","flex");
        }
    }, 1000);
}

window.onload = function () {
console.log("loggedin="+loggedin);
    
};
</script>
	<!-- Google Analytics -->

</head>
<body> 
<div id="smallstripcontainer" class="green" style="
    height: 4px;
    position: absolute;
    width: 100%;
    top: 0px;
    z-index: 9999999;
"><div id="smallstrip" ></div></div>
<div class="green" id="countdownstrip" >
    <div class="arrow-left" ></div> 
    <div style="
    font-weight: bold;
    font-size: 15px;
    text-overflow: ellipsis;
    overflow: hidden;
    height: 17px;
"><span class="desktopview">Session ends in </span><div id="time" style="display: inline;padding:5px;"></div></div><div id="timer" style="
    position: absolute;
    z-index: 9999;
    top: 0px;
    right: 0px;
    border-top: 20px solid transparent;
        "></div>
	 
		<div class="triangle-top-left yellow"></div> 
	</div>
	<div id="theia-mini-browser-load-indicator">
	<span style="top: 8%;
    display: block;
    position: absolute;
    margin-left: auto;
    margin-right: auto;
    left: 0;
    right: 0;
    font-size: 19px;
">
</span>
</div>
	<div id="session-expired">
	<span style="
    vertical-align: middle;
    margin: auto;
    top: 0;
    bottom: 0;
">Thanks! Your session has ended. <a href='https://www.aicamp.io/sign_in' style="color:white" target='_blank'>Login</a> free to remove time restrictions.</span>

</div>
<iframe id="testWindow" src="" width="100%" height="100%"></iframe>
</body>
</html>