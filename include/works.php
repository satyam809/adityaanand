<section class="section portfolio-section pb-minus-70" data-scroll-index="4">
               <div class="container">
                  <div class="row align-items-center justify-content-center">
                     <div class="col-md-7">
                        <div class="section-heading">
                           <h2 class="section-title">My<span>Images</span></h2>
                           <p class="section-sub-title">
                              If you are going to use a passage of Lorem Ipsum, you need to 
                              be sure there isn't anything embarrassing hidden in the middle of text.
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="portfolio-gallery portfolio-grid row">
                     <?php include 'admin/config.php';
                     $sql="select * from image_table";
                     $result=mysqli_query($conn,$sql);
                     while($row=mysqli_fetch_array($result)){
                     ?>
                     <div class="col-md-6 col-lg-4 glry-item col-sm-12 web">
                        <div class="portfolio-inner">
                           <div class="portfolio-back">
                              <div class="portfolio-buttons">
                                 <a href="images/<?php echo $row['images'];?>" class="portfolio-zoom-link">
                                 <i class="fas fa-search"></i>
                                 </a>
                                 <a href="portfolio-details.html" class="portfolio-details-link">
                                 <i class="fas fa-arrow-right"></i>
                                 </a>
                              </div>
                           </div>
                           <img src="images/<?php echo $row['images'];?>" alt="Portfolio Img" class="img-fluid portfolio-img">
                           <h6 class="project-title">Web Design</h6>
                        </div>
                     </div>
                     <!-- <div class="col-md-6 col-lg-4 glry-item col-sm-12 logo">
                        <div class="portfolio-inner">
                           <div class="portfolio-back">
                              <div class="portfolio-buttons">
                                 <a href="img/portfolio/portfolio_image_02.png" class="portfolio-zoom-link">
                                 <i class="fas fa-search"></i>
                                 </a>
                                 <a href="portfolio-details.html" class="portfolio-details-link">
                                 <i class="fas fa-arrow-right"></i>
                                 </a>
                              </div>
                           </div>
                           <img src="img/portfolio/portfolio_image_02.png" alt="Portfolio Img" class="img-fluid portfolio-img">
                           <h6 class="project-title">Logo Design</h6>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-4 glry-item col-sm-12 branding">
                        <div class="portfolio-inner">
                           <div class="portfolio-back">
                              <div class="portfolio-buttons">
                                 <a href="img/portfolio/portfolio_image_04.png" class="portfolio-zoom-link">
                                 <i class="fas fa-search"></i>
                                 </a>
                                 <a href="portfolio-details.html" class="portfolio-details-link">
                                 <i class="fas fa-arrow-right"></i>
                                 </a>
                              </div>
                           </div>
                           <img src="img/portfolio/portfolio_image_04.png" alt="Portfolio Img" class="img-fluid portfolio-img">
                           <h6 class="project-title">Branding Design</h6>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-4 glry-item col-sm-12 logo">
                        <div class="portfolio-inner">
                           <div class="portfolio-back">
                              <div class="portfolio-buttons">
                                 <a href="img/portfolio/portfolio_image_03.png" class="portfolio-zoom-link">
                                 <i class="fas fa-search"></i>
                                 </a>
                                 <a href="portfolio-details.html" class="portfolio-details-link">
                                 <i class="fas fa-arrow-right"></i>
                                 </a>
                              </div>
                           </div>
                           <img src="img/portfolio/portfolio_image_03.png" alt="Portfolio Img" class="img-fluid portfolio-img">
                           <h6 class="project-title">Logo Design</h6>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-4 glry-item col-sm-12 logo">
                        <div class="portfolio-inner">
                           <div class="portfolio-back">
                              <div class="portfolio-buttons">
                                 <a href="img/portfolio/portfolio_image_06.png" class="portfolio-zoom-link">
                                 <i class="fas fa-search"></i>
                                 </a>
                                 <a href="portfolio-details.html" class="portfolio-details-link">
                                 <i class="fas fa-arrow-right"></i>
                                 </a>
                              </div>
                           </div>
                           <img src="img/portfolio/portfolio_image_06.png" alt="Portfolio Img" class="img-fluid portfolio-img">
                           <h6 class="project-title">Logo Design</h6>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-4 glry-item col-sm-12 web">
                        <div class="portfolio-inner">
                           <div class="portfolio-back">
                              <div class="portfolio-buttons">
                                 <a href="img/portfolio/portfolio_image_05.png" class="portfolio-zoom-link">
                                 <i class="fas fa-search"></i>
                                 </a>
                                 <a href="portfolio-details.html" class="portfolio-details-link">
                                 <i class="fas fa-arrow-right"></i>
                                 </a>
                              </div>
                           </div>
                           <img src="img/portfolio/portfolio_image_05.png" alt="Portfolio Img" class="img-fluid portfolio-img">
                           <h6 class="project-title">Web Design</h6>
                        </div>
                     </div> -->
                  <?php } ?>
                  </div>
               </div>
            </section>