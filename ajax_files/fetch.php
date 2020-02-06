<?php

include "ajax_config.php";

error_reporting(E_ALL);
if(!isset($_REQUEST)){
	return;
}
else{

	$php_obj = json_decode($_POST['user_string']);
        $email = $php_obj->email;
	$password = $php_obj->password;

	$userValidationQuery = "select * from form where email='$email' AND password='$password'";
	try{
        	$userValidationResult = $conn->query($userValidationQuery);
	        $user = $userValidationResult->fetch_assoc();
        }
	catch(Exception $exception){
		echo "query failer";
	}
	$result_array = array();
                if($user['role']=='A'){
             	      $allDataSql = "select * from form";
		      $allDataResult = $conn->query($allDataSql);
		       if(mysqli_num_rows($allDataResult) > 0){
			      while($user = mysqli_fetch_assoc($allDataResult)) {
				      $result_array[] = $user;			     
			      }
		      }		     

         	}

	        else{ 
     
		     $result_array = [$user];

		}
	       echo(json_encode($result_array));


}


?>
