<?php
/* @author: PaulSaferio (Pamso) <owakipaul@gmail.com> */
$a= $_POST['email'];
$b= $_POST['pass'];

$conn= mysqli_connect('Localhost','root', '','cake');
 if(!$conn){
      echo "Error in connection";
    }
$sql="SELECT * from admin where email like '$a' and password like '$b'";
$res= mysqli_query($conn, $sql);
if ($res) 
	{
	# code...
		$result= mysqli_fetch_assoc($res);
	    $mail= $result['email'];
	    $pass= $result['password'];
	    $name1= $result['firstname'];
	    $name= $result['lastname'];
	    $aID= $result['ID'];
	    if ($mail==$a && $pass== $b) 
	    	{
	    		session_start();
	    		$_SESSION['name1']= $name1;
	    		$_SESSION['name2']= $name;
	    		$_SESSION['udi']= $aID;
	    		header("Location: user.php");

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