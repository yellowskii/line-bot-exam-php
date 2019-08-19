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
						LIMIT 3;";

				$result = mysqli_query($conn,$strSQL);

				if (mysqli_num_rows($result) > 0) {
				    // output data of each row
				    while($row = mysqli_fetch_assoc($result)) {
							echo "HN ".$row["0"]." ไ้ด้มีนัดที่ ".$row["1"]." กับหมอ ".$row["2"]." ในวันที่ ".$row["3"]."<br>";
				    }
				} else {
				    echo "0 results";
				}


?>
