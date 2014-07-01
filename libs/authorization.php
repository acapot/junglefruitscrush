<?php
require_once("facebook.php");
require_once("base_facebook.php");

$facebook = new Facebook(array(
'appId' => '',
'secret' => '',
'cookie' => true
));

$session = $facebook->getSession();
$me = null;

if($session)
{
	try
	{
		$me = $facebook->api('/me');
	}
	catch(FacebookApiException $e)
	{
		echo $e->getMessage();	
	}
}

if($me)
{
	header("Location:apps.facebook.com/quizpalsdev/");
}
else{
	 $loginUrl = $facebook->getLoginUrl(array(
	 	'req_perms' => 'publish_stream,read_friendlists'
	 ));
	 echo $loginUrl;
}
?>
