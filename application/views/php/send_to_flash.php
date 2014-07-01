<?php
		require_once('../../../config.php'); 
		//$db = new Db();
  		$friends = $_SESSION['friends'];
		$userId = 29;
			
		//$user = $db->getUserById($userId);	
		//var_dump($user);
		//echo "phpconfirm = '1'";
		
		// $xml = "<?xml version='1.0' encoding='utf-8'
		//>\n";
		/* $xml_content='<?xml version="1.0"?>
     <System5XML>
      <Invoice>
       <WebInvoiceID>hhhhwwwww</WebInvoiceID>
      
      
       <OrderTime>asxsaxsaxasxas</OrderTime>
      </Invoice>
     </System5XML>';
    $xml = new SimpleXMLElement($xml_content);
  echo $xml->asXML(); */
		 
		 
		 /* header("Content-Type: text/xml");
		  echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		  echo "<field>\n";
		  echo "<id>".$user[0]['id']. "</id>\n";
		  echo "<firstname>".$user[0]['first_name']. "</firstname>\n";
		  echo "<lastname>".$user[0]['last_name']. "</lastname>\n";
		  echo "<email>".$user[0]['email']. "</email>\n";
		  echo "<guldbars>".$user[0]['guld_bars']. "</guldbars>\n";
		  echo "<lives>".$user[0]['lives']. "</lives>\n";
		  echo "<level>".$user[0]['level']."</level>\n";
		  echo "</field>\n";
 		  echo "</xml>";*/
		 
		 header("Content-Type: text/xml");
		 echo "<?xml version='1.0' encoding='utf-8'";
		 echo "?>\n";
		  echo "<friends>\n";
		  foreach($friends as $frnd)
		  {
		 	 
			 	 foreach($frnd as $f)
				 {
				 	echo "<friend>\n";
						echo '<name>'.$f['name'].'</name>';
						echo '<id>'.$f['id'].'</id>';
						
						if(isset($frnd["installed"]) && $frnd["installed"] == true){
						echo '<installed>'.$f['installed'].'</installed>';
						}
						
						else
						{
							echo '<installed>no</installed>';
						}
						
						echo '<pic>http://graph.facebook.com/'.$f['id'].'/picture</pic>';
				 	echo "</friend>\n";
				 }
			 	  
		  }
		   echo "</friends>";
		  
		 /* echo "<fields lives='5'>\n";
		  echo "<field>\n";
		  echo "<id>".$user[0]['id']. "</id>\n";
		  echo "<firstname>".$user[0]['first_name']. "</firstname>\n";
		  echo "<lastname>".$user[0]['last_name']. "</lastname>\n";
		  echo "<email>".$user[0]['email']. "</email>\n";
		  echo "<guldbars>".$user[0]['guld_bars']. "</guldbars>\n";
		  echo "<lives>".$user[0]['lives']. "</lives>\n";
		  echo "<level>".$user[0]['level']."</level>\n";
		  echo "</field>\n";
 		  echo "</fields>";*/
?>