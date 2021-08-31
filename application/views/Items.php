<!--Quote-->
           <div class="streak streak-lg streak-photo" style="background-image:url('https://il5.picdn.net/shutterstock/videos/4069075/thumb/1.jpg'); height:150px;" style="position:fixed">
                    <div class="flex-center white-text pattern-1">
                        <ul>
                            <li><h2 class="h2-responsive wow fadeIn">
                             <!--Text-->
                            </h2></li>
                            <li><h5 class="text-center font-italic wow fadeIn" data-wow-delay="0.2s"></h5></li>
                        </ul>
                    </div>
                </div>
            </div>
<!--Quote-->
<!--Grid-->
  <div class="container" style="padding-top:50px; padding-bottom:50px;">
                    <div class="row">

                        <!--First column-->
                        <div class="col-md-6">
                            <h4>Image</h4>
                            <hr>
                          	
                            <!--Image-->
                            <?php
							
								echo $prod_pic;
							
							?>
                            <!--Image-->
                            
                        </div>
                        <!--/.First column-->

                        <!--Second column-->
                        <div class="col-md-6">
                        
                            <!--Title-->
                            <?php
							
								echo $title_price;
							
							?>
                            <!--Price-->
                            
                            <!--Size-->
                            <select class="mdb-select">
                                <option value="" disabled selected>Choose your size</option>
                                <option value="1">20-30</option>
                                <option value="2">31-40</option>
                                <option value="3">41-50</option>
                            </select>
                            
                            
                            
                            <!--Buy and Cart-->
                            <button class="btn btn-default">Buy now</button>
                            <a class="btn-floating wishlist" data-toggle="tooltip" data-placement="bottom" title="Add to wishlist"><i class="fa fa-shopping-cart left"></i></a>

                            <hr>
                            
							<!--Description-->
                           	<?php
							
								echo $prod_desc;
							
							?>
                            <!--Description-->
                            
                            
                            <br>
                            <!--Social buttons-->
                            <p class="text-xs-center">Share with your friends!</p>
                            <ul class="inline-ul">
                                <li><a class="btn-floating btn-small btn-fb"><i class="fa fa-facebook"> </i></a></li>
                                <li><a class="btn-floating btn-small btn-tw"><i class="fa fa-twitter"> </i></a></li>
                                <li><a class="btn-floating btn-small btn-gplus"><i class="fa fa-google-plus"> </i></a></li>
                                <li><a class="btn-floating btn-small btn-li"><i class="fa fa-linkedin"> </i></a></li>
                                <li><a class="btn-floating btn-small btn-git"><i class="fa fa-github"> </i></a></li>
                                <li><a class="btn-floating btn-small btn-pin"><i class="fa fa-pinterest"> </i></a></li>
                                <li><a class="btn-floating btn-small btn-ins"><i class="fa fa-instagram"> </i></a></li>
                            </ul>


                        </div>
                        <!--/.Second column-->

                       
                    </div>
                </div>
<!--/.Grid-->

            