<!DOCTYPE html>
<html>
<!--@author: PaulSaferio (Pamso) <owakipaul@gmail.com> -->
<head>
	<title>cakey</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" type="image/png" href="image/rest.png">
</head>
<body>
	<center >
		
		<br>
		<img src="image/rest.png" height="100" width="100"> 
			
		<div style="background-color: darksalmon;font-family: comic sans, cursive;color: lightyellow;
		 height: auto; font-size: 29px;">

			<button class="ab" onclick=" suggestshow() "> Suggest</button>
			cakes
			<button class="a" onclick=" adminshow() "> Admin</button>
		</div>
	</center>
	
	<div class="d1">
		.
		<table style="width: 70%; margin-left: 8%;">
			<tr>
				<td>
					<div class="head">
						<br>
						<img src="image/icon5.png" height="70" width="70" style="border-radius: 25px;"><br>
						<div class="head1">
							<h2>SHORTENNED</h2>
							We offer a wide Variety of  <br>shortenned or creamy cakes that<br> will sooth your cravings.<br><br>
							<button onclick="customershow() ">Click to order</button><br><br>

						</div>
						
						<br>
						
					</div>
				</td>
				<td>
					<div class="head2">
						<br>
						<img src="image/icon3.png" height="70" width="70" style="border-radius: 25px;"><br>
						<div class="head22">

							<h2>SPONGE</h2>
							We've got some of the best  sponge cakes available <br> that will and suit your occasion <br
							>and will <br>leave your lovesones<br> with smiles all day<br><br>
							<button onclick=" customershow() ">Click to order</button>
							<br>
						</div>
						<br>
					</div>
				</td>

				<td>
					<div class="head" style="margin-left: 58%;">
						<br>
						<img src="image/icon4.png" height="70" width="70" style="border-radius: 25px;"><br>
						<div class="head1">
							<h2>CHIFFON</h2>
							To you with a medium<br> ground for taste, got you <br>covered  with our delicious cakes<br><br>
							<button onclick="customershow() ">Click to order</button><br><br>

						</div>
						
						<br>
						
					</div>
				</td>
			</tr>
		</table>

		<br>
	

	</div><br>

	<div id="adminlog" class="modal"> <!-- This is the interface that carries Admin Login Form-->
		<div class="modal-content1" >
			<span class="cl" >&times;</span>	    
			<div class="modal-body">
				<center>
					<div class="login-page" style="width: 100%;">
							
						<img src="image/log.png" height="75" width="75">
							
						<form style="width: 100%; padding: 15%; background: transparent;box-shadow: -5px 5px 10px  black; " method="POST" action="login.php">
							<table>
									
								<tr>
									<td>
										<center>
											<input type="email" name="email" placeholder="Email">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<input type="password" name="pass" placeholder="Password">
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<center>
											<input type="submit" name="" value="Login" style="background-color:indianred;width: 100%; color: white;">
										</center>
									</td>
								</tr>

							</table>
						</form>

					</div>
				</center>    	
			</div>
		</div>
	</div>

	<!--// displaying the customer login popup -->
	<div id="customerpop" class="modal">
		<div class="modal-content1" >
			<span class="close" >&times;</span>	    
			<div class="modal-body" >
				<center>
					<div style="font-family:'Comic Sans MS', cursive, sans-serif; width: 65%;height: 37vw;">

							<label style="color: white;"> 
								Hello there You have to login first <br>
							</label> 
							
							<form method="POST" action="logs1.php" >
								<table>
									<tr><td>.</td></tr>
									<tr>
										<td>
											<center>
												<input type="email" name="email" placeholder="Email">
											</center>
										</td>
									</tr><tr><td>.</td></tr>
									<tr>
										<td>
											<center>
												<input type="password" name="pass" placeholder="Password">
											</center>
										</td>
									</tr>
									<tr><tr><td>.</td></tr>
										<td>
											<center>
												<input type="submit" name="" value="Login" style="background-color:black;width: 100%; color: white;">
											</center>
										</td>
									</tr><tr><td>.</td></tr>
									<tr>
										<td>
											<center>
												<label style="color: white;" onclick="registerhow()">
													Don't you have an account?... Click  here  to register
												</label>
											</center>
										</td>
									</tr>
								</table>
							</form> 
						</div>
				</center>    	
			</div>
		</div>
	</div>

	<div id="myMo"class="modal" > <!-- this is the popup code for USER REGISTRATION page -->
		<div class="modal-content2" >
			    
			<div class="modal-body">
				<center>
					

					<div style="font-family:'Comic Sans MS', cursive, sans-serif; width: 100%;height: 50vw;">
						<label style="color: white;"> 
							Hello there<br>
							Please give us the details for your registration 
						</label> 
						
						
						<form style="width: 60%; border: 3px solid moccasin; margin-left: 4px;" method="POST" action="">
							<br>
							<table>
								<tr>
									<td>
										<input type="text" name="fname" placeholder="firstname">
									</td>
								</tr>
								
								<tr>
									<td>
										<input type="text" name="lname" placeholder="lastname">
									</td>
								</tr>
								<tr>
									<td>
										.
									</td>
								</tr>
								<tr>
									<td>
										<input type="email" name="email" placeholder="email">
									</td>
								</tr>
								<tr>
									<td>
										<input type="text" name="id" placeholder="ID Number">
									</td>
								</tr>
								<tr>
									<td>
										<input type="number" name="phone" placeholder="phone">
									</td>
								</tr>

								<tr>
									<td>
										.
									</td>
								</tr>
								<tr>
									<td>
										 <input type="password" name="cpass" placeholder="Password">
									</td>
								</tr>
					
								<tr>
									<td>
										<input type="password" name="passw" placeholder="Confirm password">
									</td>
								</tr><tr>
									<td>
										.
									</td>
								</tr>
								<tr>
									<td>
										<input type="submit" name="reg" value="REGISTER" style="background-color:black;width: 100%; color: white;">
									</td>
								</tr>
							</table>
							<br>
						</form> 
					</div>
				</center>    	
			</div>
		</div>
		<?php
			// the following php code inserts user details to the database
				$conn= mysqli_connect('Localhost','root','','cake');
				if (isset($_POST['reg'])) {
					# code...
					$a=$_POST['fname'];
					$b=$_POST['lname'];
					$c=$_POST['email'];
					$d=$_POST['id'];
					$e=$_POST['phone'];
					$f=$_POST['cpass'];
					

				$clie = "INSERT INTO client (firstname, lastname, email, Id, phone, password )VALUES ('$a', '$b', '$c', '$d','$e','$f')";

						if (mysqli_query($conn, $clie)) {
							 
				   			

							echo "<script language=\"JavaScript\">\n";
							echo "alert('successfully added');\n";
							echo "window.location= 'index.php'";
							echo "</script>";
							
						
						}else{
							echo "<script language=\"JavaScript\">\n";
							echo "alert('there is an error in your input');\n";
							echo "window.location= 'index.php'";
							echo "</script>";
						}
						$conn.close();

				}
			?>
	</div>
	
	<div id="suggestpop"class="modal" >
		<div class="modal-contenti" >
			<span class="lc" >&times;</span>

			<div class="modal-body">

				<center>
					
					<br><br>
					<div style="font-family:'Comic Sans MS', cursive, sans-serif; width: 83%;height: 40vw;">
					<br>
						
						<form class="upl" enctype="multipart/form-data" method="POST" action="">

							<table>
								
								<tr>
									<td>
										Make your suggestions
									</td>
								</tr>
								<tr>
									<td>
										<input type="text" name="name" placeholder="NAME">
									</td>
								</tr>
								<tr>
									<td>
										Suggestion
									</td>
								</tr>
								<tr>
									<td>
										<textarea cols="40" rows="6" placeholder="DESCRIPTION" name="desc">
											
										</textarea>
									</td>
								</tr>
								
								<tr>
									<td>
										<input type="submit" name="san" value="Suggest" style="width: 100%;background: firebrick; color: lightyellow; padding: 10%;font-family:'Comic Sans MS', cursive, sans-serif;">
									</td>
								</tr>

							</table>
							
						</form> 
						<br>

						<?php

							#code to insert new suggestions into the Database...
							$conn= mysqli_connect('Localhost','root','','cake');
							if (isset($_POST['san'])) {
								
								$b=$_POST['name'];
								$c=$_POST['desc'];
								
							$sql = "INSERT INTO sugge ( name, suggestion )VALUES ('$b', '$c')";

									if (mysqli_query($conn, $sql)) {
										 
										echo "<script language=\"JavaScript\">\n";
										echo "alert('successfully added');\n";
										echo "window.location= 'index.php'";
										echo "</script>";
										
									
									}else{
										echo "<script language=\"JavaScript\">\n";
										echo "alert('there is an error in your input');\n";
										echo "window.location= 'index.php'";
										echo "</script>";
									}
									$conn.close();

							}
						?>
					</div>

				</center>

			</div>

		</div>
	</div>

	<footer>
		<br>
		<div class="foot">
			<br>
			<a href="">
				<img style="height: 30px; width: 30px;" src="image/linkedin.png"  >
			</a>
			<a href="">
				<img  style="height: 30px; width: 30px;"src="image/facebook.png" >
			</a>
			<a href="">
				<img style="height: 30px; width: 30px;" src="image/email.png" >
			</a>
			<br>
			&copy 2021 CAKEY All rights reserved.
			<br>
		</div>

	</footer>

