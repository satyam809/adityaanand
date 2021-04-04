<!DOCTYPE html>
<html lang="en">
   <?php include 'include/head.php';?>
   <body data-spy="scroll" data-target="#fixedNavbar">
      <div class="page-wrapper">
        <?php include 'include/header.php';?>
         <main class="site-main" id="mainWrapper">
            <section class="hero-section jarallax flex-box-center" data-jarallax data-speed="0.5s" data-scroll-index="1">
               <img src="img/bg/background.png" alt="" class="jarallax-img">
               <div class="container">
                  <div class="row hero-row align-items-center">
                     <div class="col-lg-7 col-xl-6">
                        <div class="hero-section-inner wow fadeInUp" data-wow-delay="0.1s">
                           <h1 class="hero-title">I'm <br><span id="typed-text"></span></h1>
                           <p class="hero-text">
                              My journey began in the town of Bhagalpur in Bihar, Born on the 30th of April 1989 I am the 1st among the 4 children of Rita Devi and Upendra Prasad. Childhood was one of immense struggle and difficulty As a youngster I'm a business person and social work
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <a href="#" data-scroll-nav="2" class="down-scroll wow zoomIn">
               <i class="fa fa-arrow-down"></i>
               </a>
            </section>
            <?php include 'include/about.php';?>
            <?php include 'include/works.php';?>
            <?php include 'include/videos.php';?>
            <?php //include 'include/team.php';?>
            <?php include 'include/contact.php';?>
         </main>
         <?php include 'include/footer.php';?>
         <a href="#" class="scroll-top-btn" data-scroll-goto="1">
         <span class="fa fa-arrow-up"></span>
         </a>
         <div class="preloader-wrap">
            <div class="preloader-inner">
               <div id="loader"></div>
            </div>
         </div>
      </div>
      <?php include'include/foot.php';?>
   </body>
</html>