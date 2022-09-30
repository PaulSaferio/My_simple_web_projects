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
	<title>ADMIN</title>
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
							ADMIN
						</h1><br><br><br><br><hr style="border: 3px solid cornsilk;">
						<br><br>

						<div class="d2" onclick="uv()">
							<center>
								USERS
							</center>
						</div>
						<br>
						<div class="d2" onclick="sv()"> 
							<center>
								PROGRAMES
							</center>
						</div>
						<br>
						<div class="d2" onclick="ev()"> 
							<center>
								SCHEDULES
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
					<!-- the invisible divs -->

					<div id="us">
						
						
						<div id="pi1">
							
							<div style="overflow-y: scroll; height: 17.3vw;">
								<?php

								#code to display the students available in the Databse...
								$sql="SELECT * FROM `student`";
								if (mysqli_query($conn, $sql)) {
								  	$data=mysqli_query($conn,$sql);	
								  	echo "<table id='tabl' style='width: 100%;'>";
											echo "<caption>Students</caption> ";
											echo "<tr>

													<th> #</th>
													<th> Firstname</th>
													<th> Lastname</th>
													<th> Email</th>								
													<th> Phone</th>
													<th> Password</th>
																												
											</tr>";			
									
										while ($row =  mysqli_fetch_assoc($data)) {
											
											echo '<tr >';
											
											echo "<td> ". $row['reg']."</td>";
											echo "<td> ". $row['firstname']."</td>";
											echo "<td> ". $row['lastname']."</td>";
											echo "<td> ". $row['email']."</td>";
											echo "<td> ". $row['phone']."</td>";
											echo "<td> ". $row['password']."</td>";
											
											echo "<td><a href='?id1=". $row['reg']."'><button>Delete</button></a></td>";
																							
											echo "</tr>";
											
										}
										echo "</table>";
								}


								#code to delete studentsfrom the Database...
								if (isset($_GET['id1'])) {
									
									$de= $_GET['id1'];
									$sq= "DELETE from student where reg like '$de'";
									if (mysqli_query($conn, $sq)) {

											echo "<script language=\"JavaScript\">\n";
											echo "alert('successfully removed');\n";
											echo "window.location= 'main.php'";
											echo "</script>";
										
										
										}else{
											echo "<script language=\"JavaScript\">\n";
											echo "alert('there is an error ');\n";
											echo "window.location= 'main.php'";
											echo "</script>";
										}

								}
						
							?>

							</div>
							<div class="d4" onclick="dri()"style="float: left;"> + ADD Student</div> 
							<div class="d4" onclick="pr()"style="margin-right: 55%;"> Print</div> 
							<hr>
											
							 

							<div style="overflow-y: scroll; height: 17.3vw;">
								<?php

								#code to display the Lecturers available in the Databse...
								$sql="SELECT * FROM `lecturer`";
								if (mysqli_query($conn, $sql)) {
								  	$data=mysqli_query($conn,$sql);	
								  	echo "<table id='tabl1' style='width: 100%;'>";
											echo "<caption>Lecturers</caption> ";
											echo "<tr>

													<th> #</th>
													<th> Firstname</th>
													<th> Lastname</th>
													<th> Email</th>								
													<th> Phone</th>
													<th> Password</th>
																												
											</tr>";			
									
										while ($row =  mysqli_fetch_assoc($data)) {
											
			 		
											echo '<tr >';
											
											echo "<td> ". $row['id']."</td>";
											echo "<td> ". $row['firstname']."</td>";
											echo "<td> ". $row['lastname']."</td>";
											echo "<td> ". $row['email']."</td>";
											echo "<td> ". $row['phone']."</td>";
											echo "<td> ". $row['password']."</td>";
											
											echo "<td><a href='?id2=". $row['id']."'><button>Delete</button></a></td>";
																							
											echo "</tr>";
											
										}
										echo "</table>";
								}


								#code to delete Lecturersfrom the Database...
								if (isset($_GET['id2'])) {
									
									$de= $_GET['id2'];
									$sq= "DELETE from lecturer where id like '$de'";
									if (mysqli_query($conn, $sq)) {

											echo "<script language=\"JavaScript\">\n";
											echo "alert('successfully removed');\n";
											echo "window.location= 'main.php'";
											echo "</script>";
										
										
										}else{
											echo "<script language=\"JavaScript\">\n";
											echo "alert('there is an error ');\n";
											echo "window.location= 'main.php'";
											echo "</script>";
										}

								}
						
							?>
							</div>
							<div class="d4" onclick="sna()" style="float: left;"> + ADD Lecturer</div>
							<div class="d4" onclick="pr1()"style="margin-right: 55%;"> Print</div> 
						</div>
						
					</div>

					<!-- end of the first invisble div -->

					<div id="ex">
						
						<div id="pi1">
							 
							<div style="overflow-y: scroll; height: 37.9vw;width: 50%;float: left;">
								<?php

								#code to display the Courses available in the Databse...
								$sql="SELECT * FROM `course`";
								if (mysqli_query($conn, $sql)) {
								  	$data=mysqli_query($conn,$sql);	
								  	echo "<table id='tabl2' style='width: 100%;'>";
											echo "<caption>Courses</caption> ";
											echo "<tr>

													<th> #</th>
													<th> Name</th>
													<th> Faculty</th>
																												
											</tr>";			
									
										while ($row =  mysqli_fetch_assoc($data)) {
											
			 		
											echo '<tr >';
											
											echo "<td> ". $row['id']."</td>";
											echo "<td> ". $row['name']."</td>";
											echo "<td> ". $row['faculty']."</td>";
											
											
											echo "<td><a href='?id3=". $row['id']."'><button>Delete</button></a></td>";
																							
											echo "</tr>";
											
										}
										echo "</table>";
								}


								#code to delete courses from the Database...
								if (isset($_GET['id3'])) {
									
									$de= $_GET['id3'];
									$sq= "DELETE from course where id like '$de'";
									if (mysqli_query($conn, $sq)) {

											echo "<script language=\"JavaScript\">\n";
											echo "alert('successfully removed');\n";
											echo "window.location= 'main.php'";
											echo "</script>";
										
										
										}else{
											echo "<script language=\"JavaScript\">\n";
											echo "alert('there is an error ');\n";
											echo "window.location= 'main.php'";
											echo "</script>";
										}

								}
						
							?>
							</div>

							
							
								 
								<div style="overflow-y: scroll; height: 37.9vw;width: 50%;float: right;">
									<?php

									#code to display the Units available in the Databse...
									$sql="SELECT * FROM `unit`";
									if (mysqli_query($conn, $sql)) {
									  	$data=mysqli_query($conn,$sql);	
									  	echo "<table id='tabl3' style='width: 100%;'>";
												echo "<caption>Units</caption> ";
												echo "<tr>

														<th> #</th>
														<th> Name</th>
														<th> Faculty</th>
																													
												</tr>";			
										
											while ($row =  mysqli_fetch_assoc($data)) {
												
				 		
												echo '<tr >';
												
												echo "<td> ". $row['id']."</td>";
												echo "<td> ". $row['name']."</td>";
												echo "<td> ". $row['faculty']."</td>";
												
												
												echo "<td><a href='?id4=". $row['id']."'><button>Delete</button></a></td>";
																								
												echo "</tr>";
												
											}
											echo "</table>";
									}


									#code to delete Units from the Database...
									if (isset($_GET['id4'])) {
										
										$de= $_GET['id4'];
										$sq= "DELETE from unit where id like '$de'";
										if (mysqli_query($conn, $sq)) {

												echo "<script language=\"JavaScript\">\n";
												echo "alert('successfully removed');\n";
												echo "window.location= 'main.php'";
												echo "</script>";
											
											
											}else{
												echo "<script language=\"JavaScript\">\n";
												echo "alert('there is an error ');\n";
												echo "window.location= 'main.php'";
												echo "</script>";
											}

									}
							
								?>

								</div><br>
							<div class="d4" onclick="co()" style="float: left;"> + ADD course</div>
							<div class="d4" onclick="pr2()"style="float: left;"> Print</div> 
						
							<div class="d4" onclick="un()" style="float: right;"> + ADD unit</div>
							<div class="d4" onclick="pr3()"style="float: right;"> Print</div> 
						</div>
					</div>

					<!-- end of the second invisible div -->

					<div id="sc">
						<div id="pi1">

						<div style="overflow-y: scroll; height: 39.5vw;width: 86%;float: right;">
							<?php

							#code to display the Exam timetable from the Databse...
							$sql="SELECT * FROM `timetable`";
							if (mysqli_query($conn, $sql)) {
							  	$data=mysqli_query($conn,$sql);	
							  	echo "<table id='tablt' style='width: 100%;'>";
										echo "<caption>Timetable</caption> ";
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
										
										
										echo "<td><a href='?id5=". $row['examid']."'><button>Delete</button></a></td>";
																						
										echo "</tr>";
										
									}
									echo "</table>";
							}


							#code to delete table row from the Database...
							if (isset($_GET['id5'])) {
								
								$de= $_GET['id5'];
								$sq= "DELETE from timetable where examid like '$de'";
								if (mysqli_query($conn, $sq)) {

										echo "<script language=\"JavaScript\">\n";
										echo "alert('successfully removed');\n";
										echo "window.location= 'main.php'";
										echo "</script>";
									
									
									}else{
										echo "<script language=\"JavaScript\">\n";
										echo "alert('there is an error ');\n";
										echo "window.location= 'main.php'";
										echo "</script>";
									}

							}

							if(isset($_GET['drp'])){

								$sq= " TRUNCATE TABLE timetable ";
								if (mysqli_query($conn, $sq)) {

										echo "<script language=\"JavaScript\">\n";
										echo "alert('successfully Droped the table');\n";
										echo "window.location= 'main.php'";
										echo "</script>";
									
									
									}else{
										echo "<script language=\"JavaScript\">\n";
										echo "alert('there is an error ');\n";
										echo "window.location= 'main.php'";
										echo "</script>";
									}

							}
					
						?>

						</div><br>
						<div class="d4" onclick="up()" style="float: left;"> + Update </div><br><br>
						<div class="d4" onclick=" " style="float: left;"> <a href="?drp"> - Delete all </a> </div><br><br>
						<div class="d4" onclick="pr5()"style="float: left;"> Print</div> 

					</div>
					</div>

					<!-- end of the third invisible div -->

				</div>

				<div id="myM"class="modal" >
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
														<input type="text" name="hid" placeholder="ID.">
													</td>
												</tr>
												<tr>
													<td>
														<input type="text" name="name" placeholder="Name">
													</td>
												</tr>
												<tr>
													<td>
														<select name="facl">
															<option>Select faculty</option>
															<option value="cohred">COHRED</option>
															<option value="copas">COPAS</option>
															<option value="science">Science</option>
															<option value="business">Business</option>
														</select>
													</td>
												</tr>
												<tr>
												
												<tr>
													<td>
														
													</td>
												</tr>
												
												<tr>
													<td>
														<input type="submit" name="cou" value="Add" style="width: 100%;background: firebrick; color: lightyellow; padding: 10%;font-family:'Comic Sans MS', cursive, sans-serif;">
													</td>
												</tr>
											</table>
											
										</form> 
										<br>

										<?php

											#code to insert new course to the Database...
											if (isset($_POST['cou'])) {
												# code...
												$a=$_POST['hid'];
												$b=$_POST['name'];
												$c=$_POST['facl'];
												

											$sql = "INSERT INTO course (id,  name, faculty )VALUES ('$a', '$b', '$c')";

													if (mysqli_query($conn, $sql)) {
														 
											   			echo "<script language=\"JavaScript\">\n";
														echo "alert('successfully added');\n";
														echo "window.location= 'main.php'";
														echo "</script>";
														
													
													}else{
														echo "<script language=\"JavaScript\">\n";
														echo "alert('there is an error in your input');\n";
														echo "window.location= 'main.php'";
														echo "</script>";
													}

											}
										?>

									
								</div>
							</center>    	
						</div>
					</div>
				</div>

				<div id="myMo"class="modal" >
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
														<input type="text" name="hid" placeholder="ID.">
													</td>
												</tr>
												<tr>
													<td>
														<input type="text" name="name" placeholder="Name">
													</td>
												</tr>
												<tr>
													<td>
														<select name="facl">
															<option>Select faculty</option>
															<option value="cohred">COHRED</option>
															<option value="copas">COPAS</option>
															<option value="science">Science</option>
															<option value="business">Business</option>
														</select>
													</td>
												</tr>
												<tr>
												
												<tr>
													<td>
														
													</td>
												</tr>
												
												<tr>
													<td>
														<input type="submit" name="un" value="Add" style="width: 100%;background: firebrick; color: lightyellow; padding: 10%;font-family:'Comic Sans MS', cursive, sans-serif;">
													</td>
												</tr>
											</table>
											
										</form> 
										<br>

										<?php

											#code to insert new units to the Database...
											if (isset($_POST['un'])) {
												# code...
												$a=$_POST['hid'];
												$b=$_POST['name'];
												$c=$_POST['facl'];
												

											$sql = "INSERT INTO unit (id,  name, faculty )VALUES ('$a', '$b', '$c')";

													if (mysqli_query($conn, $sql)) {
														 
											   			echo "<script language=\"JavaScript\">\n";
														echo "alert('successfully added');\n";
														echo "window.location= 'main.php'";
														echo "</script>";
														
													
													}else{
														echo "<script language=\"JavaScript\">\n";
														echo "alert('there is an error in your input');\n";
														echo "window.location= 'main.php'";
														echo "</script>";
													}

											}
										?>

									
								</div>
							</center>    	
						</div>
					</div>
				</div>

				<div id="myModa"class="modal" >
					<div class="modal-contenti" >
						<span class="close" >&times;</span>	    
						<div class="modal-body">
							<center>
								
								<br><br>
								<div style="font-family:'Comic Sans MS', cursive, sans-serif; width: 100%;height: 40vw;">
								<br>
								
									<form class="upl"  method="POST" action="" style="width: 100%;">

										<table>
											
											
											<tr>
												<td>
													<label>Unit</label>
													<select name="unit">
														<option>Select Unit</option>
														<?php
															$sl="SELECT * from unit ";
															if (mysqli_query($conn, $sl)) {
																$res = mysqli_query($conn, $sl);
																while ( $r=  mysqli_fetch_assoc($res))
																{
																	echo "<option value='".$r['id']."'>".$r['name']."</option>";
																}
															}
														?>
													</select>
												</td>
											</tr>
											<tr>
												<td>
													<input type="text" name="time" placeholder="Time">
												</td>
											</tr>
											<tr>
												<td>
													<input type="date" name="date" placeholder="Date">
												</td>
											</tr>
											
											<tr>
												<td>
													<label>Invigilator</label>
													<select name="inv">
														<option>Select Invigilator</option>
														<?php
															$sl="SELECT * from lecturer ";
															if (mysqli_query($conn, $sl)) {
																$res = mysqli_query($conn, $sl);
																while ( $r=  mysqli_fetch_assoc($res))
																{
																	echo "<option value='".$r['id']."'>".$r['firstname']." ".$r['lastname']."</option>";
																}
															}
														?>
													</select>
												</td>
											</tr>

											<tr>
												<td>
													<input type="text" name="ven" placeholder="Venue">
												</td>
											</tr>
											
											<tr>
												<td>
													<input type="submit" name="tabl" value="Add" style="width: 100%;background: firebrick; color: lightyellow; padding: 10%;font-family:'Comic Sans MS', cursive, sans-serif;">
												</td>
											</tr>
										</table>
										
									</form> 
									<br>

									<?php

										#code to insert new timetable row to the Database...
										if (isset($_POST['tabl'])) {
											# code...
											$a=$_POST['unit'];
											$b=$_POST['time'];
											$c=$_POST['date'];
											$e=$_POST['inv'];
											$f=$_POST['ven'];

											
											$s1="SELECT * from unit where id like '$a'";
											$q2="SELECT * from lecturer where id like '$e'";
											$vig=mysqli_query($conn,$q2);

											$daa=mysqli_query($conn,$s1);

											$uf=mysqli_fetch_assoc($daa);
											$vv=mysqli_fetch_assoc($vig);
											  	$g= $uf['faculty'];
											  	$h= $uf['name'];
											  	$i= $vv['lastname'] ;
											 
										$sql = "INSERT INTO timetable (unitid,  unit, faculty, time, date, venue, invigi )VALUES ('$a', '$h', '$g','$b','$c', '$f', '$i')";

												if (mysqli_query($conn, $sql)) {
													 
										   			echo "<script language=\"JavaScript\">\n";
													echo "alert('successfully added');\n";
													echo "window.location= 'main.php'";
													echo "</script>";
													
												
												}else{
													echo "<script language=\"JavaScript\">\n";
													echo "alert('there is an error in your input');\n";
													echo "window.location= 'main.php'";
													echo "</script>";
												}

										}
									?>

									
								</div>
							</center>    	
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
														<input type="text" name="hid" placeholder="Reg no.">
													</td>
												</tr>
												<tr>
													<td>
														<input type="text" name="name" placeholder="First name">
													</td>
												</tr>
												<tr>
													<td>
														<input type="text" name="name1" placeholder="Last name">
													</td>
												</tr>
												<tr>
													<td>
														<input type="text" name="mail" placeholder="Email">
													</td>
												</tr>
												
												<tr>
													<td>
														<input type="number" name="phone" placeholder="Phone">
													</td>
												</tr>

												<tr>
													<td>
														
													</td>
												</tr>
												
												<tr>
													<td>
														<input type="submit" name="dir" value="Add" style="width: 100%;background: firebrick; color: lightyellow; padding: 10%;font-family:'Comic Sans MS', cursive, sans-serif;">
													</td>
												</tr>
											</table>
											
										</form> 
										<br>

										<?php

											#code to insert new students to the Database...
											if (isset($_POST['dir'])) {
												# code...
												$a=$_POST['hid'];
												$b=$_POST['name'];
												$c=$_POST['name1'];
												$e=$_POST['mail'];
												$f = $_POST['phone'];

											$sql = "INSERT INTO student (reg,  firstname, lastname, email, phone, password )VALUES ('$a', '$b', '$c','$e','$f', '000000')";

													if (mysqli_query($conn, $sql)) {
														 
											   			echo "<script language=\"JavaScript\">\n";
														echo "alert('successfully added');\n";
														echo "window.location= 'main.php'";
														echo "</script>";
														
													
													}else{
														echo "<script language=\"JavaScript\">\n";
														echo "alert('there is an error in your input');\n";
														echo "window.location= 'main.php'";
														echo "</script>";
													}

											}
										?>

									
								</div>
							</center>    	
						</div>
					</div>
				</div>

				<div id="myMod"class="modal" >
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
														<input type="text" name="hid" placeholder="ID no.">
													</td>
												</tr>
												<tr>
													<td>
														<input type="text" name="name" placeholder="First name">
													</td>
												</tr>
												<tr>
													<td>
														<input type="text" name="name1" placeholder="Last name">
													</td>
												</tr>
												<tr>
													<td>
														<input type="text" name="mail" placeholder="Email">
													</td>
												</tr>
												
												<tr>
													<td>
														<input type="number" name="phone" placeholder="Phone">
													</td>
												</tr>

												<tr>
													<td>
														
													</td>
												</tr>
												
												<tr>
													<td>
														<input type="submit" name="lec" value="Add" style="width: 100%;background: firebrick; color: lightyellow; padding: 10%;font-family:'Comic Sans MS', cursive, sans-serif;">
													</td>
												</tr>
											</table>
											
										</form> 
										<br>

										<?php

											#code to insert new Lecturers to the Database...
											if (isset($_POST['lec'])) {
												# code...
												$a=$_POST['hid'];
												$b=$_POST['name'];
												$c=$_POST['name1'];
												$e=$_POST['mail'];
												$f = $_POST['phone'];

											$sql = "INSERT INTO lecturer (id,  firstname, lastname, email, phone, password )VALUES ('$a', '$b', '$c','$e','$f', '000000')";

													if (mysqli_query($conn, $sql)) {
														 
											   			echo "<script language=\"JavaScript\">\n";
														echo "alert('successfully added');\n";
														echo "window.location= 'main.php'";
														echo "</script>";
														
													
													}else{
														echo "<script language=\"JavaScript\">\n";
														echo "alert('there is an error in your input');\n";
														echo "window.location= 'main.php'";
														echo "</script>";
													}

											}
										?>

									
								</div>
							</center>    	
						</div>
					</div>
				</div>


			</div>

			
		</div>
	</center>
	

