<?php require_once("config.php");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
  xmlns:fb="https://www.facebook.com/2008/fbml">
<?php 
require "libs/facebook.php";

//$db = new DB();
//$categories = $db->getCategories();
$appId = '201394300058095';
$appSecret = '4bf2264d2f3239a80d3c8363e348afc6';
$myUrl = 'https://apps.facebook.com/jungelfruitscrush/';




$facebook = new Facebook(array(
'appId' => $appId,
'secret' => $appSecret,
'cookie' => true

));


//$user = "678845345";


$user = $facebook->getUser();



if(isset($_REQUEST['code'])){
$code = $_REQUEST['code'];
}

//if (empty($code)) {
$loginUrl = $facebook->getLoginUrl();

  
echo("<script> top.location.href='".$loginUrl."'</script>");
  
//}




//$access_token = $facebook->getAccessTokenFromCode($code);
/*$token_url =    "https://graph.facebook.com/oauth/access_token?" .
                "client_id=" . $appId .
                "&client_secret=" . $appSecret .
                "&grant_type=client_credentials";
$app_token = file_get_contents($token_url);
$_SESSION['app_token'] = str_replace("access_token=", "", $app_token);*/


$_SESSION['userid'] = $user;
//apps.facebook.com/quizdev/');

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $fql = 'SELECT uid, name, pic from user where uid= '. $user;
	$ret_obj = $facebook->api(array(
								'method'=> 'fql.query',
								'query' => $fql
								));
								
	$name = $ret_obj[0]['name'];
	$id = $ret_obj[0]['uid'];
	$urlfoto = $ret_obj[0]['pic'];
	
	
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}





?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--flash-->
<title>fruitsCrush</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css" media="screen">
		html, body { height:100%; background-color: #ffffff;}
		body { margin:0; padding:0; overflow:hidden; }
		#flashContent { width:100%; height:100%; background-color:blue;}
		</style>
<!--/flash-->
<!-- CSS -->

	<link rel="stylesheet" type="text/css" href="css/layout.css">
    
<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.0.0.min.js"></script>
<script src="js/jquery.flip.js"></script>
<script src="js/jquery.flip.min.js"></script>
<script src="js/jquery-1.9.0.js"></script>
<script src="js/jquery-ui-1.10.0.custom.js"></script>
<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
<script src="js/tinyscroll.js"></script>


<script src="js/js-sdk.js"></script>


<script src="js/ajax.js"></script>

    
</head>

<body>


<div id="fb-root"></div>

<script>
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId  : '201394300058095', // App ID from the App Dashboard
      //channelUrl : '//www.giacomopalma.se/quizdev/channel.html', // Channel File for x-domain communication
	  frictionlessRequests: true,
      status     : true, // check the login status upon init?
      cookie     : true, // set sessions cookies to allow your server to access the session?
      xfbml      : true  // parse XFBML tags on this page?
    });

    // Additional initialization code such as adding Event Listeners goes here

  };

  // Load the SDK's source Asynchronously
  // Note that the debug version is being actively developed and might 
  // contain some type checks that are overly strict. 
  // Please report such bugs using the bugs tool.
  (function(d, debug){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
     ref.parentNode.insertBefore(js, ref);
   }(document, /*debug*/ false));
</script>
 
 
 
 <div id="flashContent">

			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="800" height="800" id="fruitsCrush" align="middle">
				<param name="movie" value="flash/fruitsCrush.swf" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#ffffff" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="wmode" value="window" />
				<param name="scale" value="showall" />
				<param name="menu" value="true" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="allowScriptAccess" value="sameDomain" />
				<!--[if !IE]>-->
				<object type="application/x-shockwave-flash" data="flash/fruitsCrush.swf" width="800" height="800">
					<param name="movie" value="flash/fruitsCrush.swf" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#ffffff" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="wmode" value="window" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="allowScriptAccess" value="sameDomain" />
				<!--<![endif]-->
					<a href="http://www.adobe.com/go/getflash">
						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
					</a>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
		</div>
 
 
<div id="container">
	<div id="header">
	</div>
    <div id="toolbar">
  <?php
  $profile_pic = "http://graph.facebook.com/".$user."/picture";
		
		echo "<div id=\"profie\"><img id=\"profile_pic\" src=\"".$profile_pic."\"/></div>
			<div id='showuser'>Welcome ".$user_profile['name']."</div>
			";?>
    </div>
    <div id="game-wrapper">
    
        <?php if($user){
		
	echo	'in';
		
}?>
       
    

	</div>
	<div id="footer">
    <a href="#" class="appstore"></a>
    <a href="#" class="googleplay"></a>
	</div>
</div>

<script> 

	  
function sendRequestToRecipients(id) {
	
  FB.ui({method: 'apprequests',
    message: 'I want to play FruitsCrush with you!',
    to: id
  }, requestCallback);
}

function requestCallback(response) {
        // Handle callback here
      }
</script>
</body>
<script src="js/events.js"></script>
<script src="js/buttons.js"></script>
</html>
