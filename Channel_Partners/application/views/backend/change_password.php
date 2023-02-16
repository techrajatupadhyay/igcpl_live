<?php
   if($this->session->userdata('user_login_access') != 1)
   {
      return redirect('Login'); 
   }
   
   $login_id = $this->session->userdata('user_login_id');
   $email = $this->session->userdata('email');
   $user_type = $this->session->userdata('user_type');
    
?>
<style>
   .star{
   color:red;
   font-size: 18px;
   }
   .btn {
    border-radius: 2px;
    text-transform: capitalize;
    font-size: 14px!important;
    /* padding: 10px 19px; */
    cursor: pointer;
}

.pass_show{position: relative} 

.pass_show .ptxt { 

position: absolute; 

top: 50%; 

right: 10px; 

z-index: 1; 

color: #f36c01; 

margin-top: -10px; 

cursor: pointer; 

transition: .3s ease all; 

} 

.pass_show .ptxt:hover{color: #333333;} 

</style>


<style>
/* Style all input fields */


/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #fff;
  color: #000;
  position: relative;
  /*padding: 20px;*/
  margin-top: 10px;
}

#message p {
  padding: 0px 35px;
  margin-bottom: 0rem;
  font-size: 13px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>


<div class="pcoded-content">
   <div class="pcoded-inner-content">
      <div class="main-body">
         <div class="page-wrapper">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
							<div class="d-inline">
							   <h4>Change Password</h4>
							</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                     <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                           <li class="breadcrumb-item">
                              <a href="index.html"> <i class="feather icon-home"></i> </a>
                           </li>
                           <li class="breadcrumb-item"><a href="#!">Change Password</a></li>
                        </ul>
                     </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card">
                        <form id="reset_password_form" action="<?php echo base_url()?>Login/reset_password" method="post" enctype="multipart/form-data">
                        <div class="card-header">
                            <h5>Change Password</h5>
                            <span>fields with <b style="color:red;">* </b> is mandatory !</span>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-trash-2 close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div  style="background-color: #fff;border-top: 1px dashed #1abc9c;padding: 20px 25px;position: inherit"></div>
                           <input type="hidden" name="user_id" class="form-control" value="<?php echo $login_id;?>" >
                           <input type="hidden" name="email" class="form-control" value="<?php echo $email;?>" > 
                           <input type="hidden" name="usertype" class="form-control" value="<?php echo $user_type;?>" >                          
                           <div class="card-block">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <!--<h4 class="sub-title" style="color:red;"><i class="fa fa-user-secret"></i>&nbsp; Other Details : </h4>-->
                                    <div class="card-block inner-card-block">
                                       <div class="row m-b-30">
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Current Password <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="feather icon-lock" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control"  id="current_password" name="current_password" placeholder="Current Password" required minlength="8" maxlength="8">
                                                <!--<span class="input-group-addon" id="basic-addon7"><i class="feather icon-eye-off" id="togglePassword"></i></span>-->
                                            </div>
                                          </div>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">New Password <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="feather icon-lock" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" minlength="8" maxlength="8"   required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                                <span class="input-group-addon" style="background-color:white;color:#007bff;border-left: none;"><i class="feather icon-eye" id="new_password_icon"></i></span>
                                            </div>
                                          </div>
                                          
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Confirm Password <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="feather icon-lock"></i></span>
                                                <input type="password" class="form-control" id="cnf_password" name="cnf_password" placeholder="Confirm Password"  minlength="8" maxlength="8" required >                                               
                                                <span class="input-group-addon" style="background-color:white;color:#007bff;border-left: none;"><i class="feather icon-eye" id="togglePassword"></i></span>
                                            </div>
                                          </div>

                                          <div class="col-sm-12">               
                                             <div id="message" style="display: none;">
                                                <h5>New Password must contain the following :</h5>
                                                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                                <p id="number" class="invalid">A <b>number</b></p>
                                                <p id="length" class="invalid">Minimum <b>8 characters/digits</b></p>
                                             </div> 
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                            </div>                            
                           
						          <div  style="background-color: #fff;border-top: 1px dashed #1abc9c;padding: 20px 25px;position: inherit"></div>	

                            <div class="row">				  
                               <div class="col-lg-5 col-md-4"></div>                                           					 
                               <div class="col-lg-3 col-md-2">
                                <div class="form-group">                                                                              
                                <button type="submit"  name="submit" onclick="javascript:return Validate();" id="sub_btn" disabled="disabled" class="btn  btn-round btn-block text-white" style="background: #00acaf; border: 1px solid #00acaf;"><i class="feather icon-lock"></i> Change Password </button
                                    </div>
                                </div>
                               <div class="col-lg-4 col-md-4"></div>
                            </div>

                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
   var new_password_icon = document.getElementById("new_password_icon");
   var new_password = document.getElementById("new_password");
   //var inp_type = document.getElementById("cnf_password").type ;
   new_password_icon.addEventListener("click", function () {
      // toggle the type attribute
      var new_password_type = new_password.getAttribute("type") === "password" ? "text" : "password";
      new_password.setAttribute("type", new_password_type);           
      //this.classList.replace("icon-eye-off", "icon-eye");
      if(new_password_type == 'password')
      {
         this.classList.replace("icon-eye-off", "icon-eye");        
      }
      else if(new_password_type=='text')
      { 
         this.classList.replace("icon-eye", "icon-eye-off");
      }   
   });

   // prevent form submit
   //var form = document.querySelector("form");
  // form.addEventListener('submit', function (e) {
   //   e.preventDefault();
  // });