</body>

<script type="text/javascript">

	var admi = document.getElementById('adminlog');
	var sugg = document.getElementById('suggestpop');
	var span = document.getElementsByClassName("cl")[0];
	var span1 = document.getElementsByClassName("lc")[0];
	var span2 = document.getElementsByClassName("close")[0];
	var span3 = document.getElementsByClassName("clos")[0];
	var span4 = document.getElementsByClassName("clo")[0];
	var cust = document.getElementById("customerpop");
	var mode = document.getElementById('myMo');
	
	// The codes below enables the pop up to show 	
	function adminshow() {
		  admi.style.display = 'block';
	}

	function suggestshow() {
		 sugg.style.display = "block";
	}

	function customershow() {
		  cust.style.display = "block";
	}
	function registerhow() {
		  mode.style.display = "block";
	}
	function chifshow() {
		  chiffo.style.display = "block";
	}

	// The code below is for the close buttons of every popup
	span.onclick = function() {
		  admi.style.display = "none";
	}
	span1.onclick = function() {
		  sugg.style.display = "none";
	}
	span2.onclick = function() {
		  cust.style.display = "none";
	}
	span3.onclick = function() {
		  spon.style.display = "none";
	}
	span4.onclick = function() {
		  chiffo.style.display = "none";
	}

	// The codes below disables the popup windows whenever there is a mouse click outside the window.
	window.onclick = function(event) 
	{
		if (event.target == admi) {
		    admi.style.display = "none";
		}
		if (event.target == cust) {
		    cust.style.display = "none";
		}
		if (event.target == mode) {
		    mode.style.display = "none";
		}
		if (event.target == chiffo) {
		    chiffo.style.display = "none";
		}
		if (event.target == sugg){
		  	sugg.style.display = "none";
		  }
		if (event.target == mode){
		  	mode.style.display = "none";
		  }
	}

</script>

</html>