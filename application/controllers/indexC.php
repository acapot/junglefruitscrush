<?php 
require_once ("config.php");
require_once ("application/models/indexM.php");
//header("Content-Type: text/plain; charset=utf-8");

$indexM = new IndexM();
$checkUser = null;


//===START connection to FB=== 
$appId = '436491473150405';
$appSecret = 'ee9164957a9826c4c1e800e3237dd94d';
$myUrl = 'https://apps.facebook.com/holafruta/';

$facebook = new Facebook(array(
	'appId' => $appId,
	'secret' => $appSecret,
	'cookie' => true
));
$user = $facebook->getUser();
//===END connection to FB=== 

//===START check if the user is connected to FB=== 
if($user)
{	
	echo '<p>User ID:' ,$user,'</p>';
	$user_graph = $facebook->api('/me/');
	//var_dump($user_graph);
	//$_SESSION['friends'] = $facebook->api('/me/friends/');
	$_SESSION['friends'] = $facebook->api('/'.$user.'/friends?fields=name,id,installed');
	//print_r($_SESSION['friends'] );
	
	echo '<h1>Hello '.$user_graph['first_name'].'</h1>';
	$logoutUrl = $facebook->getLogoutUrl();
	//echo '<p><a href="php/fb_logout.php">logout</a></p>';
	echo "user_graphID ".$user_graph['id'];
	
			//===START check if the fb user exist into my DB=== 
				$checkUser = $indexM->CheckUserFBID($user_graph['id']);
				
				//echo "que hay en checkUser ";
				//var_dump($checkUser) ;
				
				$gender = 0;
				if($checkUser == null)
				{
					
					if($user_graph['gender'] == "male")
					{
						$gender = 1;
					}
					else
					{
						$gender = 2;
					}
					$today=date("y-m-d G:i:s");
					$indexM->insertUser($user_graph['first_name'],$user_graph['last_name'],$user_graph['id'], $user_graph['location']['name'],				$gender,$today);
				}
				else
				{
					echo "ya asta en la base de datos";
				}
			//===END check if the fb user exist into my DB=== 
	
}

else
{
	$loginUrl = $facebook->getLoginUrl(array(
										//'display'=>'popup',
										'scope'=>'email,publish_stream,read_friendlists',
										'redirect_uri'=>'http://apps.facebook.com/holafruta/'
	));
	//echo '<p><a href="',$loginUrl,'" target= "top">login to Game</a></p>';
	echo "<script> top.location.href='".$loginUrl."'</script>";

}
//===END check if the user is connected to FB=== 

?>