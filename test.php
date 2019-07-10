<?php
		echo "WELCOME TO JURASSIC PARK";

		//Get DB
				$server = "118.172.127.41";
				$suser = "botadmin";
				$spassword = "ktb5570";
				$database = "ktb-line-bot";
			

				$conn = mysqli_connect($server,$suser,$spassword,$database);


				if(mysqli_connect_error()) 
					echo "Connection Error. ".mysqli_connect_error(); 
				    else
					echo "Database Connection Successfully."; 
				
				$strSQL = "SELECT HN
						   FROM medapp";
			
				$result = mysqli_query($conn,$strSQL);
				while($row = mysqli_fetch_assoc($result)) {
					$dbtext = "คุณ ".$row["HN"];
				}


echo $dbtext;

?>
