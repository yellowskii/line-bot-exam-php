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

				$strSQL = "SELECT medapp.fname, medapp.lname, medapp.HN, medapp.clinic, medapp.appoint_date
						FROM medapp
						LIMIT 3";

				$result = mysqli_query($conn,$strSQL);

				if (mysqli_num_rows($result) > 0) {
				    // output data of each row
				    while($row = mysqli_fetch_assoc($result)) {
							echo "คุณ".$row["0"]." ".$row["1"]."HN ".$row["2"]." ไ้ด้มีนัดที่ ".$row["3"]." ในวันที่ ".$row["4"]."<br>";
				    }
				} else {
				    echo "0 results";
				}


?>
