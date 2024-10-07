<?php 
session_start(); 
include "./database/db.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['username']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";

		$result = mysqli_query($database, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if($row["id"]=="2"){	

					$_SESSION["username"]=$username;

					header("location:index.php");
				}

				elseif($row["id"]=="1")
				{

					$_SESSION["username"]=$username;
					
					header("location:./admin/admin.php");
				}			
			else{
				header("Location: login.php?error=Incorrect Username or password");
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorrect Username or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}

?>