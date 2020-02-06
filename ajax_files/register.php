<!DOCTYPE html>
<html>
<head>
	<title>PHP MySQL Insert Tutorial</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

       	<script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <style>
            body{
                background:black;
	   }
           h1{
                color:white;
           }
	</style>
<script src="jquery.js"> </script>

</head>
 
<body>
         
         <div style="margin-top:20px" class="container">
	 <button id='register' type="button"  class="btn btn-primary" >register</button>

	 <button id='login' type="button"  class="btn btn-primary" >login</button>
         <button id='logout' style="float:right" type="button"  class="btn btn-danger" >logout</button>

         </div>
        <div class="container" style="margin-top:20px"> 
	<form  method='post' id='myform1' class="container">
              <h1>Register</h1>
             <div class="form-group">
		<input type='text' class="form-control" id='name' placeholder='Enter name' />
                <p id="name_alert"></p>
             </div>
 
	     <div class="form-group">
	       <input type='email' class="form-control" id='email' placeholder='Enter email' />
                <p id="email_alert"></p>
	     </div>

	     <div class="form-group">
	       <input type="text" class="form-control" id="phone" placeholder="Enter phone"/>
                <p id="phone_alert"></p>
	     </div>

             <div class="form-group">
	       <input type="password" class="form-control" id="password" placeholder="Enter password"/>
                <p id="password_alert"></p>
	     </div>
       
             <button id='submit' type="button"  class="btn btn-primary" >Submit</button>
	</form>
        </div>
        <form  method='post' id='myform2' class="container" style="margin-top:20px">
              <h1>Login</h1>
               
             <div class="form-group">
	       <input type='email' class="form-control" id='login_email' placeholder='Enter email' />
               <p id="emailLogin_alert"></p>
	     </div>
             <div class="form-group">
	       <input type="password" class="form-control" id="login_password" placeholder="Enter password"/>
                <p id="passwordLogin_alert"></p>
	     </div>
              <button id='loginPage' type="button"  class="btn btn-primary" >Login</button>

	</form>
        <div id="home" class="container">
             <h1>User Details</h1>
             <table class="table">
                  <thead class="thead-dark">
                     <tr>
                           <th scope="col">Id</th>
                           <th scope="col">Name</th>
	                   <th scope="col">Email Id</th>
                           <th scope="col">Phone </th>
                           <th scope="col">Update</th>
                           <th scope="col">Delete</th>
                    </tr>
                 </thead>
                <tbody id="table">
                </tbody>
            </table>
         </div>
</body>
</html>
