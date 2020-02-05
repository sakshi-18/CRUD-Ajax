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
<script src="jquery.js">   
/*
            $(document).ready(function(){
	         var data1;
	         $("#myform1").hide();
		 $("#myform2").hide();
		 $("#home").hide();
		 $("#logout").hide();
		 $("#register").on('click',function(){
	             $("#myform2").hide();
                     $("#myform1").show();
	               $("#submit").on('click' , function() {
			  var name = $('#name').val();
			  var email = $('#email').val();
			  var phone = $('#phone').val();
			  var password = $('#password').val();
			 // var role = 'C';
			  $.ajax({
			     type:'POST',
	                     url: 'insert.php',
			     data:{
			            name:name,
				    email:email,
				    phone:phone,
				    password:password,
				   // role:role
			  },
			     success: function(data){
				     alert(data);
				     document.getElementById('name').value="";
				     document.getElementById('email').value="";
				     document.getElementById('phone').value="";
				     document.getElementById('password').value="";
				     } 

			  });
		      });
	           });

		 $("#login").on('click',function(){
                        $("#myform1").hide();
			$("#myform2").show();
				$("#loginPage").on('click',function(){
				var email = $('#login_email').val();
				var password = $('#login_password').val();
				var user_json = {
			                	email :email,
						password :password
				};
				var user_string = JSON.stringify(user_json);
				$.ajax({
				      type :'POST',
		                      url :'fetch.php', 
				      //dataType: 'json',
				      //contentType: 'application/json',
		                      
				      data : {
				      user_string :user_string
			         	},
				      success:function(data){
					      //alert("success");
					      if(data){
						      alert("login successfully");
						      data1 = JSON.parse(data);
						      console.log(data1);
						       $("#myform1").hide();
						       $("#myform2").hide();
						       $("#register").hide();
						       $("#login").hide();

						       for(var i=0;i < data1.length;i++){
							       var id = data1[i]['id'];
							       var name = data1[i]['name'];
                                                               var email = data1[i]['email'];
                                                               var phone = data1[i]['phone'];

							       $('#table').append(
								       '<tr>'+
								       '<td>'+id+'</td>'+
								       '<td>'+name+'</td>'+
								       '<td>'+email+'</td>'+
								       '<td>'+phone+'</td>'+
                                                                       '<td>'+'<button class="btn btn-success" id="edit">Edit</button>' + '</td>'+
		                                                       '<td>' + '<button class="btn btn-danger" id="delete">Delete</button>' + '</td>' +
								       '</tr>'
							       );

							       $('td').css('color','white');
							     //  $('#table').find('button').addClass("btn btn-success");
						       }
                                                       $("#logout").show();
					               $("#home").show();
					      }
					      else{
						       alert("Invalid email/password");
						       $("#myform1").hide();
					               $("#myform2").show();
						       $("#home").hide();
					      }

					      
				      }
				});
			})


		 });

	  });
*/ 

	</script>
 
	   

                    

               

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
             </div>
 
	     <div class="form-group">
	       <input type='email' class="form-control" id='email' placeholder='Enter email' />
	     </div>

	     <div class="form-group">
               <input type="text" class="form-control" id="phone" placeholder="Enter phone"/>
	     </div>

             <div class="form-group">
               <input type="password" class="form-control" id="password" placeholder="Enter password"/>
	     </div>
       
             <button id='submit' type="button"  class="btn btn-primary" >Submit</button>
	     <p id='result'></p>
	</form>
        </div>
        <form  method='post' id='myform2' class="container" style="margin-top:20px">
              <h1>Login</h1>
               
             <div class="form-group">
	       <input type='email' class="form-control" id='login_email' placeholder='Enter email' />
	     </div>
              <div class="form-group">
               <input type="password" class="form-control" id="login_password" placeholder="Enter password"/>
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
