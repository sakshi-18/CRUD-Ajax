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

						       for(var i=0;i<data1.length;i++){
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
			});
		 });
	       // $(".delete").on('click',function(){
		//	var delete_id = $(this).parent().siblings("#email_id").val();
		//	console.log(delete_id);
	//	});

 })
