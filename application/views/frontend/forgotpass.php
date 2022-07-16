<!--Start contact form area-->
<section class="contact-info-area">
    <h3 class="mb-4 text-center"><b>Reset Password</b></h3>
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-xl-7 col-lg-7 col-md- col-sm-12">
                <div class="contact-form" style=" border-radius:8px;">
                    <form class="default-form" action="<?=base_url()?>Home/update_password/<?=$auth?>" method="post" width="100%" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12"><p style="text-align:center;color: black; margin-top:16px; font-size:15px;">Enter your New Password </p></div>

                            <div class="col-md-12">
                                <div class="input-box" style="text-align:-webkit-center">
                                    <input type="password" name="reset_password" class="form-control mt-3"  value="" placeholder="Enter Password " required="" style="width:50%;">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-5">
                            <input type="submit" value="submit" class="buttons">&nbsp;
                          </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>
