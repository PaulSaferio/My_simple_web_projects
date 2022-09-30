<!DOCTYPE html>
<html>
<!--@author: PaulSaferio (Pamso) <owakipaul@gmail.com> -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EXAM</title>

	<style type="text/css">
		body{
		  margin: 0;
		  font-family: Maiandra GD;
		  background-color: #E1AD01;
		}
		.a { width: 100%;

		 }

		 .a input[type="text"]{
		 	opacity: 0.8;
		      border:none;
		      outline: none;
		      height: 35px;
		      color: black;
		      font-size: 20px;
		      padding: 15px;
		      width: 80%;
		      border-radius: 25px;
		      text-align: center;
		 }

		 .a input[type="password"]{
		 	opacity: 0.8;
		      border:none;
		      outline: none;
		      height: 35px;
		      color: black;
		      font-size: 20px;
		      padding: 15px;
		      width: 80%;
		       border-radius: 25px;
		       text-align: center;
		 }

		 .sub{
		 	color: cornsilk;
			background-color: coral;
			display: block;
			padding: 14px 16px;
			text-decoration: none;
			border: none;
			width: 100%;
			font-family: Maiandra GD;
			font-size: 30px;
			 border-radius: 25px;
		 }
		 .sub:hover{
		 	border-radius: 4px;
		      background-color:  cornsilk;
		      border: none;
		      color: firebrick;
		      text-align: center;
		      transition: all 0.5s;
		      box-shadow: 1px 1px 10px firebrick;
		      border-radius: 25px;
		      cursor: pointer;
		 }

		.modal {
		      display: none; 
		      position: fixed; 
		      z-index: 1; 
		      left: 0;
		      top: 0;
		      width: 100%; 
		      height: 100%; 
		      overflow: auto; 
		      background-color: rgb(0,0,0); 
		      background-color: rgba(0,0,0,0.4); 
		      -webkit-animation-name: fadeIn; 
		      -webkit-animation-duration: 1.4s;
		      animation-name: fadeIn;
		      animation-duration: 1.4s
		}
		.modal-content {
		       position: center;
		      bottom: 5px;
		      background: black;
		      width: 50%;
		      -webkit-animation-name: slideIn;
		      -webkit-animation-duration: 2.4s;
		      animation-name: slideIn;
		      animation-duration: 2.4s;
		     margin-top: 15%;
		    /* margin-left: 35%;*/
		     color: bisque;
		     opacity: 0.8;
		     border-radius: 25px;
		     height: 20vw;
		     
		}
		.modal-content input{
		      opacity: 0.8;
		      border:none;
		      outline: none;
		      height: 35px;
		      color: black;
		      font-size: 15px;
		      padding: 15px;
		      border-radius: 25px;
		      width: 85%;

		      
		}
		.modal-body {padding: 2px 16px;}

	    @-webkit-keyframes slideIn {
	      from {bottom: -300px; opacity: 0} 
	      to {bottom: 0; opacity: 1}
	    }

	      @keyframes slideIn {
	        from {bottom: -300px; opacity: 0}
	        to {bottom: 0; opacity: 1}
	      }

	      @-webkit-keyframes fadeIn {
	        from {opacity: 0} 
	        to {opacity: 1}
	      }

	      @keyframes fadeIn {
	        from {opacity: 0} 
	        to {opacity: 1}
	      }
	      .close {
	      margin: 4px;
	      color:white;
	      background: coral;
	      float: left;
	      font-size: 28px;
	      font-weight: bold;
	      width:5%;
	      border-radius: 5px;
	      border:1px solid lemonchiffon;
	    }

	  .close:hover,
	  .close:focus {
	      color: black;
	      text-decoration: none;
	      cursor: pointer;
	    }
	</style>
</head>
<body >
	<center>
		<div style="width: 55%; color: white; margin-top: 15%">
			
			<table class="a">

				<form method="POST" action="stulogs.php">
					<tr>
					<td>
						<center>
							<label style="font-size: 35px;">SIGN IN</label>
							
						<hr style="width: 83%; border: 1px solid lightgray; ">
						</center>
						
					</td>
					</tr> 
					<tr>
						<td>
							<center>
								<input type="text" name="user" placeholder="Email">
							</center>
							
						</td>
					</tr>
					<tr>
						<td>
							
						</td>
					</tr>
					<tr>
						<td>
							
						</td>
					</tr>
					<tr>
						<td>
							
						</td>
					</tr>
					<tr>
						<td>
							<center>
								<input type="password" name="pass" placeholder="password" >
							</center>
							
						</td>
						
					</tr>
					<tr>
						<td>
							
						</td>
					</tr>
					<tr>
						<td>
							
						</td>
					</tr>
					<tr>
						<td>
							
						</td>
					</tr>
					<tr>
						<td>
							<center>
								<input type="submit" name="stu" class="sub" style="width: 85%;" value="LOGIN"><br>

								<label style="margin-top: 5px;"> Please 
									<label style="color: navy;cursor: pointer;" onclick="mod()">Click here</label> For Lecturer and 
									<label style="color: navy; cursor: pointer;" onclick="modala()">Here</label> for Exam officer.
								</label>
							</center>
							

						</td>
						
					</tr>
					</form>
				
			</table>

		</div>
	

	<div id="myModal" class="modal">
		<div class="modal-content" >
			<span class="close" >&times;</span>	    
			<div class="modal-body">
				<center>
					<div class="login-page" style="width: 100%;">
						
							<label style="font-size: 35px;">LECTURER</label>
							
							<form  method="POST" action="leclogs.php">
								<table style="width: 80%;">
									
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
											
										</td>
									</tr>
									<tr>
										<td>
											<center>
												<input type="submit" name="lec" value="Login" style="background-color:indianred;width: 100%; color: white;padding: 20px;">
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

	<div id="myMod" class="modal">
		<div class="modal-content" >
			<span class="close" >&times;</span>	    
			<div class="modal-body">
				<center>
					<div class="login-page" style="width: 100%;">
						
							<label style="font-size: 35px;">OFFICER</label>
							
							<form  method="POST" action="offlogs.php">
								<table style="width: 80%;">
									
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
											
										</td>
									</tr>
									<tr>
										<td>
											<center>
												<input type="submit" name="offi" value="Login" style="background-color:indianred;width: 100%; color: white;padding: 20px;">
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
	</center>
</body>
<script>
						
		var modal = document.getElementById('myModal');
		var span = document.getElementsByClassName("close")[0];
		var btn = document.getElementById("myBtn");
		var moda = document.getElementById('myMod');
			
		function mod() {
			  modal.style.display = "block";
		}
		function modala() {
			 moda.style.display = "block";
		}
		span.onclick = function() {
			  modal.style.display = "none";
		}
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