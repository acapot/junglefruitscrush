<?php

function Fb_connect($appId,$appSecret){
	
$facebook = new Facebook(array(
'appId' => $appId,
'secret' => $appSecret,
'cookie' => true

));

return $facebook;
}

function Fb_login_dialog($facebook,$state,$myUrl){

  
  $params = array(
  'scope' => 'email,publish_stream,read_friendlists',
  'redirect_uri' => $myUrl,
  'state' => $state
	);
$loginUrl = $facebook->getLoginUrl($params);

  
return("<script> top.location.href='".$loginUrl."'</script>");	
	
}

function showfriends($f,$session){
	$html = '';
	


	 // Define the custom sort function
	function custom_sort($a,$b) {
          return strcmp($a["name"],$b["name"]);
     }
	 //-----------------------------------
	
	
	//foreach($f["data"] as $friend){
		
     // Sort the multidimensional array
     usort($f["data"], "custom_sort");
    //------------------------------------
 



		foreach($f["data"] as $frnd){
			
		if(strlen($frnd["name"]) > 17){
		$optimized_name = substr($frnd["name"],0,14)."...";
		}else{
		$optimized_name = $frnd["name"];	
		}
		$profile_pic = "https://graph.facebook.com/".$frnd["id"]."/picture";
																	
		
		
		$html .= '<div class="challenges-group">';
		$html .= '<div class="challenges1">';
		$html .= '<div class="show_opponent_pic">';
		$html .= '<div class="fb_pic"><img src="'.$profile_pic.'"></div>';
		$html .= '</div>';
		$html .= '<div class="shownames"><span class="challenger_name">'.$optimized_name.'</br></span><span id="prize-pool">Win:</span><span class="prize-pool-amount"> 30 coins and 40 points</span></div>';
		//$html .= '<div class="shownames">'.$frnd["name"].'</div>';
		//$html .= '<div class="challengestatus1">Challenge</div>';
		
		
		if(isset($frnd["installed"]) && $frnd["installed"] == true){
			$active_challenge = verify_challenge($session, $frnd["id"]);
			if($active_challenge == 1){
				$friend_challenge_button = new Button_with_id($frnd["id"],$frnd["id"],"challengestatus2","","Sent");
				$html .= $friend_challenge_button->create_button();
			}else{
				$enough_coins = verify_coins($session);
				if($enough_coins == true){
					$friend_challenge_button = new Button_with_id($frnd["id"],$frnd["id"],"challengestatus1","newChallenge('{$frnd["id"]}','{$frnd["name"]}');","Challenge");
					$html .= $friend_challenge_button->create_button();
				}else{
					$friend_challenge_button = new Button_with_id($frnd["id"],$frnd["id"],"challengestatus2","getCoinsDialog();","Challenge");
				$html .= $friend_challenge_button->create_button();
					
				}
			}
			
		}else{
			//this part of kod we can set the botton "invite" but it dosen't exist this is way I wrote only challengestatus1 
			$friend_invite_button = new Button_with_id("",$frnd["id"],"challengestatus1","newChallenge_newUser({$frnd["id"]}, '{$frnd["name"]}','{$session}');","Invite");
			$html .= $friend_invite_button->create_button();
		}
		
		$html .= '</div>';
		$html .= '</div>';
		//$html .= '</div>';
		//$html .= '</div>';
				
		}
	//}
	//$html .= '</div>';
	return $html;
}

function show_search_result_friend($frnd, $session){
		$html = '';
		$profile_pic = "https://graph.facebook.com/".$frnd["id"]."/picture";
		$active_challenge = verify_challenge($session, $frnd["id"]);
		if(strlen($frnd["name"]) > 20){
		$optimized_name = substr($frnd["name"],0,17)."...";
		}else{
		$optimized_name = $frnd["name"];	
		}
		$html .= '<div class="challenges-group">';
		$html .= '<div class="challenges1">';
		$html .= '<div class="show_opponent_pic">';
		$html .= '<div class="fb_pic"><img src="'.$profile_pic.'"></div>';
		$html .= '</div>';
		$html .= '<div class="shownames"><span class="challenger_name">'.$optimized_name.'</br></span><span id="prize-pool">Win:</span><span class="prize-pool-amount"> 30 coins and 40 points</span></div>';
		
		if(isset($frnd["installed"]) && $frnd["installed"] == true){
			if($active_challenge == 1){
			$friend_challenge_button = new Button_with_id($frnd["id"],$frnd["id"],"challengestatus2","","Sent");
			$html .= $friend_challenge_button->create_button();
			}else{
				$enough_coins = verify_coins($session);
				if($enough_coins == true){
					$friend_challenge_button = new Button_with_id($frnd["id"],$frnd["id"],"challengestatus1","newChallenge('{$frnd["id"]}','{$frnd["name"]}');","Challenge");
					$html .= $friend_challenge_button->create_button();
				}else{
					$friend_challenge_button = new Button_with_id($frnd["id"],$frnd["id"],"challengestatus2","getCoinsDialog();","Challenge");
				$html .= $friend_challenge_button->create_button();
				}
			}
		}else{
			
			$friend_invite_button = new Button_with_id("",$frnd["id"],"challengestatus1","newChallenge_newUser({$frnd["id"]},'{$frnd["name"]}', '{$session}');","Invite");
			$html .= $friend_invite_button->create_button();
		}
		
		$html .= '</div>';
		$html .= '</div>';
				
		
	
	
	return $html;	
	
}
function getAccessToken($appId,$appSecret){
	$token_url ="https://graph.facebook.com/oauth/access_token?" .
                "client_id=" . $appId .
                "&client_secret=" . $appSecret .
                "&grant_type=client_credentials";
	$app_token = file_get_contents($token_url);
	$token = str_replace("access_token=", "", $app_token);

return $token;
}

function postUserFeed($facebook, $userid, $message, $link, $caption){
$args = array(
    'message'   => $message,
    'link'      => $link,
    'caption'   => $caption
);
$post_id = $facebook->api("/".$userid."/feed", "post", $args);

return $post_id;	
}


function getRandomFriend($frnds){
	
	$friend;
	$random_number = rand(0,(count($frnds['data']))-1);
	
	
	$friend = $frnds['data'][$random_number];
	
	return $friend;
	
}
?>