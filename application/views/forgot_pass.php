   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
<style>
   .ft-contact-page-form-wrapper{
   padding: 30px;
   background-color: #f4f4f4;
   color: #999;
   border-radius: 3px;
   margin-bottom: 15px;
   box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
   margin-top:42%;
   }
   .form-control
   {
   height: 40px;
   box-shadow: none;
   color: #969fa4;
   }
   .form-control:focus
   {
   border-color: #5cb85c;
   }
   .form-control, .btn
   {        
   border-radius: 3px;
   }
   .signup-form
   {
   width: 450px;
   margin: 0 auto;
   padding: 30px 0;
   font-size: 15px;
   }
   .signup-form h2 
   {
   color: #000;
   margin: 0 0 15px;
   position: relative;
   text-align: center;
   }
   .signup-form h2:before, .signup-form h2:after 
   {
   content: "";
   height: 2px;
   width: 19%;
   background: #d4d4d4;
   position: absolute;
   top: 50%;
   z-index: 2;
   }  
   .signup-form h2:before
   {
   left: 0;
   }
   .signup-form h2:after 
   {
   right: 0;
   }
   .signup-form .hint-text 
   {
   color: #fff;
   margin-bottom: 30px;
   text-align: center;
   }
   /*.user-info 
   {
   color: #999;
   border-radius: 3px;
   margin-bottom: 15px;
   background:#fff;
   box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
   padding: 30px;
   margin-top:14%;
   }*/
   .signup-form .form-group 
   {
   margin-bottom: 20px;
   }
   .signup-form input[type="checkbox"] {
   margin-top: 3px;
   }
   .signup-form .btn {        
   font-size: 16px;
   font-weight: bold;     
   min-width: 140px;
   outline: none !important;
   }
   .signup-form .row div:first-child {
   padding-right: 10px;
   }
   .signup-form .row div:last-child {
   padding-left: 10px;
   }      
   .signup-form a {
   color: #fff;
   text-decoration: underline;
   }
   .signup-form a:hover {
   text-decoration: none;
   }
   .signup-form form a {
   color: #5cb85c;
   text-decoration: none;
   }  
   .signup-form form a:hover {
   text-decoration: underline;
   }  
   .wrapper 
   {
   width: auto;
   height: auto;
   }
   .circle {
   width: 50px;
   height: 50px;
   background: rgb(183, 208, 58);
   border-radius: 100px;
   position: relative;
   margin: 10px auto 0 auto;
   }
   h5 {
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   margin: 0;
   color: #fff;
   }
   .large-8{
   margin-left:70px;
   }
   .vertical-line {
   width: 2px;
   height: 150px;
   background: rgb(183, 208, 58);
   margin: 20px auto 0 auto;
   }
   .submit-btn{
   background:#b7d03a;
   }
</style>
</head>
<body>
   <div class="user-info">
      <div class="container">
         <!--  <div class="row" id="send_otp" >
            <div class="col-md-12">
               <div class="signup-form">
                  <h2>
                     <p style="font-size:30px;">Forgot Password </p>
                  </h2>
                  <form id="email_verify" action="<?php echo base_url('Forgot_password/get_otp');?>"  method="POST" >
                     <div class="form-group">
                        <br>                                                                                            
                        <div class="form-group">                  
                           <input class="form-control" type="email" name="emailid" id="email" required placeholder="enter email id register with your account " >                   
                        </div>
                        <br>                                                           
                        <div class="form-group">
                           <?php //echo form_submit(['name'=>'insert','value'=>'Sign up','class'=>'btn submit-btn btn-lg btn-block']);?>
                           <button class="btn submit-btn btn-lg btn-block" onclick="javascript:return Validate();" class="btn btn-success" type="submit" > get otp</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
        </div> -->
			
			<div class="row" id="send_otp">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				    <div class="ft-contact-page-form-wrapper headline">
					  <div class="signup-form">
						 <h2>
							<p style="font-size:30px;">Forgot Password </p>
						 </h2>
						 <form id="email_verify" action="<?php echo base_url('Forgot_password/get_otp');?>"  method="POST" >
							<div class="form-group">
							   <br>                                                                                            
							   <div class="form-group">                  
								  <input class="form-control" type="email" name="emailid" id="email" required placeholder="enter email id register with your account " >                   
							   </div>
							   <br>                                                           
							   <div class="form-group">
								  <?php //echo form_submit(['name'=>'insert','value'=>'Sign up','class'=>'btn submit-btn btn-lg btn-block']);?>
								  <button class="btn submit-btn btn-lg btn-block text-white" onclick="javascript:return Validate();" class="btn btn-success" type="submit" > get otp</button>
							   </div>
							</div>
						 </form>
					  </div>
				    </div>
				   <div class="col-md-3"></div>
				</div>
			</div>
			<div class="row" id="verify_otp" style="display: none;">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				    <div class="ft-contact-page-form-wrapper headline">
					    <div class="signup-form">
						  <h2>Verify OTP</h2>
							<form id="email_verify" action="<?php echo base_url('Forgot_password/verify_otp');?>" method="POST" >
								<div class="form-group">                                                    
									<input class="form-control" type="text" name="otp" id="email" required placeholder="Enter OTP" >
									<span id="msgEmail"></span>                     
								</div>
								<div class="form-group" >
									<button class="btn submit-btn btn-lg btn-block" class="btn btn-success" type="submit" > Verify OTP</button>
								</div>
							</form>
					    </div>
				    </div>
			    </div>
			</div><br><br>
		 
      </div>
   </div>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	  
   <script>
      $("#email_verify").submit(function(e) 
      {
         
         e.preventDefault(); // avoid to execute the actual submit of the form.
      
         var form = $(this);
         var actionUrl = form.attr('action');
            
         $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                 
               if(data=='2')
               {  
                              
                  swal({
                     title: "This Email is not register with US !",
                     text: "please use another email !",
                     icon: "warning",
                     button: "OK!",
                  });    
                  
                  $('#send_otp').show();
                  $('#verify_otp').hide();
                                          
               }
               else if(data=='1')
               {  
                  //alert('Please check mail and verify otp');
                  
                  swal({
                     title: "OTP Send Successfully",
                     text: "Please check your mail and verify otp",
                     icon: "success",
                     button: "OK!",
                  });   
                  
                  $('#send_otp').hide();
                  $('#verify_otp').show();
                  
               }
               else if(data=='0')
               {  
                     
                  swal({
                     title: "Email not send !",
                     text: "please try again !",
                     icon: "error",
                     button: "OK!",
                  });
                  
                  $('#send_otp').show();
                  $('#verify_otp').hide();
                  
               }
               else if(data=='-1')
               {  
                                 
                  swal({
                     title: "Something went wrong !",
                     text: "please try again !",
                     icon: "error",
                     button: "OK!",
                  });
                  
                  $('#send_otp').show();
                  $('#verify_otp').hide();
                  
               }  
         
            }
         });
         
      });
      
   </script>      
</body>
</html>