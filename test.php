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
				
				$strSQL = "SELECT HN, fname, lname, cid,  appoint_date, clinic, doctor, tel, note 
						   FROM medapp
						   JOIN account
						   ON medapp.HN = account.HN";
			
				$result = mysqli_query($conn,$strSQL);
				while($row = mysqli_fetch_assoc($result)) {
					$dbtext = "คุณ ".$row["fname"]." ".$row["lname"]." นัดคลินิก ".$row["clinic"]." กับแพทย์ ".$row["doctor"]." คือวันที่ ".$row["appoint_date"];
				}


echo $dbtext;

?>
