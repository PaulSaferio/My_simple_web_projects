<?php 
	session_start();
	$conn=mysqli_connect('Localhost','root','','exam');
	
?>
<!DOCTYPE html>
<html>
<!--@author: PaulSaferio (Pamso) <owakipaul@gmail.com> -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type="text/css">
		body{
		  margin: 0;
		  font-family: Maiandra GD;
		  background-color: #E1AD01;
		}
		.d1{ width: 25%;
			margin-left: 15px;
			float: left;
			margin-top: 2%;
			 background-color:black;
			 height: 42vw; 
			
		}
		 .d2{
		    margin-left: 1%;
		    width: 85%;
		    padding: 4.5%;
		    font-size: 19px;
		    background-color:  coral;
		    cursor: pointer;
		    color: cornsilk;
		    
		  }
		  .d2:hover{
		    border-radius: 4px;
		    background-color:  #E1AD01;
		    border: none;
		    color: black;
		    text-align: center;
		    transition: all 0.5s;
		    box-shadow: 1px 1px 15px coral;
		  }
		.d3{
			 width: 72%;
			 float: right;
			 margin-right: 1%;
		}
		.d4{
		    margin-left: 1%;
		    width: 12%;
		    padding: 0.6%;
		    font-size: 12px;
		    background-color:  coral;
		    cursor: pointer;
		    color: navy;
		    
		  }
		  .d4:hover{
		    border-radius: 4px;
		    background-color:  cornsilk;
		    border: none;
		    color: black;
		    text-align: center;
		    transition: all 0.5s;
		    box-shadow: 1px 1px 15px coral;
		  }

		.but{
			color: cornsilk;
			background-color: coral;
			display: block;
			padding: 14px 16px;
			text-decoration: none;
			border: none;
			width: 60%;
			font-family: Maiandra GD;
			font-size: 30px;
			 border-radius: 25px;
		}
		a{
			text-decoration: none;
		}
		footer{
		  text-align: center;
		  background: cornsilk;
		  height: 8vw;
		}
		.foot{
		  background: #E1AD01;
		  
		  margin top: 15%;
		  color: black;

		}
		#us {
			display: none;
		}
		#ex {
			display: none;
		}
		#sc {
			display: none;
		}
		select{
			opacity: 0.9;
		    border:none;
		    outline: none;
		    height: 35px;
		    color: black;
		    font-size: 15px;
		    padding: 25px;
		    width: 100%;

		}
	</style>
