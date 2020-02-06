<?php
 
include "ajax_config.php";

if(!isset($_REQUEST)){
	return;
}
else{

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
	$role = 'A';
	$hashedPassword = hash('sha256',$password);

	//User Validation
                  $flag = 1;
        	  if(!preg_match("/^[a-zA-Z\s]{3,30}$/",$name)){
	               	 $flag=0;

	           }
                  if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)){
                         $flag=0;
		   }
	          if(!preg_match("/^[6-9]{1}\d{9}$/",$phone)){
                       	 $flag=0;
		   }
	          if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]).{8,22}$/",$password)){
                         $flag=0;
                   }
                  if($flag==0){
			  return;
	          }
                  else{

	             $userInsertSql = "insert into form(name,email,phone,password,role) values('$name','$email','$phone','$hashedPassword','$role')";
		     try{  
                      $userInsertResult = $conn->query($userInsertSql);
		      echo " Data inserted";
		      
		     }
                     catch(Exception $exception){
		            echo "Data not inserted";
		     }
		  }
}

?>

