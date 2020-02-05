<?php

include "ajax_config.php";

error_reporting(E_ALL);
if(isset($_REQUEST)){
	$php_obj = json_decode($_POST['user_string']);
//	var_dump($_POST['user_string']);
	$email= $php_obj->email;
	$password = $php_obj->password;

	$sql = "select password,role from form where email='$email'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$result_array = array();
//	$result_obj = (object)[];
	if($row['password']==$password){ 
	//	echo 1 ;
                if($row['role']=='A'){
             	      $sql_admin = "select * from form";
		      $result1 = $conn->query($sql_admin);
		      //$row1 = $result1->fetch_assoc();
		      //$obj = json_encode($row1);
                      if(mysqli_num_rows($result1) > 0){
			      while($row1 = mysqli_fetch_assoc($result1)) {
				      array_push($result_array,$row1);
			      }
		      }


		      echo(json_encode($result_array));
		     

         	}

	        else{ 
		      $sql_client = "select * from form where email='$email'";
        	      $result2 = $conn->query($sql_client);
		      //$row1 = $result2->fetch_assoc();
		        if(mysqli_num_rows($result2) > 0){
			      while($row1 = mysqli_fetch_assoc($result2)) {
				      array_push($result_array,$row1);
			      }
		      }


		      echo(json_encode($result_array));
         	}

	}
	else{
	//	echo 0;
	}
}

?>
