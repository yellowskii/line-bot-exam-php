<?php
		echo "WELCOME TO JURASSIC PARK<br><br>";

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
				
				$strSQL = "SELECT medapp.HN, medapp.clinic, medapp.doctor, medapp.appoint_date
						FROM medapp
						JOIN account
						ON medapp.HN = account.HN";
			
				$result = mysqli_query($conn,$strSQL);
				while($row = mysqli_fetch_array($result)) {
					$dbtext = "HN ".$row["0"]." ไ้ด้มีนัดที่ ".$row["1"]." กับหมอ ".$row["2"]." ในวันที่ ".$row["3"];
				}


echo $dbtext;

?>
