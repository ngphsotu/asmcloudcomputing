<html>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<head>
		<title>Database Test</title>
	</head>
	<link rel="stylesheet" href="style.css">
	<style type="text/css">
		body {
			width: 100%;
			height: 100%;
			background: url(background.jpg) no-repeat;
			background-size: cover;
		}
		p {
			text-align: center;
		}
	</style>
	<body>
		<p style="color:azure;"><strong>Name:</strong>Nguyen Phuc Son Tung</p>
		<p style="color:azure;"><strong>Class:</strong>GCD0819</p>
		<p style="color:azure;"><strong>ID:</strong>GCH16064</p>
		<br>
		<br>
		<div class="row">
			<div class="col-12">
				<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
				<div id="id01" class="modal">
					<form class="modal-content animate" method="post" name="myForm" action="\ConnectToDB.php">
						<div class="imgcontainer">
							<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
							<img src="sontung.jpg" alt="Avatar" class="avatar">
						</div>
						<div class="container">
							<label><b>Username</b></label>
							<input type="text" id="username" value="admin">
							<label><b>Password</b></label>
							<input type="password" id="password1" value="admin">
							<button type="submit" onclick="login1()">Login</button>
						</div>
						<div class="container" style="background-color:#f1f1f1">
							<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
			var modal = document.getElementById('id01');
			var username1 = document.getElementById("username").value;
			var password1 = document.getElementById("password1").value;
			function login1() {
			}
		</script>
	</body>
</html>