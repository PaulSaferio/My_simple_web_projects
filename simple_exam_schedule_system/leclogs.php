<?php
	
	$a= $_POST['email'];
	$b= $_POST['pass'];
	$conn= mysqli_connect('localhost','root','','exam');
	
	if (!$conn) {

    	die("Connection failed: " . mysqli_connect_error());
	}
	

	$query="SELECT * FROM lecturer ";
	$q1=mysqli_query($conn, $query);


	if ($q1)
	 	{
		    $result= mysqli_fetch_assoc($q1);
		    $mail= $result['email'];
		    $pass= $result['password'];
		    $name1= $result['firstname'];
		    $name= $result['lastname'];
		    $aID= $result['id'];
		    if ($mail==$a && $pass== $b && $pass !== null) 
		    	{
		    		session_start();
		    		$_SESSION['name1']= $name1;
		    		$_SESSION['name2']= $name;
		    		$_SESSION['udi']= $aID;
		    		header("Location: lec.php");

		    	}
		    else
		    {
			   	echo "<script language=\"JavaScript\">\n";
				echo "alert('username or password is incorrect!');\n";
				echo "window.location= 'index.php'";
				echo "</script>";
	   		}

	   }else{
		   	echo "<script language=\"JavaScript\">\n";
			echo "alert('Unknown credentials!');\n";
			echo "window.location= 'index.php'";
			echo "</script>";
		}
	
?>