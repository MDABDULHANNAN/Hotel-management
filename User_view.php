<?php
	
	session_start();
	if(isset($_SESSION['useremail'])){
		$uEmail = $_SESSION['useremail'];
		
		$conn = mysqli_connect('localhost', 'root', '', 'example');
		$sql="SELECT * FROM `booking_info` WHERE `email` = '$uEmail'";
		$result=mysqli_query($conn, $sql);
		$temp_result = mysqli_query($conn, $sql);
		$rowt=mysqli_fetch_array($temp_result);
		$tempc_name = $rowt[2];
		
	}
		
		 if(isset($_POST['btnCancel'])){
			$_SESSION['useremail'] = $uEmail;
			header("location: logout.php");
		} 
		
		if(isset($_POST['btnSave'])){
			$uEmail = $_POST['txtuemail'];
			$phone = $_POST['txtphone'];
			$room = $_POST['selectroom'];
			$cin = $_POST['datecin'];
			$cout = $_POST['datecout'];
			$sql2 = "UPDATE `booking_info` SET `phone`='$phone',`nroom`='$room',`cin`='$cin',`cout`='$cout' WHERE `email`='$uEmail'";
			mysqli_query($conn, $sql2);
			$_SESSION['useremail'] = $uEmail;
			header("location: User_view.php");
		}
	
	
	
	
	
	
?>



<head>
<title>User View</title>
<link rel="stylesheet" href="style.css">
	<style>
		body{
			background:url('Background.jpg');
			background-size:fullscreen;
			background-repeat:no-repeat;
			margin:0;
			padding:0;
			font-family:Arial;
		}
		.profile-view{
			margin:auto;
			width:800px;
			box-shadow:0px 8px 16px 0px rgba(0,0,0,0.9);
			padding:10px 40px;
			margin-top:85px;
			background:#F1F1F9;
			background:linear-gradient(top, #3c3c3c 0%, #222222 100%);
		}
		input[type=submit]{
			border:none;
			outline:none;
			padding:10px;
			color:#fff;
			font-size:16px;
			font-family:Arial;
			background:#FE2E64;
			cursor:pointer;
			border-radius:20px;
		}
		input[type=submit]:hover{
			background:#F7BE81;
			color:#262626;
		}
     
 
	</style>
	
 
</head>



<body>
  <!-- =============== homepage header start from here ================== -->
 
 <div class="home-header">
 	
 	<div class="mid">
 		<div class="home-name">
 			<h1><span>Rest Inn</span> <span>Hotel</span></h1>
 			<h4>Your Dream Hotel</h4>
 		</div>
 		<div class="menu">
 		<ul>
 			
 			
 		</ul>
 		</div>

 	</div>

 </div>



	<div class="profile-view">
		<form action="User_view.php" method="post">
			<div class="top-view" align="left">
				<table>
				<tr>
					<th></th>
					<th></th>
				</tr>
				<tr>
					<td><img src="" class="userlogo"></td>
					<td><h2 style="color: #585858;" >Reserved Room</h2>
					</td>
				</tr>
				</table>
				<hr/>
			</div>
			
			<div class="user-info" align="left">
				<table style="width: 100%; border:1px; border-collapse: collapse;">
					<tr>
						<th style="background-color: #2ECCFA; color: white; text-align: left;
							padding: 8px;"><h4 align="center"><h4 align="center">First Name</h4></th>
						<th style="background-color: #2ECCFA; color: white; text-align: left;
							padding: 8px;"><h4 align="center"><h4 align="center">Last Name</h4></th>
						<th style="background-color: #2ECCFA; color: white; text-align: left;
							padding: 8px;"><h4 align="center"><h4 align="center">Email</h4></th>
						<th style="background-color: #2ECCFA; color: white; text-align: left;
							padding: 8px;"><h4 align="center"><h4 align="center">Phone</h4></th>
						<th style="background-color: #2ECCFA; color: white; text-align: left;
							padding: 8px;"><h4 align="center"><h4 align="center"> No of Bed</h4></th>
						<th style="background-color: #2ECCFA; color: white; text-align: left;
							padding: 8px;"><h4 align="center"><h4 align="center">Check In</h4></th>
						<th style="background-color: #2ECCFA; color: white; text-align: left;
							padding: 8px;"><h4 align="center"><h4 align="center">Check Out</h4></th>
						<th style="background-color: #2ECCFA; color: white; text-align: left;
							padding: 8px;"><h4 align="center"><h4 align="center">Payment</h4></th>
					</tr>
					
					<?php
						while($row=mysqli_fetch_array($result)){
							$F_name = $row[2];
							$L_name = $row[3];
							$email = $row[4];
							$phone = $row[7];
							
							$nroom = $row[11];
							$cin = $row[14];
							$cout = $row[15];
							$t_price = $row[13];
							echo "<tr>";
							echo "<td style='text-align: center;padding: 8px;'> {$F_name} </td>";
							echo "<td style='text-align: center;padding: 8px;'> {$L_name} </td>";
							echo "<td style='text-align: center;padding: 8px;'> {$email} </td>";
							echo "<td style='text-align: center;padding: 8px;'> {$phone} </td>";
							echo "<td style='text-align: center;padding: 8px;'> {$nroom} </td>";
							echo "<td style='text-align: center;padding: 8px;'> {$cin} </td>";
							echo "<td style='text-align: center;padding: 8px;'> {$cout} </td>";
							echo "<td style='text-align: center;padding: 8px;'> {$t_price} </td>";
							echo "</tr>";
						}
					?>
				</table>
				<hr/>
			</div>
			<br/>
			
			<div align="center">
				<input type="submit" name="btnCancel" value="logout">
				<input type="submit" name="btnUpdate" value="update">
				<br>
				<br>
			</div>
			
			<div class="updateUser">
				<?php
				if(isset($_POST['btnUpdate'])){
				/* while($row=mysqli_fetch_array($result)){
					$email = $row[4];
					$phone = $row[7];
							
					$nroom = $row[11];
					$cin = $row[13];
					$cout = $row[14];
					} */
					echo "Email: <input type='text' name='txtuemail' value=''>";
					echo "Phone: <input type='text' name='txtphone' value=''>";
					echo "Room: <input type='text' name='selectroom' value=''>";
					
					echo "Cin: <input type='text' name='datecin' value=''>";
					echo "Cout: <input type='text' name='datecout' value=''>";
					echo "<input type='submit' name='btnSave' value='Save' align='right'> ";
					
				}
				?>
			</div>
			
			
			
			
		
		</form>
	</div>
</body>