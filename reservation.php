<?php
include "includes/db_connect.inc.php";

session_start();
$uTitle = $fName = $lName = $Email = $Nation = $Country = $Phone = $Troom = $Room = $Bed = $Nroom = $Mplan = $Tprice = $Cin = $Cout = $message = "";
$tempBed = $tempNum = 0;
$price= 1;
$mail =$_SESSION['useremail'];
$sql2 = "SELECT * FROM `users` WHERE `email` = '$mail'";
$result1 = mysqli_query($conn, $sql2);
$result_w = mysqli_fetch_array($result1);
		
		$fname = $result_w[1];
		$lname = $result_w[2];
		
		$email = $result_w[3];

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(!empty($_POST['title'])){
		$uTitle = mysqli_real_escape_string($conn, $_POST['title']);
	}
	if(!empty($_POST['F_name'])){
		$fName = mysqli_real_escape_string($conn, $_POST['F_name']);
	}
	if(!empty($_POST['L_name'])){
		$lName = mysqli_real_escape_string($conn, $_POST['L_name']);
	}
	if(!empty($_POST['email'])){
		$Email = mysqli_real_escape_string($conn, $_POST['email']);
	}
	if(!empty($_POST['nation'])){
		$Nation = mysqli_real_escape_string($conn, $_POST['nation']);
	}
	if(!empty($_POST['country'])){
		$Country = mysqli_real_escape_string($conn, $_POST['country']);
	}
	if(!empty($_POST['phone'])){
		$Phone = mysqli_real_escape_string($conn, $_POST['phone']);
	}
	if(!empty($_POST['troom'])){
		$Troom = mysqli_real_escape_string($conn, $_POST['troom']);
	}
	if(!empty($_POST['room'])){
		$Room = mysqli_real_escape_string($conn, $_POST['room']);
	}
	if(!empty($_POST['bed'])){
		$Bed = mysqli_real_escape_string($conn, $_POST['bed']);
		if($Bed=="Single") $tempBed = 250;
		else if($Bed=="Double") $tempBed = 300;
		else if($Bed=="Triple") $tempBed = 500;
		else if($Bed=="Quad") $tempBed = 800;
	}
	if(!empty($_POST['nroom'])){
		$Nroom = mysqli_real_escape_string($conn, $_POST['nroom']);
		$tempNum = (int)$Nroom;
	}
	if(!empty($_POST['mplan'])){
		$Mplan = mysqli_real_escape_string($conn, $_POST['mplan']);
	}
	
	if(!empty($_POST['cin'])){
		$Cin = mysqli_real_escape_string($conn, $_POST['cin']);
	}
	if(!empty($_POST['cout'])){
		$Cout = mysqli_real_escape_string($conn, $_POST['cout']);
	}
    $price = $tempBed * $tempNum;
      $sql = "INSERT INTO `booking_info`( `title`, `F_name`, `L_name`, `email`, `nation`, `country`, `phone`, `troom`, `room`, `bed`, `nroom`, `mplan`,`t_price`,`cin`, `cout`) 
	           VALUES ('$uTitle','$fName','$lName','$Email','$Nation','$Country','$Phone','$Troom','$Room','$Bed','$Nroom','$Mplan','$price','$Cin','$Cout');";
             

      mysqli_query($conn, $sql);
    
  
}

?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"  href="reservation.css">
<title>RESERVATION REST INN HOTEL</title>

</head>
<body>
<li>
<a  href="home.php"><h2 style="color:#09f9ea">Homepage</h2></a>
<a  href="User_view.php"><h2 style="color:#09f9ea">Appointment</h2></a>
</li>
<div align="center">
<h1 style="color:#09f9ea">RESERVATION</h1>
</div>
<form action="" method="POST">

<div class="ex">
<h1>PERSONAL INFORMATION</h1>

<div class="ex1">

<table>
<tr>
<td><label>Title*</label></td>
<td><select name="title" required>
<option value selected></option>
<option value="Dr.">Dr.</option>
<option value="Miss.">Miss.</option>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Prof.">Prof.</option>
<option value="Rev.">Rev.</option>
</select></td>

</tr>

<tr>
<td><label>First Name:</label></td>
<td><input type="text" name="F_name"  value="<?php echo $fname ?>"></td>
</tr>
<tr>
<td><label>Last Name:</label></td>
<td><input type="text" name="L_name"  value="<?php echo $lname ?>"></td>
</tr>
<tr>
<td><label>Email:</label></td>
<td><input type="text" name="email"  value="<?php echo $email ?>"></td>
</tr>


<tr>
<td><label>Nationality*</label></td>
<td><input type="radio" name="nation" value="Bangladesh"  checked="">Bangladesh</td>
<td><input type="radio" name="nation" value=" Non Bangladesh"  checked=""> Non Bangladesh</td>
</tr>


<?php

 $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

?>
<tr>
<td><label>Passport Country*</label></td>
<td><select name="country" required>
         <option value selected ></option>
                         <?php
			             foreach($countries as $key => $value):
						 echo '<option value="'.$value.'">'.$value.'</option>';
						endforeach;
						?>
                 

</select></td>
</tr>
<tr>
<td><label>Phone Number:</label></td>
<td><input type="text" name="phone"  required></td>
</tr>
</table>
<br>
</div>

<h1>RESERVATION INFORMATION</h1>


<div class="ex2">
<table>
<tr>
<td><label>Type Of Room *</label></td>
<td><select name="troom" required>
<option value selected></option>
<option value="Superior Room">SUPERIOR ROOM</option>
<option value="Deluxe Room">DELUXE ROOM</option>
<option value="Guest House">GUEST HOUSE</option>
<option value="Single Room">SINGLE ROOM</option>
</select></td>
</tr>
<tr>
<td><label>Room Type*</label></td>
<td><input type="radio" name="room" value="AC ROOM"  checked="">Ac Room</td>
<td><input type="radio" name="room" value=" Non AC ROOM"  checked=""> Non Ac Room</td>
</tr>
<tr>
<td><label>Bedding Type</label></td>
<td><select name="bed" required>
<option value selected></option>
<option value="Single">Single</option>
<option value="Double">Double</option>
<option value="Triple">Triple</option>
<option value="Quad">Quad</option>
<option value="None">None</option>
</select></td>
</tr>
<tr>
<td><label>No.of Rooms *</label></td>
<td><select name="nroom" required>
<option value selected></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
</select></td>
</tr>
<tr>
<td><label>Meal Plan</label></td>
<td><select name="mplan" required>
<option value selected></option>
<option value="Room only">Room only</option>
<option value="Breakfast">Breakfast</option>
<option value="Half Board">Half Board</option>
<option value="Quad">Full Board</option>
</select></td>
</tr>

<tr>
<td><label>Check-In</label></td>
<td><input type="date" name="cin"></td>
</tr>
<tr>
<td><label>Check-Out</label></td>
<td><input type="date" name="cout"></td>
</tr>
</table>
<br>
</div>
<br>

<div align="center">
<input type="submit" value="Book">
</div>




</form>
</div>





</body>
</html>
