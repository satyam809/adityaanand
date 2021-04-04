<?php
   include 'admin/config.php';
   if(isset($_POST['btnsave'])){ 
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $sql = "INSERT INTO `contact`( `name`, `email`, `subject`, `message`) 
    VALUES ('$name','$email','$subject','$message')";
   if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)){ 
    if (mysqli_query($conn, $sql)) {
       echo '<script language="javascript">';
       echo 'alert("message successfully sent")';
       echo '</script>';
       // the message
       $msg = $name."whose Email:".$email."Subject".$subject." wrote the following:" . "\n\n" .$message."";
   
       // use wordwrap() if lines are longer than 70 characters
       $msg = wordwrap($msg,70);
   
       // send email
       mail("contact@adityaanand.live","Contact Detail",$msg);
             } 
             else{
               echo '<script language="javascript">';
                echo 'alert("message not sent")';
                echo '</script>';
             }
             
          }
   }
   ?>
<section class="contact section" data-scroll-index="7">
   <div class="container">
      <div class="row align-items-center justify-content-center">
         <div class="col-lg-7">
            <div class="section-heading">
               <h2 class="section-title">Contact<span>Me</span></h2>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-md-10">
            <form action="" method="post">
               <div class="empty-form text-center" style="display: none;"><span>Please Fill Required Fields</span></div>
               <div class="email-invalid text-center" style="display: none;"><span>Email is invalid</span></div>
               <div class="success-form text-center"></div>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <input type="text" class="form-input" name="name" id="name" required placeholder="Your Name *">
                        <span class="mdi mdi-account-outline"></span>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" required placeholder="Your Email *">
                        <span class="mdi mdi-email-outline"></span>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="form-group">
                        <input type="text" class="form-input" name="subject" id="subject" required placeholder="Subject *">
                        <span class="mdi mdi-email-outline"></span>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="form-group">
                        <textarea name="message" id="message" class="form-input" placeholder="Your Message *" cols="20" required rows="5"></textarea>
                        <span class="mdi mdi-email-open-outline"></span>
                     </div>
                  </div>
                  <div class="col-lg-12 text-center">
                     <div class="contact-btn-wrap">
                        <button type="submit"  class="default-button contact-btn" name="btnsave">Send Message</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>