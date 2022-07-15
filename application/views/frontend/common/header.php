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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

  @media (max-width: 506px)
  {
    .btn-two 
    {
      padding:0px !important;
    }
  }

  @media (min-width: 386px) and (max-width:506px)
  {
    .btn-two 
    {
      padding:22px 0px !important;
    }
  }

  @media (max-width:767px)
  {
    .scc
    {
      width:92% !important;
    }
  }

  @media (min-width: 411px) and (max-width:550px)
  {
    .scc 
    {
      width:89% !important;
    }
  }

  
  @media (max-width: 400px)
  {
    .scc 
    {
      width:89% !important;
    }
  }
  @media (max-width: 767px)
  {
    .kgf 
    {
      margin-top:-55px !important;
    }
  }
  @media (max-width: 414px)
  {
    .kgf 
    {
      margin-top:-45px !important;
    }
  }
@media (max-width:580px) {
 .w3-border  {
    margin-left:-55px;
  }
}

@media (max-width:767px) {
 .w3-border  {
    margin-left:-27px;
  }
}

.w3-button{
  padding: 8px 8px !important;
}

.w3-border {
  
    border-bottom: 3px solid #f36727 !important;
    border-radius: 5px;
  
}

.w3-dropdown-content {
  background-color: none !important;
  border-radius: 6px !important;
}
@media (max-width:991px){
.outer-search-box {
  display:none !important;
}
}
</style>

<body>
  <div class="boxed_wrapper" style="overflow:none !important; min-height:none !important;">

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
            <div class="inner-content clearfix">
              <nav class="main-menu clearfix">
<!-- //=============== mobile navbar ================== -->
                <div class="navbar-header clearfix mobi1">
                  <div class="row">
                    <div class="col-2 pb-2">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="margin-top:-47px; margin-left:22px;">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>
                    <div class="col-6 pb-3 float-right" style="margin-left:20px;">
                      <a href="<?=base_url()?>">
                        <h3 class="text-white text-center kgf" style="margin-top:-65px;"> <img src="<?=base_url()?>assets/frontend/images/logo.png" class="img-fluid"></h3>
                      </a>
                    </div>
                     <div class="quote-button-box mainmenu-right col-3">
                     <?if(empty($this->session->userdata('member_data'))){?>
                      <div class="w3-dropdown-click" style="margin-top:15px">
    <button  class="w3-button w3-black" style="border-radius: 3px;" href="#myModal"  data-toggle="modal" data-target="#myModal" ><i class="fa fa-user" aria-hidden="true" style="font-size:30px;"></i></button>
  </div>
                      <?}else{?>
  <div class="w3-dropdown-click" id="user_btn" style="margin-top:15px">
    <button  class="w3-button w3-black" style="border-radius: 3px;"><i class="fa fa-user" aria-hidden="true" style="font-size:30px;"></i>&nbsp;<i class="fa fa-caret-down" style="font-size:20px;"></i></button>
    <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border" style="min-width:100px; background-color:none;">
      <a href="<?=base_url()?>Home/my_profile/<?=base64_encode($this->session->userdata('member_id'))?>" class="w3-bar-item w3-button">My Profile</a>
      <a href="<?=base_url()?>Home/logout" class="w3-bar-item w3-button">Log Out</a>
   
    </div>
  </div>
  <?}?>
  <script>



$( document ).ready(function() {
$("#user_btn").click(function(event){
  if($( "#Demo" ).hasClass( "w3-show" )){
    $('#Demo').removeClass( "w3-show" );
  }else{
    $("#Demo").addClass( "w3-show" );
  }
});
var ignoreClickOnMeElement = document.getElementById('user_btn');
document.addEventListener('click', function(event) {
    var isClickInsideElement = ignoreClickOnMeElement.contains(event.target);
    if (!isClickInsideElement) {
      $('#Demo').removeClass( "w3-show" );
    }
  });
  });
</script>
                    
                  </div>
                </div>
                </div>
                <div class="navbar-collapse collapse clearfix">
                  <ul class="navigation clearfix" style="margin-left:20px;">
                  <li class="search-box d-lg-none" style="z-index:-1;">
                                    <form method="get" action="<?=base_url()?>Home/search_member" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <button type="submit" style="background:#ed6f36;margin-right:0px;"><i class="fa fa-search" style="color:white;"></i></button>
                                            <input class="scc" type="search" placeholder="Search Member" name="string" value="" style="width:94%;position:relative;">
                                            
                                        </div>
                                    </form>
                                </li>
                    <li><a href="<?=base_url()?>">Home</a></li>
                    <li><a href="<?=base_url()?>Home/executive_council">EXECUTIVE COUNCIL </a></li>
                    <li class=""><a href="<?=base_url()?>Home/members">MEMBERS </a>
                    
                      <!-- <ul>
                        <li><a href="<?=base_url()?>Home/members">List of Officers</a></li>
                        <li><a href="<?=base_url()?>Home/search_members">Search Member</a></li>
                      </ul> -->
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
                                            <input type="search" name="string"  value=""  placeholder="Search Member">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div></li>
                     <li>
                     <?
                     if(empty($this->session->userdata('member_data'))){?>
              <div class="mainmenu-right">
                        <div class="quote-button-box float-right btn5">
                            <a class="btn-one d-flex" href="#myModal"  data-toggle="modal" data-target="#myModal" style="padding:10px 28px; margin-top:8px;">Login&nbsp;<i class="fa fa-lock" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <?}else{?>
              <div class="quote-button-box btn  d-lg-none" style="margin-left:-40px;">
              <li class="dropdown hide"><a href="#" class="btn-two "style="padding:31px 0px 0px 0px">&nbsp;<i class="fa fa-user" aria-hidden="true" style="font-size:20px;"></i>&nbsp;<i class="fa fa-caret-down" style="font-size:15px;"></i></a>
                     <ul style="margin-left: -80px;
    width: 150px;">
                      <li><a href="<?=base_url()?>Home/my_profile/<?=base64_encode($this->session->userdata('member_id'))?>">My Profile</a></li>
                        <li><a href="<?=base_url()?>Home/logout">Log Out</a></li>
                      </ul></li>  
              </div>
              <?}?>
                     </li>

                  </ul>
                </div>
              </nav>
            </div>
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
              <form name="contact_info_form" class="default-form" action="<?=base_url()?>Home/login" method="post">
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
