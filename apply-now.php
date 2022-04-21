<!DOCTYPE html>
<html>
<?php include'head.php'?>



<body>

<?php include 'nav.php'?>
<section class="apply form">
    

    <!-- apply_form_area -->
    <div class="onload-popup form-mockup">
    <div class="apply_form_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="apply.php" method="post"class="apply_form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="apply_info_text text-center">
                                    <h3>How much do you want?</h3>
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single_field">
                            <input type="text" name="name" class="form-control" maxlength="50" placeholder="Name" required="" title="Please Enter Your Name" value="">
                        <input type="email" name="email" class="form-control" maxlength="80" placeholder="E-mail">
                        <input type="text" name="number" class="form-control" placeholder="Phone" required="" pattern="[0-9]{10}" title="Please Enter 10 Digit Mobile Number" value="">
                        <input type="text" id="" name="city" maxlength="50" class="form-control" placeholder="Type Your City Name">
                        <input type="text" class="form-control" name="amount" title="Minimum amount be Rs 1 Lakh" placeholder="Required amount ( Above 1 Lakh )">
                        <select class="form-control" name="service">
                                <option value="Personal Loan">Personal Loan</option>
                                <option value="Business Loan">Business Loan</option>
                                <option value="Home Loan">Home Loan</option>
                                <option value="Car Loan">Car Loan</option>
                        </select><br>
                        <input type="submit" name="submit" class="site-btn" value="Submit Your Details  ">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--/ apply_form_area -->
   

   <?php include 'footer.php'?> 

</body>
</html>