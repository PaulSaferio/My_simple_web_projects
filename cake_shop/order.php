<!DOCTYPE html>
<html>
<!--@author: PaulSaferio (Pamso) <owakipaul@gmail.com> -->
<head>
	<title>Orders</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type="text/css">
		.head22 input{
			width: 100%;
			padding: 15px;
		}
		.head22 select{
			padding: 15px;
			width: 100%;
		}
		.head22 table{
			width: 70%;
			margin-left: 15%;
		}
		.head22 input[type=submit]{
			color: peru;
			background-color: powderblue;
			display: block;
			padding: 14px 16px;
			text-decoration: none;
			border: none;
			font-family: Maiandra GD;
			font-size: 15px;
			
			box-shadow: 5px 5px 10px  black;
			border-radius: 5px;
		}
	</style>
</head>
<body>

	<?php
		
	  session_start(); 
	?>

	<div class="head2" style="margin-left: 25%;width: 50%;margin-top: 6%;">
		<br>
		Give details of your order
		
		<div class="head22">
			<br>
			<form method="POST" action="" >
				<table>
					<tr>
							<td>
								<center>
									<input style="color: tomato;cursor: no-drop;" type="text" name="id" readonly value= <?php echo $_GET['hid'];?>>
								</center>								
							</td>
						
					</tr>

					<tr>

						<td>
							<center>
								<input style="color: tomato;cursor: no-drop;" type="text" name="name" readonly value=<?php echo $_GET['nam'];?>>
							</center>							
						</td>				

					</tr>
					<tr>

						<td>
							<center>
								<input style="color: tomato;cursor: no-drop;" type="text" name="type" readonly value=<?php echo $_GET['cak'];?>>
							</center>							
						</td>				

					</tr>

					<tr>
						<td>
							<center>
								<input type="number" name="quantity" placeholder="quantity">
							</center>							
						</td>
						
					</tr>
					<tr>
						<td>
							<center>
								<input style="color: tomato;cursor: no-drop;" type="text" name="clname" readonly value= "<?php echo $_SESSION['name1']." ".$_SESSION['name2'];?>">
							</center>							
						</td>
						
					</tr>
					<tr>
						<td>
							<center>
								<select name="deli">
									<option> Delivery?!</option>
									<option value="pick">Pickup</option>
									<option value="delivered">Delivery</option>
								</select>
							</center>							
						</td>
						
					</tr>
					<tr>
						<td>
							<center>
								<select name="pay">
									<option> Mode of Payment</option>
									<option value="pick">On pickup</option>
									<option value="Mpesa">
										Mpesa ( Till No. 112233)
										<input type="text" name="code" placeholder="if Mpesa,enter mpesa code">
									</option>
									
								</select>
							</center>							
						</td>
						
					</tr>
					<tr>
						<td>
							<input type="submit" name="sub" value="REQUEST">
						</td>
					</tr>
				</table>
			</form>
			<?php
				$conn= mysqli_connect('localhost','root','','cake');
				if(!$conn){
			      echo "Error in connection";
			    }

			    $ta=$_GET['cak'];
			    $dii=$_GET['hid'];

				if (isset($_POST['sub'])) {

					$que="SELECT * FROM ".$ta." where id like '$dii' ";
					$q1=mysqli_query($conn, $que);
					if ($q1) {
						 $result= mysqli_fetch_assoc($q1);
						 $pr= $result['price'];
						
					}

					$a=$_POST['id'];
					$b=$_POST['name'];
					$c=$_POST['clname'];
					$d=$_POST['quantity'];
					$e=$_POST['deli'];
					$f=$_POST['pay'];
					$ppesa=$_POST['code'];
					

					$co= $pr * $d ;
					echo $co;

					$ti= date("h:i:sa");
					$da= date("y-m-d");
					
					$query="INSERT INTO orders (pid,timen, datel, name, type, cname, quantity, delitype, payment, mpesa, amount )VALUES ('$a','$ti','$da', '$b', '$ta' , '$c','$d',  '$e','$f', '$ppesa', '$co') ";


					$rs= mysqli_query($conn, $query);
					if ($rs) {

						echo "<script language=\"JavaScript\">\n";
						echo "alert('your total is ".$co."!');\n";
						echo "window.location= 'index1.php'";
						echo "</script>";
					}
					else{
						echo "<script language=\"JavaScript\">\n";
						echo "alert('error_log');\n";
						echo "window.location= 'index1.php'";
						echo "</script>";

						}
				}
			?>
			<br>
		</div>
		<br>
	</div>
</body>
</html>