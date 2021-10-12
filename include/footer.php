 <div class="instagram-area">
        <div class="container-fluid p-0">
            <div class="row  no-gutters">
                
                
                <?php 
 
 
 $p=mysqli_query($conn,"SELECT *FROM products ORDER BY RAND() LIMIT 6");
 while($pdata=mysqli_fetch_assoc($p)){
     
 
 
 
 
 ?>
    
                
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="instagram-item">
                        <img src="<?php echo $pdata['image']?>" alt="instagram" height="120" width="100">
                        <div class="instagram-overlay">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
              
              
               
              <?php }?>
            </div>
        </div>
    </div>
 
 
 
 
 
 
 
 <footer class="footer-area footer-2-area bg_cover" style="background-image: url(assets/images/footer-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget mt-30">
                        <div class="footer-title">
                            <img src="assets/images/shape/title-shape-3.png" alt="">
                            <h4 class="title">About  Foody</h4>
                        </div>
                        <div class="footer-about-info mt-30">
                            <p><?php echo $site_info;?></p>
                          
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget mt-30">
                        <div class="footer-title">
                            <img src="assets/images/shape/title-shape-3.png" alt="">
                            <h4 class="title">More Links</h4>
                        </div>
                        <style>
                            a:link {
  color: white;
  background-color: transparent;
  text-decoration: none;
}
                        </style>
                        <div class="footer-list mt-20">
                            <ul>
                              <a href="#">   <span>Privacy Policy</span><br></a><br>
                                <a href="#"><span>Terms and Conditions</span></a>
                                

                          
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget mt-30">
                        <div class="footer-title">
                            <img src="assets/images/shape/title-shape-3.png" alt="">
                            <h4 class="title">Follow-us On</h4>
                        </div>
                        <div class="footer-instagram mt-25">
                            <ul>
                                <li>
                                    <a href="#">
                                       <img src="https://www.topafricanews.com/wp-content/uploads/2020/12/ovfhUTMtA.jpg" height="60px" width="60px" alt="ins">
                                        <span class="instagram-overlay">
                                            <i class="fas fa-code"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                     <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/768px-Instagram_logo_2016.svg.png" height="60px" width="60px" alt="ins">
                                        <span class="instagram-overlay">
                                            <i class="fab fa-instagram"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="https://cdn.uconnectlabs.com/wp-content/uploads/sites/46/2019/04/GitHub-Mark.png" height="60px" width="60px" alt="ins">
                                        <span class="instagram-overlay">
                                            <i class="fab fa-github"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copyright d-block d-sm-flex justify-content-between align-items-center">
                        <p>© 2021 Made With ❤ By  <a> Partibha </a></p>
                        <a href="#"><img src="assets/images/payment.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    