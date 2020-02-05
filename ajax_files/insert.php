<?php
 
include "ajax_config.php";

if(isset($_REQUEST)){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $role = 'C';
  
	$query = "insert into form(name,email,phone,password,role) values('$name','$email','$phone','$password','$role')";
	if($conn->query($query)){
		echo " Data inserted";
        }
	else{
		echo "Data not inserted";
	}
}

?>

