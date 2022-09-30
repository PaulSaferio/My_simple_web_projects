<?php 
	namespace Dompdf;
	require_once 'dompdf/autoload.inc.php';
	use Dompdf\Dompdf; 
	session_start();
	$conn=mysqli_connect('Localhost','root','','cake');
	$a=$_SESSION['udi'];
	?>
<!DOCTYPE html>
<html>
<!--@author: PaulSaferio (Pamso) <owakipaul@gmail.com> -->
		<head>
			<title>User</title>
			<link rel="stylesheet" type="text/css" href="index.css">
			<link rel="icon" type="image/png" href="image/rest.png">
			<style type="text/css">
				#appr{
					display: none;
				}
				#nappr{
					display: none;
				}
			</style>
		</head>
		
		<body>
			<center>

				<div class="ud1">


					<div class="ud3">
						<br>

						<img src="image/rest.png" height="80" width="80" style="float: left;margin-left: 3%;">
						<h1 style="float: left;font-family: comic sans, cursive;color: sandybrown;margin-left: 2%;">
							Cakey
						</h1><br><br><br><br><br><hr>
						<br><br>

						<div class="d2" onclick="cp()">
							<center>
								ORDERS
							</center>
						</div>
						<br>
						<div class="d2" onclick="pr()"> 
							<center>
								CAKES
							</center>
						</div>
						<br>
						<div class="d2" onclick="st()"> 
							<center>
								SUGGESTIONS
							</center>
						</div>
						<br>

						<a href="logout.php">
							<div class="d2"> 
								<center>
									LOGOUT
								</center>
							</div>
						</a><br>

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
					</div>


					<div class="ud2">

							<h3 style="color: sienna;float: right;margin-right: 3%;">WELCOME <?php echo $_SESSION['name1']; echo " "; echo $_SESSION['name2']; ?></h3>
						<div class="ud4">

							<div id="hi" >
									<h3 style="color: sienna;">ORDERS</h3>
									<div class="d3" onclick="approvedshow()"> APPROVED</div> 
									<div class="d3" onclick="napprovedshow()"> !APPROVED</div> <br><br>
										
									<hr>
								<div id="appr">
									<form method="POST" action="">
										
												<select name="tarehe" style="padding: 1%; font-size: 12px; color:  margin-top: 2%;" >
													<option>Choose Date to print</option>
													<?php
														$sl="SELECT datel from orders ";
														if (mysqli_query($conn, $sl)) {
															$res = mysqli_query($conn, $sl);
															while ( $r=  mysqli_fetch_assoc($res))
															{
																echo "<option value='".$r['datel']."'>".$r['datel']."</option>";
															}
														}
													?>
												</select>
											
												<input type="submit" name="datt" value="Print" >
												<?php
													if(isset($_POST['datt'])) {
														$tar=$_POST['tarehe'];
												 		$query1="SELECT * FROM `orders` where approval like'approved' and datel like '$tar'ORDER BY id DESC ";
												 		if (mysqli_query($conn, $query1)) {
									  						$data=mysqli_query($conn,$query1);
									  						$html="
															<table id='tabl'>
																		
																<tr>
																	<th> #</th>
																	<th> TIME</th>
																	<th> DATE</th>
																	<th> ID </th>		
																	<th> NAME</th>
																	<th> CUSTOMER</th>
																	<th> QUANTITY</th>
																	<th> Delivery</th>
																	<th> Payment</th>
																	<th> Mpesa </th>
																	<th> CHARGES</th>
																	<th> APPROVAL</th>
																				
																</tr>";	
																while ($row =  mysqli_fetch_assoc($data)) {

																$html.="
																<tr >
																
																<td> ". $row['id']."</td>
																<td> ". $row['timen']."</td>
																<td> ". $row['datel']."</td>
																<td> ". $row['pid']."</td>
																<td> ". $row['name']."</td>
																<td> ". $row['cname']."</td>
																<td> ". $row['quantity']."</td>
																<td> ". $row['delitype']."</td>
																<td> ". $row['payment']."</td>
																<td> ". $row['mpesa']."</td>
																<td> ". $row['amount']."</td>
																<td> ". $row['approval']."</td>";

									  					}

														$dompdf = new Dompdf(); 
														$dompdf->loadHtml($html);
														$dompdf->setPaper('A4', 'landscape');
														$dompdf->render();
														ob_end_clean();
														$dompdf->stream(" ",array("Attachment" => 0));
													
														exit(0);
													}
												}
												?>
									
									
								</form>
									<button class="d4" onclick="printt()" style="float: right;">Print all</button><br>
								<?php

									#code to display order requests from the database...
									$sql="SELECT * FROM `orders` where approval like'approved'ORDER BY id DESC ";
									if (mysqli_query($conn, $sql)) {
									  	$data=mysqli_query($conn,$sql);	
									  	echo "<table id='tabl' style='width: 100%;'>";
												
												echo "<tr>

														<th> #</th>
														<th> TIME</th>
														<th> DATE</th>
														<th> ID </th>										
														<th> NAME</th>
														<th> CUSTOMER</th>
														<th> QUANTITY</th>
														<th> Delivery</th>
														<th> Payment</th>
														<th> Mpesa </th>
														<th> CHARGES</th>
														<th> APPROVAL</th>
														
												</tr>";			
										
											while ($row =  mysqli_fetch_assoc($data)) {

												echo '<tr >';
												
												echo "<td> ". $row['id']."</td>";
												echo "<td> ". $row['timen']."</td>";
												echo "<td> ". $row['datel']."</td>";
												echo "<td> ". $row['pid']."</td>";
												echo "<td> ". $row['name']."</td>";
												echo "<td> ". $row['cname']."</td>";
												echo "<td> ". $row['quantity']."</td>";
												echo "<td> ". $row['delitype']."</td>";
												echo "<td> ". $row['payment']."</td>";
												echo "<td> ". $row['mpesa']."</td>";
												echo "<td> ". $row['amount']."</td>";
												echo "<td> ". $row['approval']."</td>";
												
												echo "</tr>";
												
											}
											echo "</table>";
										}
								?>
							</div>
							<div id="nappr">
								<form method="POST" action="">
								<select name="tareh" style="padding: 1%; font-size: 12px; color:  margin-top: 2%;" >
													<option>Choose Date to print</option>
													<?php
														$sl="SELECT datel from orders ";
														if (mysqli_query($conn, $sl)) {
															$res = mysqli_query($conn, $sl);
															while ( $r=  mysqli_fetch_assoc($res))
															{
																echo "<option value='".$r['datel']."'>".$r['datel']."</option>";
															}
														}
													?>
												</select>
											
												<input type="submit" name="dat" value="Print" >
												<?php
													if(isset($_POST['dat'])) {
														$tara=$_POST['tareh'];
												 		$query2="SELECT * FROM `orders` where approval ='' and datel like '$tara'ORDER BY id DESC ";
												 		if (mysqli_query($conn, $query2)) {
									  						$data1=mysqli_query($conn,$query2);
									  						$html1="
															<table id='tabl'>
																		
																<tr>
																	<th> #</th>
																	<th> TIME</th>
																	<th> DATE</th>
																	<th> ID </th>		
																	<th> NAME</th>
																	<th> CUSTOMER</th>
																	<th> QUANTITY</th>
																	<th> Delivery</th>
																	<th> Payment</th>
																	<th> Mpesa </th>
																	<th> CHARGES</th>
																	<th> APPROVAL</th>
																				
																</tr>";	
																while ($row =  mysqli_fetch_assoc($data1)) {

																$html.="
																<tr >
																
																<td> ". $row['id']."</td>
																<td> ". $row['timen']."</td>
																<td> ". $row['datel']."</td>
																<td> ". $row['pid']."</td>
																<td> ". $row['name']."</td>
																<td> ". $row['cname']."</td>
																<td> ". $row['quantity']."</td>
																<td> ". $row['delitype']."</td>
																<td> ". $row['payment']."</td>
																<td> ". $row['mpesa']."</td>
																<td> ". $row['amount']."</td>
																<td> ". $row['approval']."</td>";

									  					}

														$dompdf = new Dompdf(); 
														$dompdf->loadHtml($html1);
														$dompdf->setPaper('A4', 'landscape');
														$dompdf->render();
														ob_end_clean();
														$dompdf->stream(" ",array("Attachment" => 0));
													
														exit(0);
													}
												}
												?>
									</form>

								<button class="d4" onclick="printt()" style="float: right;">Print all</button><br>
								<?php

									#code to display order requests from the database...
									$sql="SELECT * FROM `orders`where `approval` =''ORDER BY id DESC ";
									if (mysqli_query($conn, $sql)) {
									  	$data=mysqli_query($conn,$sql);	
									  	echo "<table id='tabl1' style='width: 100%;'>";
												
												echo "<tr>

														<th> #</th>
														<th> TIME</th>
														<th> DATE</th>
														<th> ID </th>										
														<th> NAME</th>
														<th> CUSTOMER</th>
														<th> QUANTITY</th>
														<th> Delivery</th>
														<th> Payment</th>
														<th> Mpesa </th>
														<th> CHARGES</th>
														<th> APPROVAL</th>
														
												</tr>";			
										
											while ($row =  mysqli_fetch_assoc($data)) {

												echo '<tr >';
												
												echo "<td> ". $row['id']."</td>";
												echo "<td> ". $row['timen']."</td>";
												echo "<td> ". $row['datel']."</td>";
												echo "<td> ". $row['pid']."</td>";
												echo "<td> ". $row['name']."</td>";
												echo "<td> ". $row['cname']."</td>";
												echo "<td> ". $row['quantity']."</td>";
												echo "<td> ". $row['delitype']."</td>";
												echo "<td> ". $row['payment']."</td>";
												echo "<td> ". $row['mpesa']."</td>";
												echo "<td> ". $row['amount']."</td>";
												echo "<td><button><a href='?id1=". $row['id']."'><button>APPROVE</button</a></td>";
												
												echo "</tr>";
												
											}
											echo "</table>";
										}

										if (isset($_GET['id1'])) {
					
											$v = $_GET['id1'];
											$que="UPDATE orders set approval = 'approved' where id like '$v' ";
											if (mysqli_query($conn, $que)) {
												
												echo "<script language=\"JavaScript\">\n";
												echo "alert('successfully APPROVED');\n";
												echo "window.location= 'user.php'";
												echo "</script>";

											}
										}
								?>
							</div>
							</div>

							<div id="pi">
								<br>

								<div class="d3" onclick="shortshow()"> SHORT</div> 
								<div class="d3" onclick="spongeshow()"> SPONGE </div> 
								<div class="d3" onclick="chiffshow()">CHIFFON</div>

								<br><br> <hr>
								<div id="pi1">
									<div class="d4" onclick="dri()"> + ADD</div> <br><br>
									<?php

										#code to display the shorttened cakes available in the Databse...
										$sql="SELECT * FROM `short`";
										if (mysqli_query($conn, $sql)) {
										  	$data=mysqli_query($conn,$sql);	
										  	echo "<table id='tabl' style='width: 100%;'>";
													
													echo "<tr>

															<th> #</th>
															<th> NAME</th>
															<th> DESCRIPTION</th>
															<th> PRICE </th>								
															<th> IMAGE</th>
															<th> </th>
																														
													</tr>";			
											
												while ($row =  mysqli_fetch_assoc($data)) {
													$img = "image/".$row['image'];
					 		
													echo '<tr >';
													
													echo "<td> ". $row['id']."</td>";
													echo "<td> ". $row['name']."</td>";
													echo "<td> ". $row['Description']."</td>";
													echo "<td> ". $row['price']."</td>";
													echo '<td> <img src="'.$img.'" alt="'.$row['name'].'" height="40" width= "90"></td>';
													echo "<td><a href='?id1=". $row['id']."'><button>Delete</button></a></td>";
																									
													echo "</tr>";
													
												}
												echo "</table>";
										}


										#code to delete shorttened cakes from the Database...
										if (isset($_GET['id1'])) {
											
											$de= $_GET['id1'];
											$sq= "DELETE from short where id like '$de'";
											if (mysqli_query($conn, $sq)) {

													echo "<script language=\"JavaScript\">\n";
													echo "alert('successfully removed');\n";
													echo "window.location= 'user.php'";
													echo "</script>";
												
												
												}else{
													echo "<script language=\"JavaScript\">\n";
													echo "alert('there is an error ');\n";
													echo "window.location= 'user.php'";
													echo "</script>";
												}

										}
								
									?>
								</div>
								<div id="pi2">
									<div class="d4" onclick="sna()"> + ADD</div> <br><br>
									<?php

										#code to display the available sponge cakes in the Database...
										$sql="SELECT * FROM `sponge`";
										if (mysqli_query($conn, $sql)) {
											  	$data=mysqli_query($conn,$sql);	
											  	echo "<table id='tabl' style='width: 100%;'>";
														
														echo "<tr>

																<th> #</th>
																<th> NAME</th>
																<th> DESCRIPTION</th>
																<th> PRICE </th>								
																<th> IMAGE</th>
																<th> </th>
																															
														</tr>";			
												
													while ($row =  mysqli_fetch_assoc($data)) {
														$img = "image/".$row['image'];
						 		
														echo '<tr >';
														
														echo "<td> ". $row['id']."</td>";
														echo "<td> ". $row['name']."</td>";
														echo "<td> ". $row['Description']."</td>";
														echo "<td> ". $row['price']."</td>";
														echo '<td> <img src="'.$img.'" alt="'.$row['name'].'" height="40" width= "90"></td>';
														echo "<td><a href='?id2=". $row['id']."'><button>Delete</button></a></td>";
																										
														echo "</tr>";
														
													}
													echo "</table>";
											}

											#Code to delete sponge cakes from the Database...
											if (isset($_GET['id2'])) {
												
												$de= $_GET['id2'];
												$sq= "DELETE from sponge where id like '$de'";
												if (mysqli_query($conn, $sq)) {

														echo "<script language=\"JavaScript\">\n";
														echo "alert('successfully removed');\n";
														echo "window.location= 'user.php'";
														echo "</script>";
													
													
													}else{
														echo "<script language=\"JavaScript\">\n";
														echo "alert('there is an error ');\n";
														echo "window.location= 'user.php'";
														echo "</script>";
													}

											}
							
									?>
								</div>
								<div id="pi3">
									<div class="d4" onclick="be()"> + ADD</div> <br><br>
									<?php

										#code to display chiffon cakes from the Database...
										$sql="SELECT * FROM `chiff`";
										if (mysqli_query($conn, $sql)) {
											  	$data=mysqli_query($conn,$sql);	
											  	echo "<table id='tabl' style='width: 100%;'>";
														
														echo "<tr>

																<th> #</th>
																<th> NAME</th>
																<th> DESCRIPTION</th>
																<th> PRICE </th>								
																<th> IMAGE</th>
																<th> </th>
																															
														</tr>";			
												
													while ($row =  mysqli_fetch_assoc($data)) {
														$img = "image/".$row['image'];
						 		
														echo '<tr >';
														
														echo "<td> ". $row['id']."</td>";
														echo "<td> ". $row['name']."</td>";
														echo "<td> ". $row['Description']."</td>";
														echo "<td> ". $row['price']."</td>";
														echo '<td> <img src="'.$img.'" alt="'.$row['name'].'" height="40" width= "90"></td>';
														echo "<td><a href='?id3=". $row['id']."'><button>Delete</button></a></td>";
																										
														echo "</tr>";
														
													}
													echo "</table>";
											}

											#code to delete chiffon cakes from the Database...
											if (isset($_GET['id3'])) {
												
												$de= $_GET['id2'];
												$sq= "DELETE from chiff where id like '$de'";
												if (mysqli_query($conn, $sq)) {

														echo "<script language=\"JavaScript\">\n";
														echo "alert('successfully removed');\n";
														echo "window.location= 'user.php'";
														echo "</script>";
													
													
													}else{
														echo "<script language=\"JavaScript\">\n";
														echo "alert('there is an error ');\n";
														echo "window.location= 'user.php'";
														echo "</script>";
													}

											}

								
									?>
								</div>
								
							</div>

							<div id="sug">
								
								<h3 style="color: sienna;">SUGGESTIONS</h3> <hr>
								<?php

									#code to display Suggestions from the database...
									$sql="SELECT * FROM `sugge`ORDER BY id DESC";
									if (mysqli_query($conn, $sql)) {
									  	$data=mysqli_query($conn,$sql);	
									  	echo "<table id='tabl' style='width: 100%;'>";
												
												echo "<tr>

														<th> #</th>									
														<th> CUSTOMER NAME</th>
														<th> SUGGESTION</th>
														
												</tr>";			
										
											while ($row =  mysqli_fetch_assoc($data)) {

												echo '<tr >';
												
												echo "<td> ". $row['id']."</td>";
												echo "<td> ". $row['name']."</td>";
												echo "<td> ". $row['suggestion']."</td>";
												
												echo "</tr>";
												
											}
											echo "</table>";
										}
								?>

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
								
									<form class="upl" enctype="multipart/form-data" method="POST" action="">
										<table>
											
											<tr>
												<td>
													<input type="text" name="hid" placeholder="CAKE ID.">
												</td>
											</tr>
											<tr>
												<td>
													<input type="text" name="name" placeholder="NAME">
												</td>
											</tr>
											<tr>
												<td>
													Description
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
													<input type="number" name="price" placeholder="PRICE">
												</td>
											</tr>
											<tr>
												<td>
													Upload image
												</td>
											</tr>
											<tr>
												<td>
													<input type="file" name="img" >
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

										#code to insert new shortenned cakes to the Database...
										if (isset($_POST['dir'])) {
											# code...
											$a=$_POST['hid'];
											$b=$_POST['name'];
											$c=$_POST['desc'];
											$e=$_POST['price'];
											$image = $_FILES['img']['name'];
										$target = "image/".basename($_FILES['img']['name']);

										$sql = "INSERT INTO short (id,  name, Description, price, image )VALUES ('$a', '$b', '$c','$e','$image')";

												if (mysqli_query($conn, $sql)) {
													 
										   			if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){


													echo "<script language=\"JavaScript\">\n";
													echo "alert('successfully added');\n";
													echo "window.location= 'user.php'";
													echo "</script>";
													}
												
												}else{
													echo "<script language=\"JavaScript\">\n";
													echo "alert('there is an error in your input');\n";
													echo "window.location= 'user.php'";
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
					<span class="clo" >&times;</span>	    
					<div class="modal-body">
						<center>
							
							<br><br>
							<div style="font-family:'Comic Sans MS', cursive, sans-serif; width: 83%;height: 40vw;">
							<br>
								
									<form class="upl" enctype="multipart/form-data" method="POST" action="">
										<table>
											
											<tr>
												<td>
													<input type="text" name="hid" placeholder="CAKE ID.">
												</td>
											</tr>
											<tr>
												<td>
													<input type="text" name="name" placeholder="NAME">
												</td>
											</tr>
											<tr>
												<td>
													Description
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
													<input type="number" name="price" placeholder="PRICE">
												</td>
											</tr>
											<tr>
												<td>
													Upload image
												</td>
											</tr>
											<tr>
												<td>
													<input type="file" name="img" >
												</td>
											</tr>

											<tr>
												<td>
													
												</td>
											</tr>
											
											<tr>
												<td>
													<input type="submit" name="san" value="Add" style="width: 100%;background: firebrick; color: lightyellow; padding: 10%;font-family:'Comic Sans MS', cursive, sans-serif;">
												</td>
											</tr>
										</table>
										
									</form> 
									<br>

									<?php

										#code to insert new sponge cakes into the Database...
										if (isset($_POST['san'])) {
											# code...
											$a=$_POST['hid'];
											$b=$_POST['name'];
											$c=$_POST['desc'];
											$e=$_POST['price'];
											$image = $_FILES['img']['name'];
										$target = "image/".basename($_FILES['img']['name']);

										$sql = "INSERT INTO sponge (id,  name, Description, price, image )VALUES ('$a', '$b', '$c','$e','$image')";

												if (mysqli_query($conn, $sql)) {
													 
										   			if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){


													echo "<script language=\"JavaScript\">\n";
													echo "alert('successfully added');\n";
													echo "window.location= 'user.php'";
													echo "</script>";
													}
												
												}else{
													echo "<script language=\"JavaScript\">\n";
													echo "alert('there is an error in your input');\n";
													echo "window.location= 'user.php'";
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
					<span class="clos" >&times;</span>	    
					<div class="modal-body">
						<center>
							
							<br><br>
							<div style="font-family:'Comic Sans MS', cursive, sans-serif; width: 83%;height: 40vw;">
							<br>
								
								<form class="upl" enctype="multipart/form-data" method="POST" action="">
									<table>
										
										<tr>
											<td>
												<input type="text" name="sid" placeholder="CAKE ID.">
											</td>
										</tr>
										<tr>
											<td>
												<input type="text" name="name" placeholder="NAME">
											</td>
										</tr>
										<tr>
											<td>
												Description
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
												<input type="number" name="price" placeholder="PRICE">
											</td>
										</tr>
										<tr>
											<td>
												Upload image
											</td>
										</tr>
										<tr>
											<td>
												<input type="file" name="img" >
											</td>
										</tr>

										<tr>
											<td>
												.
											</td>
										</tr>
										
										<tr>
											<td>
												<input type="submit" name="bi" value="Add" style="width: 100%;background: firebrick; color: lightyellow; padding: 10%;font-family:'Comic Sans MS', cursive, sans-serif;">
											</td>
										</tr>
									</table>
									
								</form> 
								<br>

								<?php

									#code to insert new CHIFFON cakes into the Database...
									if (isset($_POST['bi'])) {
										# code...
										$a=$_POST['sid'];
										$b=$_POST['name'];
										$c=$_POST['desc'];
										$e=$_POST['price'];
										$image = $_FILES['img']['name'];
									$target = "image/".basename($_FILES['img']['name']);

									$sql = "INSERT INTO chiff (id,  name, Description, price, image )VALUES ('$a', '$b', '$c','$e','$image')";

											if (mysqli_query($conn, $sql)) {
												 
									   			if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){


												echo "<script language=\"JavaScript\">\n";
												echo "alert('successfully added');\n";
												echo "window.location= 'user.php'";
												echo "</script>";
												}
											
											}else{
												echo "<script language=\"JavaScript\">\n";
												echo "alert('there is an error in your input');\n";
												echo "window.location= 'user.php'";
												echo "</script>";
											}

									}
								?>
							
							</div>
						</center>    	
					</div>
				</div>
			</div>

				<script type="text/javascript">

					//code that enables display of fetched Requests from the database to the system interface...
					function cp(){
						
						var x= document.getElementById('hi');
						var y= document.getElementById('sug');
						var z= document.getElementById('pi');
						
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

					//code that enables display of Products in the system interface...
					function pr(){
						var x= document.getElementById('hi');
						var y= document.getElementById('sug');
						var z= document.getElementById('pi');
						
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


					function st(){
						
						var x= document.getElementById('hi');
						var y= document.getElementById('sug');
						var z= document.getElementById('pi');
						
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



					//code that enabled display of drinks in the system inteface...
					function shortshow(){
						var x= document.getElementById('pi1');
						var y= document.getElementById('pi3');
						var z= document.getElementById('pi2');
						
						if (x.style.display ==="none") {
							if (y.style.display ==="block") {
								

								x.style.display = "block";
								y.style.display='none';
							}
							if (z.style.display ==="block") {

									x.style.display = "block";
									z.style.display='none';


								}

							x.style.display = "block";
							
						}else{

							x.style.display='none';
							
						}
					}

					//code that enables display of snacks in the system interface...
					function spongeshow(){
						var x= document.getElementById('pi1');
						var y= document.getElementById('pi3');
						var z= document.getElementById('pi2');
						
						if (z.style.display ==="none") {
							if (y.style.display ==="block") {
								

								z.style.display = "block";
								y.style.display='none';
							}
							if (x.style.display ==="block") {

									z.style.display = "block";
									x.style.display='none';


								}

							z.style.display = "block";
							
						}else{

							z.style.display='none';
							
						}
					}

					//code that enables display of beaureau services into the system...
					function chiffshow(){
						var x= document.getElementById('pi1');
						var y= document.getElementById('pi3');
						var z= document.getElementById('pi2');
						
						if (y.style.display ==="none") {
							if (z.style.display ==="block") {
								

								y.style.display = "block";
								z.style.display='none';
							}
							if (x.style.display ==="block") {

									y.style.display = "block";
									x.style.display='none';


								}

							y.style.display = "block";
							
						}else{

							y.style.display='none';
							
						}
					}

					function approvedshow(){
						var x= document.getElementById('appr');
						var y= document.getElementById('nappr');
						var z= document.getElementById('pi2');
						
						if (x.style.display ==="none") {
							if (y.style.display ==="block") {
								

								x.style.display = "block";
								y.style.display='none';
							}

							x.style.display = "block";
							
						}else{

							x.style.display='none';
							
						}
					}
					function napprovedshow(){
						var x= document.getElementById('appr');
						var y= document.getElementById('nappr');
						
						
						if (y.style.display ==="none") {
							if (x.style.display ==="block") {
								

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
					var mod = document.getElementById('myMo');

					//	
					function dri() {
						  modal.style.display = "block";
					}
					function sna() {
						 moda.style.display = "block";
					}
					function be() {
						 mod.style.display = "block";
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
					function printt(){
						var tabe = document.getElementById('tabl');
						newWin=window.open("");
						newWin.document.write(tabe.outerHTML);
						newWin.print();
						newWin.close();
					}

					function printt1(){
						var tabe = document.getElementById('tabl1');
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
			</center>
		</body>
</html>