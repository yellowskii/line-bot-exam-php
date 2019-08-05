<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">

    <title>ระบบลงทะเบียนการใช้งานKTB LINE bot</title>
  </head>
  <body>

  <div class="container border border-primary m-auto p-5 p-2" style="width: 860px;">

    <h1 class="text-center" >ระบบลงทะเบียนการใช้งานKTB LINE bot</h1>

	<form  id="myForm" action="result.php" method="post" >

        <div class="form-group">
          <label for="uid">LINEID</label>
          <input type="text" class="form-control" name="uid" id="uid" value="13458791" required>

        </div>

        <div class="form-group">
          <label for="name">ชื่อ นามสกุล</label>
          <input type="text" class="form-control" name="name" id="name" required>

        </div>

        <div class="form-group">
					<label for="date">เลขประจำตัวประชาชน</label>
					<input type="text" class="form-control" name="cid" id="cid" required>

			  </div>

				 <div class="text-center">
				  <button type="submit" class="btn btn-primary" name="submit">ค้นหา</button><br><br>


				 </div>

			</form>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/popper.js"></script>
  <script>

      $(document).ready(function(){

          liff.init(
            data => {
              // Now you can call LIFF API
              const userId = data.context.userId;
            },
            err => {
              // LIFF initialization failed
            }
            );

            $("#uid").val(liff.userId);
      });


  </script>
  </body>
</html>
