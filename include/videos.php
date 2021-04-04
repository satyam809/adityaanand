<style type="text/css">
  .video-box {
    border-radius: 30px;
    overflow: hidden;
    margin-bottom: 20px;
}
.video-box {
    position: relative;
    _box-shadow: 0px 0px 20px rgba(0,0,0,0.40);
}
.video-box .overlay-box {
    position: absolute;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    text-align: center;
    overflow: hidden;
    line-height: 80px;
    _background: rgba(19,184,234,0.08);
    transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
}
.video-box .overlay-box span {
    background-color: #9a7f59;
}
.video-box .overlay-box i {
    position: relative;
    width: 80px;
    height: 80px;
    top: 40%;
    z-index: 99;
    color: #ffffff;
    font-weight: 400;
    font-size: 24px;
    text-align: center;
    border-radius: 50%;
    padding: 15px 0px 0px 10px;
    background-color: #9c3;
    display: inline-block;
    margin-top: -40px;
    transition: all 900ms ease;
    -moz-transition: all 900ms ease;
    -webkit-transition: all 900ms ease;
    -ms-transition: all 900ms ease;
    -o-transition: all 900ms ease;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.15);
}
</style>
<section class="section testimonials bg-light-grey" data-scroll-index="3">
   <div class="container">
      <div class="row align-items-center justify-content-center">
         <div class="col-md-7">
            <div class="section-heading">
               <h2 class="section-title">My<span>Videos</span></h2>
               <p class="section-sub-title">
                  If you are going to use a passage of Lorem Ipsum, you need to 
                  be sure there isn't anything embarrassing hidden in the middle of text.
               </p>
            </div>
         </div>
      </div>
      <!--// .row //-->
      <div class="testimonials-carousel owl-carousel owl-theme owl-loaded owl-drag">
         <div class="owl-stage-outer">
            <div class="owl-stage" style="transform: translate3d(-1710px, 0px, 0px); transition: all 3s ease 0s; width: 3420px;">
              <?php 
              include('admin/config.php');
              $sql="select * from video_table";
              $result=mysqli_query($conn,$sql);
              
              while($row=mysqli_fetch_array($result)){?>
               <div class="owl-item cloned" style="width: 540px; margin-right: 30px;">
                  <div class="item">
                     <div class="testimonial-item">
                        <div class="video-box">
                            <!-- <figure class="image">
                                <img src="img/bg/about_1.jpg" alt="" style="height:250px;">
                            </figure> -->
                            <iframe src="<?php echo $row['video_link'];?>"  style="height: 250px; width: 100%"><i class="fa fa-play" style="font-size:48px;"></i></iframe>
                        </div>
                     </div>
                  </div>
               </div>
               <?php }?>
               
            </div>
         </div>
         <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
         <div class="owl-dots disabled"></div>
      </div>
   </div>
   <!--// .container //-->
</section>