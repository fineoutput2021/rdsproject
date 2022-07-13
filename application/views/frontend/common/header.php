<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>RDS ASSOCIATION</title>

  <!-- responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- For IE -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- master stylesheet -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/style.css">
  <!-- Responsive stylesheet -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/responsive.css">
  <!-- Responsive stylesheet -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/fonts/flaticon/flaticon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?=base_url()?>assets/frontend/images/favicon/rds_favicon.png" sizes="32x32">
</head>
<style>
  .office-banner {
    background-color: #e2ddd8;
    font-family: "Arial";
    padding: 0.125em;
    font-size: 4em;
    text-align: center;
    white-space: nowrap;
    transform: rotate(-10deg);
    position: fixed;
    top: 40%;
    left: -5%;
    right: -5%;
    z-index: 100;
    margin-top: 0;
  }
 .btn-two:hover .a1 
 {
  display:block !important;
 } 
  
  @media (max-width: 991px)
  {
    .hide 
    {
      display: none !important;
    }
    .btn-two
    {
      padding: 20px 20px 0px 0px;
    }

    .fa-lock {
      display:block !important;
    }

    .lot {
      display:none !important;
    }
    .box1
    {
        display: none !important;
    }
  }
</style>

<body>
  <div class="boxed_wrapper">

    <!-- <div class="preloader"></div> -->
    <!--Start header style1 area-->
    <header class="header-style1-area logof">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="header-style1 ">
              <div class="header-style1-logo float-left">
                <a href="<?=base_url()?>">
                  <img src="<?=base_url()?>assets/frontend/images/logo.png" width="40%">
                </a>
              </div>
              <div class="headers1-header-right float-right logof">
                <div class="headers1-button">
                  <div class="icon">
                    <span class="icon-phone-call"></span>
                  </div>
                  <div class="text">
                    <span>Contact Number</span>
                    <h3 class="clr1">+91-9636327342
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </header>
    <!--End header style1 area-->

    <!--Start mainmenu area-->
    <section class="mainmenu-area stricky">
      <div class="container  p-0">
        <div class="row">
          <div class="col-xl-12">
            <div class="inner-content clearfix" style="    margin-left: -20px;
    padding-left: 50px;">
              <nav class="main-menu clearfix">
