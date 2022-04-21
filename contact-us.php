<!DOCTYPE html>
<html>
<?php include'head.php'?>



<body>

<?php include 'nav.php'?>
 <div class="hero_area">
    <!-- header section strats -->
    

  
</div>
  <!-- about section -->

 
          <section class="contact-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="contact-one__content">
                            <div class="block-title">
                             
                             
                                <h2 class="title-block" style="margin-top:5%;">Ask for your query</h2>
                            </div>
                            <div class="contact-one__box">
                                

                                <div class="contact-one__box-content">
                                    <h4>Call Anytime</h4>
                                    <a href="tel:92 666 888 000">92 666 888 0000</a>
                                </div><!-- /.contact-one__box-content -->
                            </div><!-- /.contact-one__box -->
                            <div class="contact-one__box">
                               

                                <div class="contact-one__box-content">
                                    <h4>Write Email</h4>
                                    <a href="mailto:needhelp@company.com">needhelp@company.com</a>
                                </div><!-- /.contact-one__box-content -->
                            </div><!-- /.contact-one__box -->
                            <div class="contact-one__box">
                              

                                <div class="contact-one__box-content">
                                    <h4>Address</h4>
                                    <a href="#">80 Marktin Colvel, Broklyn, New York, USA</a>
                                </div><!-- /.contact-one__box-content -->
                            </div><!-- /.contact-one__box -->
                        </div><!-- /.contact-one__content -->
                    </div><!-- /.col-lg-5 -->
                    <div class="col-lg-7">       <!-- apply_form_area -->
<form action="apply.php" method="post"class="apply_forms">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="apply_info_text text-center">
                                    <h3>Submit Your Details</h3>
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single_field">
                            <input type="text" name="name" class="form-control" maxlength="50" placeholder="Name" required="" title="Please Enter Your Name" value="">
                        <!-- <input type="email" name="email" class="form-control" maxlength="80" placeholder="E-mail"> -->
                        <input type="text" name="number" class="form-control" placeholder="Phone" required="" pattern="[0-9]{10}" title="Please Enter 10 Digit Mobile Number" value="">
                        <input type="text" id="" name="city" maxlength="50" class="form-control" placeholder="Type Your City Name">
                        <input type="text" class="form-control" name="amount" title="Minimum amount be Rs 1 Lakh" placeholder="Required amount ( Above 1 Lakh )">
                        <select class="form-control" name="service">
                                <option value="Personal Loan">Personal Loan</option>
                                <option value="Business Loan">Business Loan</option>
                                <option value="Home Loan">Home Loan</option>
                                <option value="Car Loan">Car Loan</option>
                        </select><br>
                        <input type="submit" name="submit" class="site-btn" value="Submit   ">
                                </div>
                            </div>
                        </div>
                    </form>
    
    <!--/ apply_form_area -->
                    </div><!-- /.col-lg-7 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.contact-one -->
<?php include 'footer.php'?> 
</body>
</html>