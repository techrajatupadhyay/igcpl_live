<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         @media only screen and (max-width: 800px) {
         .career-details{
         margin-top: 90px!important;
         } 
          .right-description{
            margin-top: -40px!important;
         }
         }
         .career-details{
         margin-top: 160px;
         }  
         .career-details .jobdesc-box .right-description {
         width: 100%;
         box-shadow: 0px 3px 66px #00000012;
         border-radius: 10px;
         background: #fff;
         padding: 20px 30px;
         position: sticky;
         top: 30px;
         /* height: calc(100vh - 60px);*/
         min-height: 450px!important;
         overflow: hidden auto;
         }
         .career-details .apply-section {
         border-radius: 10px;
         }
         .career-details .apply-section h3 {
         margin: 0;
         }
         .career-details .jobdesc-box .right-description .form-box {
         margin-top: 15px;
         }
         .custom-form-section form {
         display: flex;
         justify-content: space-between;
         flex-wrap: wrap;
         }
         .custom-form-section .input-box {
         width: 100%;
         margin: 10px 0;
         position: relative;
         }
         .custom-form-section .input-box.left-view, .custom-form-section .input-box.right-view {
         width: calc(50% - 15px);
         display: inline-block;
         }
         .custom-form-section .input-box input, .custom-form-section .input-box select {
         background-color: #fff;
         box-shadow: 0px 4px 30px #6464641f;
         border: 1px solid #f3f2f2;
         border-radius: 7px;
         width: 100%;
         box-sizing: border-box;
         padding: 15px 15px 15px 70px;
         font-size: 1rem;
         }
         .custom-form-section .input-box input, .custom-form-section .input-box select {
         background-color: #fff;
         box-shadow: 0px 4px 30px #6464641f;
         border: 1px solid #f3f2f2;
         border-radius: 7px;
         width: 100%;
         box-sizing: border-box;
         padding: 15px 15px 15px 70px;
         font-size: 1rem;
         }
         .custom-form-section .input-box .icon-box {
         position: absolute;
         height: 41px;
         width: 51px;
         top: 8px;
         left: 0;
         border-right: 1px solid rgba(112,112,112,0.2);
         z-index: 1;
         }
         .custom-form-section .input-box .icon-box img, .custom-form-section .input-box .icon-box i {
         position: absolute;
         top: 10px;
         left: 0;
         right: 0;
         height: 22px;
         margin: 0 auto;
         text-align: center;
         }
         .custom-file-input {
         color: transparent;
         }
         .custom-file-input::-webkit-file-upload-button {
         visibility: hidden;
         }
         .custom-file-input::before {
         content: 'Upload Resume';
         color: black;
         display: inline-block;
         background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
         border: 1px solid #999;
         border-radius: 3px;
         padding: 5px 8px;
         outline: none;
         white-space: nowrap;
         -webkit-user-select: none;
         cursor: pointer;
         text-shadow: 1px 1px #fff;
         font-weight: 700;
         font-size: 10pt;
         }
         .custom-file-input:hover::before {
         border-color: black;
         }
         .custom-file-input:active {
         outline: 0;
         }
         .custom-file-input:active::before {
         background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9); 
         }
         .right-description{
            margin: 30px 0px;
         }
      </style>
   </head>
   <body>
       <section class="our-work career-details">
            <div class="container">
                <div class="jobdesc-box">
                   <div class="row">
                      <!-- <div class="col-md-1 col-sm-12"></div> -->
                      <div class="col-md-12 col-sm-12">
                         <div class="right-description ">
                            <div class="apply-section" id="careerform">
                               <h3 class="text-center my-1" style="color:#1746A2; font-weight: 800; font-size: 22px;">Apply Now</h3>
                               <div class="form-box custom-form-section">
                                  <form class="contact-form" method="post" action="<?= base_url(); ?>Job_Portal/actionresume" method="post" name="job_request" enctype="multipart/form-data" id="job-apply-form">
                                     <div class="input-box">
                                        <input type="text" name="username" placeholder="Name*">
                                        <div class="icon-box" >
                                           <i class="fa fa-user" aria-hidden="true"></i>
                                        </div>
                                     </div>
                                     <div class="input-box left-view">
                                        <input type="email" name="useremail" placeholder="Email*" required>
                                        <div class="icon-box">
                                           <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                     </div>
                                     <div class="input-box right-view">
                                        <input type="tel" name="userphone" placeholder="Phone Number*">
                                        <div class="icon-box">
                                           <i class="fa fa-phone" aria-hidden="true"></i>
                                        </div>
                                     </div>
                                     <div class="input-box">
                                        <div class="icon-box">
                                           <i class="fa fa-file" aria-hidden="true"></i>
                                        </div>
                                        <div class="file-upload-wrapper " data-text="Upload your resume*">
                                           <input name="resume_file" type="file" class="custom-file-input"  accept="image/png, image/gif, image/jpeg, image/jpg" required>
                                        </div>
                                     </div>
                                     <div class="submit-btn">
                                        <button type="submit" name="submit" class="btn  btn-lg ladda-button mt-5 text-white" style="background:#1746A2; padding: 7px 40px;" data-style="expand-left" data-size="m" id="tost_message">
                                        <span class="ladda-label">Submit</span>
                                        </button>
                                     </div>
                                  </form>
                               </div>
                            </div>
                         </div>
                      </div>
                     <!--  <div class="col-md-1 col-sm-12"></div> -->
                   </div>
                <!-- </div> -->

               <!--  <div class="jobdesc-box">-->
                   <div class="row mt-2 mb-5">
                      <!-- <div class="col-md-1 col-sm-12"></div> -->
                      <div class="col-md-12 col-sm-12">
                         <div class="right-description">
                            <div class="apply-section" id="careerform">
                              <!--  <h3 class="text-center" style="color:#00054c; font-weight: 800; font-size: 22px;">Apply Now</h3> -->
                               <div class="form-box custom-form-section">
                                 <h3  class="mt-2 mb-4" style="color:#1746A2;">Current Vacancies </h3>
                            <table class="table">
                                <thead>
                               <tr>
                                  <th scope="col" style="color:#1746A2;">Sr.</th>
                                  <th scope="col" style="color:#1746A2;">Role</th>
                                  <th scope="col" style="color:#1746A2;">Location</th>
                               </tr>
                                </thead>
                                <tbody>
                               <tr>
                                  <th scope="row">1.</th>
                                  <td>Branch Manager</td>
                                  <td>Ahmedabad, Surat, Rajkot, Vijayawada, Hyderabad,Raipur, Delhi, Chandigarh, Dehradun, Lucknow, Nagpur, Rourkela, Ranchi, Patna, Bangalore</td>
                               </tr>
                               <tr>
                                  <th scope="row">2.</th>
                                  <td>Marketing Executive</td>
                                  <td>Ahmedabad, Surat, Rajkot, Vijayawada, Hyderabad, Raipur, Delhi, Chandigarh, Dehradun, Lucknow, Nagpur, Rourkela, Bhubaneshwar, Ranchi, Patna, Bangalore</td>
                               </tr>
                               <tr>
                                  <th scope="row">3.</th>
                                  <td>Office Executive</td>
                                  <td>Ahmedabad, Surat, Rajkot, Vijayawada, Raipur, Delhi, Chandigarh, Dehradun, Lucknow, Nagpur, Rourkela, Bhubaneshwar, Ranchi, Patna, Bangalore</td>
                               </tr>
                               <tr>
                                  <th scope="row">4.</th>
                                  <td>Sr. Customer Care Executive</td>
                                  <td>Rajkot</td>
                               </tr>
                               <tr>
                                  <th scope="row">5.</th>
                                  <td>Accountant</td>
                                  <td>Rajkot, Mumbai</td>
                               </tr>
                               <tr>
                                  <th scope="row">6.</th>
                                  <td>Systems Executive</td>
                                  <td>Rajkot</td>
                               </tr>
                               <tr>
                                  <th scope="row">7.</th>
                                  <td>Relationship Manager</td>
                                  <td>Rajkot</td>
                               </tr>
                                </tbody>
                            </table>
                               </div>
                            </div>
                         </div>
                      </div>
                    
                   </div>
                </div>
                
            </div>
        </section>
    </body>
</html>