</head>
<body>
	<center>
		
		<div style="width: 90%;opacity: 0.85; height: 45vw; background-color: cornsilk; margin-top: 3.5%; box-shadow: 1px 1px 15px black;">

			<div class="d1">
				<h1 style="float: left;font-family: comic sans, cursive;color: cornsilk;margin-left: 2%; font-size: 25px; margin-left: 5%;">
								Lecturer
				</h1><br><br><br><br><hr style="border: 3px solid cornsilk;">
				<br><br>

				<div class="d2" onclick="ev()">
					<center>
						EXAM TIMETABLE
					</center>
				</div>
				
				<br>
				<div class="d2" onclick="dri()"> 
					<center>
						CHANGE PASSWORD
					</center>
				</div>
				<br>
				
				<a href="logout.php">
					<div class="d2"> 
						<center>
							LOGOUT
						</center>
					</div>
				</a><br><br>

				<footer>
					<br>
					<div class="foot">
						<br>
						<a href="">
							<img style="height: 30px; width: 30px;" src="image/linkedin.png"  >
						</a>
						<a href="">
							<img  style="height: 30px; width: 30px;"src="image/email.png" >
						</a>
						<a href="">
							<img style="height: 30px; width: 30px;" src="image/facebook.png" >
						</a>
						<br>
						&copy 2021 EXAM All rights reserved.
						<br>
					</div>

				</footer>
			</div>
			<div class="d3">
				<h1 style="font-size: 17px; float: left;">Welcome: <?php echo $_SESSION['name1']; echo " "; echo $_SESSION['name2']; ?></h1>
				<div style="width: 100%; height: 40.8vw; border: 5px solid black;float: right;">
					<div id="sc">
						<div id="pi1">

						<div style="overflow-y: scroll; height: 39.5vw;width: 86%;float: right;">
							<?php

							#code to display the Exam timetable from the Databse...
							$sql="SELECT * FROM `timetable`";
							if (mysqli_query($conn, $sql)) {
							  	$data=mysqli_query($conn,$sql);	
							  	echo "<table id='tablt' style='width: 100%;'>";
										echo "<caption>Exam Timetable</caption> ";
										echo "<tr>

												<th> #</th>
												<th> UnitID</th>
												<th> Unit</th>
												<th> Faculty</th>
												<th> Time</th>
												<th> Date</th>
												<th> Venue</th>
												<th> Invigilator</th>
																											
										</tr>";			
								
									while ($row =  mysqli_fetch_assoc($data)) {
										
		 		
										echo '<tr >';
										
										echo "<td> ". $row['examid']."</td>";
										echo "<td> ". $row['unitid']."</td>";
										echo "<td> ". $row['unit']."</td>";
										echo "<td> ". $row['faculty']."</td>";
										echo "<td> ". $row['time']."</td>";
										echo "<td> ". $row['date']."</td>";
										echo "<td> ". $row['venue']."</td>";
										echo "<td> ". $row['invigi']."</td>";
										
										
									
																						
										echo "</tr>";
										
									}
									echo "</table>";
							}

					
						?>

						</div><br>
						
						<div class="d4" onclick="pr5()"style="float: left;"> Print</div> 
					</div>
				</div>
							

						
				</div>
			</div>

		</div>

		<div id="myModal"class="modal" >
					<div class="modal-contenti" >
						<span class="close" >&times;</span>	    
						<div class="modal-body">
							<center>
								
								<br><br>
								<div style="font-family:'Comic Sans MS', cursive, sans-serif; width: 83%;height: 40vw;">
								<br>
									
										<form class="upl" method="POST" action="">
											<table>
												
												<tr>
													<td>
														<input type="password" name="cp" placeholder="Enter Current password">
													</td>
												</tr>
												<tr>
													<td>
														<input type="password" name="np" placeholder=" New password">
													</td>
												</tr>
												<tr>
													<td>
														<input type="password" name="cnp" placeholder="Confirm new password">
													</td>
												</tr>

												<tr>
													<td>
														
													</td>
												</tr>
												
												<tr>
													<td>
														<input type="submit" name="dir" value="change" style="width: 100%;background: firebrick; color: lightyellow; padding: 10%;font-family:'Comic Sans MS', cursive, sans-serif;">
													</td>
												</tr>
											</table>
											
										</form> 
										<br>

										<?php

											#code to change password from the Database...
											if (isset($_POST['dir'])) {
												# code...
												$a=$_POST['cp'];
												$b=$_POST['np'];
												$c=$_POST['cnp'];
												$num= $_SESSION['udi'];

											$sql = "UPDATE lecturer set password= '$c' where id like '$num' ";
												if ($b==$c) {
													
											

													if (mysqli_query($conn, $sql)) {
														 
											   			echo "<script language=\"JavaScript\">\n";
														echo "alert('successfully updated');\n";
														echo "window.location= 'stu.php'";
														echo "</script>";
														
													
													}{
														echo "<script language=\"JavaScript\">\n";
														echo "alert('theres an error');\n";
														echo "window.location= 'stu.php'";
														echo "</script>";
													}
												}else{
														echo "<script language=\"JavaScript\">\n";
														echo "alert('passwords do not match');\n";
														echo "window.location= 'stu.php'";
														echo "</script>";
													}

											}
										?>

									
								</div>
							</center>    	
						</div>
					</div>
				</div>

	</center>

</body>
<script type="text/javascript">

		
		//code that enables display of the timetable in the system interface...
		function ev(){
			var x= document.getElementById('us');
			var y= document.getElementById('ex');
			var z= document.getElementById('sc');

			if (z.style.display ==="none") {
				z.style.display = "block";

				if (x.style.display ==="block") {

					z.style.display = "block";
					x.style.display='none';

				}
				if (y.style.display === "block") {

				 	z.style.display = "block";
				 	y.style.display ='none';

				}

				
			}else{

				z.style.display='none';
				
			}
		}


		

				
		//code that enables the display animations of input forms... 
		var modal = document.getElementById('myModal');
		var span = document.getElementsByClassName("close")[0];
		

		//	
		function dri() {
			  modal.style.display = "block";
		}
		

		//
		span.onclick = function() {
			  modal.style.display = "none";
		}
		
		function pr5(){
			var tabe = document.getElementById('tablt');
			newWin=window.open("");
			newWin.document.write(tabe.outerHTML);
			newWin.print();
			newWin.close();
		}		
		//
		window.onclick = function(event) {
			if (event.target == modal) {
			    modal.style.display = "none";
			}
			if (event.target == moda){
			  	moda.style.display = "none";
			  }
			}
	</script>
</html>