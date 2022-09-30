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
			<?php
			session_start();
			echo $_SESSION['name1']." ".$_SESSION['name2'];
			?>
			<a href="logout.php">
				<button class="a" > Logout</button>
			</a>
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
							<button onclick="shotshow() ">Click to order</button><br><br>

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
							<button onclick=" spongeshow() ">Click to order</button>
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
							<button onclick="chifshow() ">Click to order</button><br><br>

						</div>
						
						<br>
						
					</div>
				</td>
			</tr>
		</table>

		<br>
	

	</div><br>
	<div style="overflow-y: scroll; height: 15vw;">Previous Orders
		            	<?php
		            		$conn= mysqli_connect('localhost','root','','cake');
		            		$pre= $_SESSION['name1'];
		            		$pr= $_SESSION['name2'];

		            		$sq= "SELECT * from orders where cname like '$pre $pr'";
		            		if (mysqli_query($conn, $sq)) {
						  	$data=mysqli_query($conn,$sq);	
						  	echo "<table id='tabl2'style='width:100%;'>";
									
									echo "<tr>
											<th> TIME</th>
											<th> DATE </th>
											<th> CAKE </th>
											<th> TYPE </th>
											<th> DELIVERY </th>
											<th> QUANTITY </th>
											<th> PAYMENT </th>
											<th> APPROVAL </th>
											
											
									</tr>";			
							
								while ($row =  mysqli_fetch_assoc($data)) {

									echo '<tr >';
									
									echo "<td> ". $row['timen']."</td>";
									echo "<td> ". $row['datel']."</td>";
									echo "<td> ". $row['name']."</td>";
									echo "<td> ". $row['type']."</td>";
									echo "<td> ". $row['delitype']."</td>";
									echo "<td> ". $row['quantity']."</td>";
									echo "<td> ". $row['payment']."</td>";
									echo "<td> ". $row['approval']."</td>";
									
									
									echo "</tr>";
									
								}
								echo "</table>";
							}
				
		            	?>
		            </div>

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

	<!--// displaying the Sponge cakes popup -->
	<div id="shotpop" class="modal">
		<div class="modal-content" >
			<span class="close" >&times;</span>	    
			<div class="modal-body" >
				<center>
					<div style="width: 100%; ">
						
						<?php

							$conn= mysqli_connect('Localhost','root','','cake');// This line of code connects you to the database.

						    if(!$conn){
						      echo "Error in connection";// If theres no connection it will out put the words in quotes.
						    }

						    $sql= "SELECT * FROM short ORDER BY RAND() LIMIT 8 ";
						    //The above line collects all data in te table short in random order .

						    $result = $conn->query($sql);
						    $rows = $result->num_rows;    // Find total rows returned by database
						    if($rows > 0) 
						    {
							     $cols = 3;    // Define number of columns
							     $counter = 1;     // Counter used to identify if we need to start or end a row
							     $nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
							     
							     echo '<table width="100%" align="center" cellpadding="4" cellspacing="1">';

							     while ($row = $result->fetch_array()) {
							         if(($counter % $cols) == 1) 
							          {    // Check if it's new row
							             echo '<tr>'; 
							             
							          }

							           $img = "image/".$row['image'];// declares the file path where the image is stored.
							           echo '<td>
							           			<h5 style="color: white;">'.$row['name'].'</h5>
							           			<img src="'.$img.'" alt="'.$row['name'].'" height="300" width= "450">
							           			<p style="color: white;">'.$row['Description'].'</p> 
							           			
							           			<a href= "order.php?hid='.$row['id'].'&nam='.$row['name'].'&cak=short">
							           				<button class="but">ORDER NOW!</button>
							           			</a> 
							           				
							           		</td>';

							           if(($counter % $cols) == 0) 

							           { // If it's last column in each row then counter remainder will be zero
							            echo '</tr>'; 
							           }

							           $counter++;    // Increase the counter
							     }
							     $result->free();
							     if($nbsp > 0) { // Add unused column in last row

							       for ($i = 0; $i < $nbsp; $i++) { 
							       echo '<td>&nbsp;</td>'; 
							       }
							       echo '</tr>';
							     }
							     echo '</table>';
						                  
						     }
							     
						?>	
							
					</div>
				</center>    	
			</div>
		</div>
	</div>

	<!-- sponge cake popup-->
	<div id="spongepop" class="modal">
		<div class="modal-content" >
			<span class="clos" >&times;</span>	    
			<div class="modal-body">
				<center>
					<div style="width: 100%;">
							
						<?php

							$conn= mysqli_connect('Localhost','root','','cake');// This line of code connects you to the database.

						    if(!$conn){
						      echo "Error in connection";// If theres no connection it will out put the words in quotes.
						    }

						    $sql= "SELECT * FROM sponge ORDER BY RAND() LIMIT 8 ";
						    //The above line collects all data in te table sponge in random order .

						    $result = $conn->query($sql);
						    $rows = $result->num_rows;    // Find total rows returned by database
						    if($rows > 0) 
						    {
							     $cols = 3;    // Define number of columns
							     $counter = 1;     // Counter used to identify if we need to start or end a row
							     $nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
							     
							     echo '<table width="100%" align="center" cellpadding="4" cellspacing="1">';

							     while ($row = $result->fetch_array()) {
							         if(($counter % $cols) == 1) 
							          {    // Check if it's new row
							             echo '<tr>'; 
							             
							          }

							           $img = "image/".$row['image'];
							           echo '<td>
							           			<h5 style="color: white;">'.$row['name'].'</h5>
							           			<img src="'.$img.'" alt="'.$row['name'].'" height="300" width= "450">
							           			<p style="color: white;">'.$row['Description'].'</p> 
							           			
							           			<a href= "order.php?hid='.$row['id'].'&nam='.$row['name'].'&cak=sponge">
							           				<button class="but">ORDER NOW!</button>
							           			</a> 
							           				
							           		</td>';

							           if(($counter % $cols) == 0) 

							           { // If it's last column in each row then counter remainder will be zero
							            echo '</tr>'; 
							           }

							           $counter++;    // Increase the counter
							     }
							     $result->free();
							     if($nbsp > 0) { // Add unused column in last row

							       for ($i = 0; $i < $nbsp; $i++) { 
							       echo '<td>&nbsp;</td>'; 
							       }
							       echo '</tr>';
							     }
							     echo '</table>';
						                  
						     }
							     
						?>	
					</div>
				</center>    	
			</div>
		</div>
	</div>

	<!-- chiffon cake popup-->
	<div id="chifpop" class="modal">
		<div class="modal-content" >
			<span class="clo" >&times;</span>	    
			<div class="modal-body">
				<center>
					<div style="width: 100%;">
							
						<?php

							$conn= mysqli_connect('Localhost','root','','cake');// This line of code connects you to the database.

						    if(!$conn){
						      echo "Error in connection";// If theres no connection it will out put the words in quotes.
						    }

						    $sql= "SELECT * FROM chiff ORDER BY RAND() LIMIT 8 ";
						    //The above line collects all data in te table chiff in random order .

						    $result = $conn->query($sql);
						    $rows = $result->num_rows;    // Find total rows returned by database
						    if($rows > 0) 
						    {
							     $cols = 3;    // Define number of columns
							     $counter = 1;     // Counter used to identify if we need to start or end a row
							     $nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
							     
							     echo '<table width="100%" align="center" cellpadding="4" cellspacing="1">';

							     while ($row = $result->fetch_array()) {
							         if(($counter % $cols) == 1) 
							          {    // Check if it's new row
							             echo '<tr>'; 
							             
							          }

							           $img = "image/".$row['image'];
							           echo '<td>
							           			<h5 style="color: white;">'.$row['name'].'</h5>
							           			<img src="'.$img.'" alt="'.$row['name'].'" height="300" width= "450">
							           			<p style="color: white;">'.$row['Description'].'</p> 
							           			
							           			<a href= "order.php?hid='.$row['id'].'&nam='.$row['name'].'&cak=chiff">
							           				<button class="but">ORDER NOW!</button>
							           			</a> 
							           				
							           		</td>';

							           if(($counter % $cols) == 0) 

							           { // If it's last column in each row then counter remainder will be zero
							            echo '</tr>'; 
							           }

							           $counter++;    // Increase the counter
							     }
							     $result->free();
							     if($nbsp > 0) { // Add unused column in last row

							       for ($i = 0; $i < $nbsp; $i++) { 
							       echo '<td>&nbsp;</td>'; 
							       }
							       echo '</tr>';
							     }
							     echo '</table>';
						                  
						     }
							     
						?>	
							
					</div>
				</center>    	
			</div>
		</div>
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
	var shott = document.getElementById("shotpop");
	var spon = document.getElementById('spongepop');
	var chiffo = document.getElementById('chifpop');
	
	// The codes below enables the pop up to show 	
	function adminshow() {
		  admi.style.display = 'block';
	}

	function suggestshow() {
		 sugg.style.display = "block";
	}

	function shotshow() {
		  shott.style.display = "block";
	}
	function spongeshow() {
		  spon.style.display = "block";
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
		  shott.style.display = "none";
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
		if (event.target == shott) {
		    shott.style.display = "none";
		}
		if (event.target == spon) {
		    spon.style.display = "none";
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