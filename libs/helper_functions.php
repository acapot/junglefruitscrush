<?php
  function form_control_wrapper() {
    return '<div>';
  }

  function form_label($for, $text) {
    return '<label class="wrapper-inline" for="'.$for.'">'.$text.'</label>';
  }

  function text_area($name, $label_text, $value = '') {
    $html = form_control_wrapper();
    $html .= form_label($name, $label_text);
    $html .= '<div>';
    $html .= '<textarea id="'.$name.'" name="'.$name.'" rows="3">'.$value.'</textarea>';
    $html .= "</div>";
    $html .= "</div>";

    return $html;
  }

 function showfriends($f){
	$html = '';
	
	foreach($f as $friend){
	asort($friend);
		foreach($friend as $frnd){
		$profile_pic = "http://graph.facebook.com/".$frnd["id"]."/picture";
				 
		$html .= '<div class="friend-wrapper">';
		$html .= '<div class="friend_pic"><img src="'.$profile_pic.'"></div>';
		$html .= '<div class="friend">'.$frnd["name"].'</div>';
		$html .= '<div id="'.$frnd["id"].'" class="newchallenge" onClick="newChallenge('.$frnd["id"].',\''.$frnd["name"].'\');">Challenge</div>';
		$html .= '</div>';
				
		}
	}
	
	return $html;
}

function openScrollDiv(){
	$html = '<div id="scrollbar1">';
    $html .= '<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>';
    $html .= '<div class="viewport">';
    $html .= '<div class="overview">';	
	
	return $html;
}

function closeScrollDiv(){
	$html = '</div>';
	$html .='</div>';
	$html .='</div>';
}

function showChallenges($challenges,$userid){
		$html = '';
		$classCSS;
		$name;
		$status;
		foreach($challenges["challenges"] as $challenge){
			if($userid == $challenge['challenger_id']){
				$classCSS = "challenges1";	
				$name = $challenge["opponent_name"];
				if($challenge["round"] == 0){
					$status = "Waiting";
				}
				else if($userid == $challenge['turn']){
					$status = "Play";
				}
				else if($challenge['opponent_id'] == $challenge['turn']){
					$status = "Waiting";
				}
			}
			else if($userid == $challenge['opponent_id']){
				$classCSS = "challenges2";
				$name = $challenge["challenger_name"];
				if($challenge["round"] == 0){
					$status = "Accept";
				}
				else if($userid == $challenge['turn']){
					$status = "Play";
				}
				else if($challenge['challenger_id'] == $challenge['turn']){
					$status = "Waiting";
				}
			}
			
		$html .= '<div class="challenges-group">';
		$html .= '<div class="'.$classCSS.'">';
		$html .= '<div class="shownames">Me</div>';
		$html .= '<div class="shownames">VS.</div>';
		$html .= '<div class="shownames">'.$name.'</div>';
		$html .= '</div>';
		$html .= '<div class="challengestatus">Round: '.$challenge["round"].'</div>';
		$html .= '<div class="challengestatus">'.$status.'</div>'; 
		$html .= '</div>';
		}
		
		return $html;
	}
		
		
	
	