<!-- //=============== mobile navbar ================== -->
                <div class="navbar-header clearfix mobi1">
                  <div class="row">
                    <div class="col-2 pb-2">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="margin-top:-47px; margin-left:13px;">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>
                    <div class="col-6 pb-3 margin">
                      <a href="<?=base_url()?>">
                        <h3 class="text-white text-center" style="margin-top:-50px;"> <img src="<?=base_url()?>assets/frontend/images/logo.png" class="img-fluid"></h3>
                      </a>
                    </div>

                     <div class="mainmenu-right col-3 pb-5">
                      <!-- <div class="quote-button-box float-right btn" style="margin-top:2px">
                        <a class="btn-two userx" href="#myModal" data-toggle="modal" data-target="#myModal">&nbsp;<i class="fa fa-user" aria-hidden="true" style="font-size:30px;"></i></a>
                      </div> -->
                      <li class="dropdown"><a href="#" class="btn-two" data-toggle="collapse">&nbsp;<i class="fa fa-user" aria-hidden="true" style="font-size:30px;"></i></a>
                     <ul style="display:none;">
                        <li><a href="#">My Profile</a></li>
                        <li><a href="#">Log Out</a></li>
                      </ul></li>
                    </div>
                    
                    
                  </div>
                </div>
                <div class="navbar-collapse collapse clearfix">
                  <ul class="navigation clearfix" style="margin-left:20px;">
                    <li><a href="<?=base_url()?>">Home</a></li>
                    <li><a href="<?=base_url()?>Home/executive_council">EXECUTIVE COUNCIL </a></li>
                    <li class="dropdown"><a href="<?=base_url()?>Home/members">MEMBERS </a>
                    
                      <ul>
                        <li><a href="<?=base_url()?>Home/members">List of Officers</a></li>
                        <li><a href="<?=base_url()?>Home/search_members">Search Member</a></li>
                      </ul>
                    </li> 
                    <li class="dropdown"><a href="#">QUICK LINKS </a>
                      <ul>
                        <li><a href="<?=base_url()?>Home/letters_memorandum">Letters & Memorandum</a></li>
                        <li><a href="<?=base_url()?>Home/important_acts_and_rules">Important Acts & Rules</a></li>
                        <li><a href="<?=base_url()?>Home/important_website">Important Websites</a></li>
                      </ul>
                    </li>
                    <li><a href="<?=base_url()?>Home/magazines">RDS Magazine</a></li>
                    <li><a href="<?=base_url()?>Home/gallery">GALLERY</a></li>
                    <li><div class="outer-search-box" style="margin-right:0px;">
                            <div class="seach-toggle"><i class="fa fa-search"></i></div>
                            <ul class="search-box box1">
                                <li>
                                    <form method="get" action="<?=base_url()?>Home/search_member" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="search" name="string" value="">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div></li>
                     <li>
                     <?if(!empty($this->session->userdata('user_data'))){?>
              <div class="mainmenu-right">
                        <div class="quote-button-box float-right btn5">
                            <a class="btn-one" href="#myModal"  data-toggle="modal" data-target="#myModal">Member's Login &nbsp;<i class="fa fa-lock" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <?}else{?>
              <div class="quote-button-box btn lot">
                <a class="btn-one" href="#myModal" data-toggle="modal" data-target="#myModal" style="padding: 15px 18px 16px; margin-top:4px;">Login&nbsp;<i class="fa fa-lock" aria-hidden="true" style="display:none; color:white; font-size:25px;"></i></a>
              </div>
              <div class="quote-button-box btn  d-lg-none" style="margin-left:-40px;">
                <a class="btn-one" href="#myModal" data-toggle="modal" data-target="#myModal" style="padding: 5px 10px 10px; margin-top:4px;">Login&nbsp;</a>

                <!-- <i class="fa fa-lock" aria-hidden="true" style="display:none; color:white; font-size:25px; display:flex;"></i -->
              </div>
              <?}?>
              <li class="search-box d-lg-none">
                                    <form method="get" action="<?=base_url()?>Home/search_member" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <button type="submit" style="background:#ed6f36;margin-right:0px;"><i class="fa fa-search" style="color:white;"></i></button>
                                            <input type="search" name="string" value="" style="width:94%;position:absolute;">
                                            
                                        </div>
                                    </form>
                                </li>
                     </li>
                     <li class="dropdown hide"><a href="#" class="btn-two "style="padding:25px 0px 0px 0px">&nbsp;<i class="fa fa-user" aria-hidden="true" style="font-size:30px;"></i></a>
                     <ul style="margin-left: -80px;
    width: 150px;">
                      <li><a href="<?=base_url()?>Home/my_profile/<?=base64_encode($this->session->userdata('member_id'))?>">My Profile</a></li>
                        <li><a href="#">Log Out</a></li>
                        
                      </ul></li>  

                       <!-- <li class="search-box d-lg-none">
                                    <form method="get" action="<?=base_url()?>Home/search_member" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <button type="submit" style="background:#ed6f36;margin-right:20px;"><i class="fa fa-search" style="color:white;"></i></button>
                                            <input type="search" name="string" value="" style="width:80%;position:absolute;">
                                            
                                        </div>
                                    </form>
                                </li> -->
                     
                      
                  </ul>
                </div>
              </nav>
               <!-- <?if(!empty($this->session->userdata('user_data'))){?>
              <div class="mainmenu-right">
                        <div class="quote-button-box float-right btn5">
                            <a class="btn-one" href="#myModal"  data-toggle="modal" data-target="#myModal">Member's Login &nbsp;<i class="fa fa-lock" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <?}else{?>
              <div class="quote-button-box btn">
                <a class="btn-one" href="#myModal" data-toggle="modal" data-target="#myModal">Login&nbsp;</a>
                <a class="btn-two dropdown ">&nbsp;<i class="fa fa-user" aria-hidden="true"></i>   </a>
       
              </div>
              <?}?> -->
              
            </div>
          </div>
        </div>
    </section>
    <!--End mainmenu area-->

    <!-- Modal -->

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="margin-top:8rem">
          <div class="modal-header">
            <h3 class="">Login</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body ">
            <div class="contact-info-form1">
              <H4 class="text-center pt-2"> RDS ASSOCIATION</H4>
              <form id="contact-info-form" name="contact_info_form" class="default-form" action="<?=base_url()?>Home/login" method="post">
                <div class="input-box1 text-center mt-5">
                  <input type="text" name="email" value="" placeholder="Enter Email" required class="form-control">
                </div>
                <div class="input-box1 text-center mt-5">
                  <input type="password" name="password" value="" placeholder="Enter Password" required class="form-control">
                </div>
                <div class="input-box1 text-center mt-3 mb-5">
                  <button class="btn-one" type="submit">Log in</button>
                </div>
              </form>
                <div class="text-center"><span class="mt-3"><a href="#" data-target="#myModal1" data-toggle="modal" data-dismiss="modal" style="color:#ed6f36;">Forgot Password?</a></span>
                </div>

            </div>

          </div>

        </div>

      </div>
    </div>

    <!--====================================signup=============-->
    <div class="modal fade" id="myModal1" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="margin-top:8rem">
          <div class="modal-header">
            <h3 class="">Forgot Your Password</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body ">
            <div class="contact-info-form1">
              <H4 class="text-center pt-2"> RDS ASSOCIATION</H4>
              <form id="contact-info-form" name="contact_info_form" class="default-form" action="#" method="post">
                <div class="input-box1 text-center mt-5">
                  <input type="text" name="form_name" value="" placeholder="Enter Email" required class="form-control">
                </div>
                <div class="input-box1 text-center mt-3 mb-5">
                  <button class="btn-one" type="submit">Submit</button>
                </div>

              </form>
            </div>

          </div>

        </div>

      </div>
    </div>
    <? if(!empty($this->session->flashdata('smessage'))){ ?>
    <div class="alert alert-success alert-dismissible  in mt-5">
      <strong><? echo $this->session->flashdata('smessage'); ?></strong>
    </div>
    <? }
   if(!empty($this->session->flashdata('emessage'))){ ?>
    <div class="alert alert-danger alert-dismissible  in mt-5">
      <strong><? echo $this->session->flashdata('emessage'); ?></strong>
    </div>
    <? } ?>
