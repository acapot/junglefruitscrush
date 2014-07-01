<?php
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '436491473150405',
		'secret' => 'ee9164957a9826c4c1e800e3237dd94d'
	));

	setcookie('fbs_'.$facebook->getAppId(),'', time()-100, '/', 'alexiscapot.se/portfolio_file/junglefruitscrush/');
	$facebook->destroySession();
	header('Location: ../index.php');
?>
