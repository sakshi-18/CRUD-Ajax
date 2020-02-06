 $(document).ready(function(){
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
			  var flag = 1;
			  $("p").css("color","red");
			  $("input").focus(function(){
				  $(this).siblings("p").text("");
			  });
			  if(!(/^[a-zA-Z\s]{3,30}$/).test(name)){
				  $("p#name_alert").text("Invalid name format");
				  flag=0;

			  }
			  if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
                                  $("p#email_alert").text("Please provide valid email address");
				  flag=0;
			  }
			  if(!phone.match(/^[6-9]{1}\d{9}$/)){
                                  $("p#phone_alert").text("Please provide valid phone number");
				  flag=0;
			  }
			  if(!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]).{8,22}$/)){
                                  $("p#password_alert").text("Please enter a valid password");
				  flag=0;
			  }
		          if(flag==0){
				  return false;
			  }
	                   else{

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
				            name="";
				            email="";
				            phone="";
				            password="";
				     } 

			         });
			   }
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
				var flag=1;
                                $("p").css("color","red");
			        $("input").focus(function(){
				     $(this).siblings("p").text("");
			        });

				if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
                                    $("p#emailLogin_alert").text("Please provide valid email address");
				    flag=0;
			        }
                                if(!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]).{8,22}$/)){
                                  $("p#passwordLogin_alert").text("Please enter a valid password");
				  flag=0;
			          }

			         if(flag==0){
				    return false;
			         }
	                        else{
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
						      console.log(data);
						      alert("login successfully");
						      var resultArray = JSON.parse(data);
						      console.log(resultArray);
						       $("#myform1").hide();
						       $("#myform2").hide();
						       $("#register").hide();
						       $("#login").hide();

						       for(var i=0;i<resultArray.length;i++){
							       var id = resultArray[i]['id'];
							       var name = resultArray[i]['name'];
                                                               var email = resultArray[i]['email'];
                                                               var phone = resultArray[i]['phone'];

							       $('#table').append(
								       '<tr>'+
								       '<td>'+id+'</td>'+
								       '<td>'+name+'</td>'+
								       '<td>'+email+'</td>'+
								       '<td>'+phone+'</td>'+
                                                                       '<td>'+'<button class="btn btn-success" class="edit">Edit</button>' + '</td>'+
		                                                       '<td>' + '<button class="btn btn-danger" class="delete">Delete</button>' + '</td>' +
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
			      }
			});
		 });
	       // $(".delete").on('click',function(){
		//	var delete_id = $(this).parent().siblings("#email_id").val();
		//	console.log(delete_id);
	//	});

 })
