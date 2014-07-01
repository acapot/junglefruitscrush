<?php require_once("config.php");

?>
<!DOCTYPE html>
<html lang="en">


<style type="text/css" media="screen">
		html, body { height:100%; background-color: #ffffff;}
		body { margin:0; padding:0; overflow:hidden; }
		#flashContent { width:100%; height:100%; }
</style>
<head>
  <meta charset="utf-8" />
  <title>Facebook PHP</title>
  <?php 
require_once ("application/models/php-sdk/facebook.php");
require_once ("application/controllers/indexC.php");

?>
  <!--<script src="public/js/jquery-1.11.0.js"></script>-->
</head>

<body>

<?php
 //lynda capitel 3.1
 $cache_expire = 60*60*24*365;
 header("Pragma: public");
 header("Cache-Control: max-age=".$cache_expire);
 header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$cache_expire) . ' GMT');
?>
 
 <script src="//connect.facebook.net/en_US/all.js"></script>
 
 
	<script>
		FB.init({ 
       appId:'xxxxxxxxxxxxxxxxxxxx', 
	   cookie:true, 
       status:true, 
	   xfbml:true,
	   frictionlessRequests : true, // enable frictionless requests
	   channelUrl : '//alexiscapot.se/portfolio_file/junglefruitscrush/views/php/helpFiles/channel.php'
	   
     });

   
	function FacebookInviteFriends()
	{
	FB.ui({ method: 'apprequests', 
	   message: 'My dialog...'});
	}
	
	function FacebookInviteOnefriend(frndId, msn)
	{
		FB.ui({method: 'apprequests',
		message: msn,
		 to: frndId
		}, requestCallback);
	}





	</script>
        <div id="flashContent">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="760" height="800" id="fruitsCrush" align="middle">
				<param name="movie" value="application/views/flash/fruitsCrush.swf" />
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
				<object type="application/x-shockwave-flash" data="application/views/flash/fruitsCrush.swf" width="760" height="800">
					<param name="movie" value="application/views/flash/fruitsCrush.swf" />
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
	</body>

</html>