</body>
<script type="text/javascript">

					//code that enables display of fetched Requests from the database to the system interface...
					function uv(){
						
						var x= document.getElementById('us');
						var y= document.getElementById('ex');
						var z= document.getElementById('sc');
						
						if (x.style.display ==="none") {
							 if (z.style.display === "block") {

							 	x.style.display = "block";
							 	z.style.display='none';

							}
							if (y.style.display === "block") {

							 	x.style.display = "block";
							 	y.style.display='none';

							}

							x.style.display = "block";

						}else{

							x.style.display='none';
							
						}
					}

					//code that enables display of Programs in the system interface...
					function ev(){
						var x= document.getElementById('us');
						var y= document.getElementById('ex');
						var z= document.getElementById('sc');

						if (z.style.display ==="none") {
							if (x.style.display ==="block") {

								z.style.display = "block";
								x.style.display='none';

							}
							if (y.style.display === "block") {

							 	z.style.display = "block";
							 	y.style.display ='none';

							}

							z.style.display = "block";
							
						}else{

							z.style.display='none';
							
						}
					}


					function sv(){
						
						var x= document.getElementById('us');
						var y= document.getElementById('ex');
						var z= document.getElementById('sc');
						
						if (y.style.display ==="none") {
							 if (z.style.display === "block") {

							 	x.style.display = "block";
							 	z.style.display='none';

							}
							if (x.style.display === "block") {

							 	y.style.display = "block";
							 	x.style.display='none';

							}

							y.style.display = "block";

						}else{

							y.style.display='none';
							
						}
					}

							
					//code that enables the display animations of input forms... 
					var modal = document.getElementById('myModal');
					var span = document.getElementsByClassName("close")[0];
					var span2 = document.getElementsByClassName("clos")[0];
					var span3 = document.getElementsByClassName("clo")[0];
					var btn = document.getElementById("myBtn");
					var moda = document.getElementById('myMod');
					var mod = document.getElementById('myModa');
					var mo = document.getElementById('myMo');
					var moo = document.getElementById('myM');

					//	
					function dri() {
						  modal.style.display = "block";
					}
					function sna() {
						 moda.style.display = "block";
					}
					function up() {
						 mod.style.display = "block";
					}
					function un() {
						 mo.style.display = "block";
					}
					function co() {
						 moo.style.display = "block";
					}

					//
					span.onclick = function() {
						  modal.style.display = "none";
					}
					span3.onclick = function() 
					{
						  moda.style.display = "none";
					}
					span2.onclick = function() 
					{
						  mod.style.display = "none";
					}
					function pr(){
						var tabe = document.getElementById('tabl');
						newWin=window.open("");
						newWin.document.write(tabe.outerHTML);
						newWin.print();
						newWin.close();
					}

					function pr1(){
						var tabe = document.getElementById('tabl1');
						newWin=window.open("");
						newWin.document.write(tabe.outerHTML);
						newWin.print();
						newWin.close();
					}
					function pr2(){
						var tabe = document.getElementById('tabl2');
						newWin=window.open("");
						newWin.document.write(tabe.outerHTML);
						newWin.print();
						newWin.close();
					}
					function pr3(){
						var tabe = document.getElementById('tabl3');
						newWin=window.open("");
						newWin.document.write(tabe.outerHTML);
						newWin.print();
						newWin.close();
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