</script>


<script type="text/javascript">
   var togglePassword = document.getElementById("togglePassword");
   var password = document.getElementById("cnf_password");
   //var inp_type = document.getElementById("cnf_password").type ;
   togglePassword.addEventListener("click", function () {
      // toggle the type attribute
      var type = password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);         
      //this.classList.replace("icon-eye-off", "icon-eye");
      if(type == 'password')
      {
         this.classList.replace("icon-eye-off", "icon-eye");       
      }
      else if(type=='text')
      { 
         this.classList.replace("icon-eye", "icon-eye-off");
      }
   });  
</script>


<script type="text/javascript">
   
   function Validate() 
	{
      var new_password = document.getElementById("new_password").value;
      var confirmPassword = document.getElementById("cnf_password").value;
		
      if (new_password != confirmPassword) 
		{
         alert("Passwords do not match.");
         $('#new_password').val('');
         $('#cnf_password').val('');
				
         $("#new_password").attr('style', 'border:1px solid #d03100 !important;');
         $("#new_password").css({ "background-color": "#fff2ee" });

         $("#cnf_password").attr('style', 'border:1px solid #d03100 !important;');
         $("#cnf_password").css({ "background-color": "#fff2ee" });
         return false;
      }
		else
		{
			var oldpassword = document.getElementById("current_password").value;
		
			if(oldpassword==new_password || oldpassword==confirmPassword)
			{
				alert("New Password Can Not be Same as Old Password.");
            $('#new_password').val('');
            $('#cnf_password').val('');
				
            $("#new_password").attr('style', 'border:1px solid #d03100 !important;');
            $("#new_password").css({ "background-color": "#fff2ee" });

            $("#cnf_password").attr('style', 'border:1px solid #d03100 !important;');
            $("#cnf_password").css({ "background-color": "#fff2ee" });

				return false;

			}
			else
			{

            $("#sub_btn").html('<i class="fa fa-spinner fa-spin"></i>Submitting...');
	         //document.getElementById('sub_btn').disabled = true;
            document.getElementById("reset_password_form").submit();				   
     		   return true;	
			}
		}
   }
</script>

<script type="text/javascript">
  
   $(document).ready(function() {
      
      $('#current_password').change(function () {
         var opt = "";
         var text = "";
         var current_password = $('#current_password').val();
               
         if(current_password.length == 8) 	
         {
            $('#current_password').attr('style', 'border:1px solid green !important;');
            $('#current_password').css({ "background-color": "#ffffff" });
            return true;						
         }
         else
         {		        			
            $("#current_password").attr('style', 'border:1px solid #d03100 !important;');
               $("#current_password").css({ "background-color": "#fff2ee" });
            text += " \u002A" + " Please Enter Valid 8 digit Current Password.";
            alert(text);
            $("#current_password").val("");
               $(this).focus();
               return false;
         }
               
      });
      
   });

</script>

<script>
   var myInput = document.getElementById("new_password");
   var letter = document.getElementById("letter");
   var capital = document.getElementById("capital");
   var number = document.getElementById("number");
   var length = document.getElementById("length");

   // When the user clicks on the password field, show the message box
   myInput.onfocus = function() 
   {
      document.getElementById("message").style.display = "block";
   }

   // When the user clicks outside of the password field, hide the message box
   myInput.onblur = function() 
   {
      document.getElementById("message").style.display = "none";
   }

   // When the user starts to type something inside the password field
   myInput.onkeyup = function() 
   {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if(myInput.value.match(lowerCaseLetters)) 
      {  
         letter.classList.remove("invalid");
         letter.classList.add("valid");
      } 
      else 
      {
         letter.classList.remove("valid");
         letter.classList.add("invalid");
      }
   
      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) 
      {  
         capital.classList.remove("invalid");
         capital.classList.add("valid");
      } 
      else 
      {
         capital.classList.remove("valid");
         capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) 
      {  
         number.classList.remove("invalid");
         number.classList.add("valid");
      } 
      else
      {
         number.classList.remove("valid");
         number.classList.add("invalid");
      }
   
      // Validate length
      if(myInput.value.length >= 8) 
      {
         length.classList.remove("invalid");
         length.classList.add("valid");
      } 
      else
      {
         length.classList.remove("valid");
         length.classList.add("invalid");
      }

      if(myInput.value.match(lowerCaseLetters) && myInput.value.match(upperCaseLetters) && myInput.value.match(numbers) && myInput.value.length >= 8)
      {
         document.getElementById('sub_btn').disabled = false;  
      }
      else
      {
         document.getElementById('sub_btn').disabled = true;
      }
   }
</script>