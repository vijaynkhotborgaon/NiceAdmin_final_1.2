<?php 
	//Include database connection details

	require_once('../config.php');
	require_once('auth.php');
	//Array to store validation errors

	$errmsg_arr = array();

	//Validation error flag

	$errflag = false;

	//Function to sanitize values received from the form. Prevents SQL injection

	function clean($str) {

		$str = @trim($str);

		if(get_magic_quotes_gpc()) {

			$str = stripslashes($str);

		}

		return mysql_real_escape_string($str);

	}

	

	//Sanitize the POST values


$role_id=clean($_POST['Industry']);
$act_id=$_POST['Industry_1'];
$priv_id=$_POST['Previlages'];

	
if($role_id == '') {





		$errmsg_arr[] = 'Select Role';





		$errflag = true;





	}
	
	
	
	
if($act_id == '') {





		$errmsg_arr[] = 'Select activity';





		$errflag = true;





	}
	
	
	
	/*if($middle_name == '') {





		$errmsg_arr[] = 'Enter middle Name';





		$errflag = true;





	}*/
	
	
	








	

		if($errflag) {





		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;





		session_write_close();





		header("location: map_activity.php");





		exit();





	}
	


	
	

	

foreach ($priv_id as $priv_id){	
$string_array = explode("(",$priv_id); 
echo $id = rtrim($string_array[1], ")");

$mystring = $priv_id;
$first = strtok($mystring, '(');



$qry = "INSERT INTO t_manage_activity(act_id, priority_id,pri_id) VALUES('$id','$role_id','$first')";
$result = @mysql_query($qry);

}


if($result) {

			$_SESSION['CAMREGMESG'] = 1;

			session_write_close();

			header("location: map_activity.php");

			exit();

		}else {

			die("Query failed");

		}
		
		
		
		
	?>
	
	