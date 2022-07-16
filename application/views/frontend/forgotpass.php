<!--Start contact form area-->
<section class="contact-info-area">
    <h3 class="mb-5 ml-5 text-center">Reset Password</h3>
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-xl-8 col-lg-8 col-md- col-sm-12">
                <div class="contact-form" style=" border-radius:8px;">
                    <form class="default-form" action="<?=base_url()?>Home" method="post" width="100%" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6"><p style="text-align:center;color: black; margin-top:16px; font-size:20px;">Enter your New Password </p></div>

                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" name="reset_password" value="" placeholder="Enter Password " required="" style="padding-left:13px; width:85%;">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <input type="submit" value="submit" class="buttons">&nbsp;
                          </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>
