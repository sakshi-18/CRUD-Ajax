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
	$hashedPassword = hash('sha256',$password);

	$userValidationQuery = "select * from form where email='$email' AND password='$hashedPassword'";
	try{
        	$userValidationResult = $conn->query($userValidationQuery);
		$user = $userValidationResult->fetch_assoc();
	//	print($user['email']);
        }
	catch(Exception $exception){
		echo "query failed";
	}
	$result_array = array();
                if($user['role']=='A'){
			$allDataSql = "select * from form";
			try{
				$allDataResult = $conn->query($allDataSql);
			}
			catch(Exception $exception){
				echo "Query failed";
			}
		       if(mysqli_num_rows($allDataResult) > 0){
			      while($user = mysqli_fetch_assoc($allDataResult)) {
				      $result_array[] = $user;	
		                     // print($user['email']);		      
			      }
			      print($result_array[0]['email']);
		      }		     

         	}

	        else{ 
     
		     $result_array[] = $user;

		}
	       if(!isset($result_array)){
		       return;
	       }
	       else{
		       echo(json_encode($result_array));
	       }


}


?>
