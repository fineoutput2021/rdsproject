<!--Main Slider-->
<section class="main-slider">
  <div class="container-fluid p-0">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php $i=1; foreach ($slider_data->result() as $slider) { ?>
        <div class="carousel-item <?if ($i==1) {
    echo 'active';
}?>">
          <img class="d-block w-100" src="<?=base_url().$slider->image?>" alt="First slide">
        </div>
        <?php $i++; } ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>
<!--End Main Slider-->

<!-- birthday -->
<style>
  .card {
    /* position: absolute; */
    height: 420px;
    width: 100%;
    max-width: 850px;
    margin: auto;
    background-color: #ffffff;
    border-radius: 25px;
    box-shadow: 10px 0 50px rgba(0, 0, 0, 0.5);

  }

  .card .inner_part {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 0 0 30px;
    height: 350px;
    position: absolute;
  }

  @media (max-width: 530px) {
    .card .inner_part {
      display: flex;
      flex-direction: column !important;
      padding: 15px 15px 0 15px !important;
      align-items: center !important;
      justify-content: center !important;
      position: absolute !important;
      width: 100% !important;
      height: 422px !important;


    }
  }

  @media (max-width:530px) {
    .card {
      height: 540px !important;
    }
  }

  @media (max-width:530px) {
    .birthday {
      padding: 0px 40px !important;
    }
  }

  @media (max-width:412px) {
    .birthday {
      padding: 0px 70px !important;
    }
  }

  #slideImg:checked~.inner_part {
    padding: 0;
    transition: .1s ease-in;
  }

  .inner_part .img {
    height: 260px;
    width: 260px;
    overflow: hidden;
    flex-shrink: 0;
    border-radius: 20px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.2);
  }

  #slideImg:checked~.inner_part .img {
    height: 350px;
    width: 850px;
    z-index: 99;
    transition: .3s .2s ease-in;
  }

  .img img {
    height: 100%;
    width: 100%;
    cursor: pointer;
    opacity: 0;
    transition: .6s;
  }

  #slide_1:checked~.inner_part .img_1,
  #slide_2:checked~.inner_part .img_2,
  #slide_3:checked~.inner_part .img_3,
  #slide_4:checked~.inner_part .img_4,
  #slide_5:checked~.inner_part .img_5,
  #slide_6:checked~.inner_part .img_6,
  #slide_7:checked~.inner_part .img_7,
  #slide_8:checked~.inner_part .img_8,
  #slide_9:checked~.inner_part .img_9,
  #slide_10:checked~.inner_part .img_10
   {
    opacity: 1;
    transition-delay: .2s;
  }

  /* @media(max-width:530px){
.inner_part .slideImg .img_22
{
 opacity: 0.5 !important;
transition-delay: .2s;
}
} */

  .contents {
    padding: 0 20px 0 35px;
    width: 530px;
    margin-left: 50px;
    opacity: 0;
    transition: .6s;
    overflow: hidden;
  }

  #slideImg:checked~.inner_part .contents {
    display: none;
  }

  #slide_1:checked~.inner_part .content_1,
  #slide_2:checked~.inner_part .content_2,
  #slide_3:checked~.inner_part .content_3,
  #slide_4:checked~.inner_part .content_4,
  #slide_5:checked~.inner_part .content_5,
  #slide_6:checked~.inner_part .content_6,
  #slide_7:checked~.inner_part .content_7,
  #slide_8:checked~.inner_part .content_8,
  #slide_9:checked~.inner_part .content_9,
  #slide_10:checked~.inner_part .content_10
   {
    opacity: 1;
    margin-left: 0;
    z-index: 100;
    transition-delay: .3s;
  }

  .contents .title {
    font-size: 30px;
    font-weight: 700;
    color: #0d0925;
    margin: 0 0 20px 0;
    overflow: hidden;
  }

  .contents .text {
    font-size: 19px;
    color: #4e4a67;
    margin: 0 auto 30px auto;
    line-height: 1.5em;
    text-align: justify;
    overflow: hidden;
  }

  .contents button {
    padding: 15px 20px;
    border: none;
    font-size: 16px;
    color: #fff0e6;
    font-weight: 600;
    letter-spacing: 1px;
    border-radius: 50px;
    cursor: pointer;
    outline: none;
    background: #000000;
    float: right;
  }

  .contents button:hover {
    background: #cecece;
    color: #000000;
  }

  .slider {
    position: absolute;
    bottom: 25px;
    left: 55%;
    transform: translateX(-50%);
    z-index: 1;
  }

  #slideImg:checked~.slider {
    display: none;
  }

  .slider .slide {
    position: relative;
    height: 10px;
    width: 50px;
    background: #d9d9d9;
    border-radius: 5px;
    display: inline-flex;
    margin: 0 3px;
    cursor: pointer;
  }


  .slider .slide:before {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    height: 100%;
    width: -100%;
    background: #000000;
    ;
    border-radius: 10px;
    transform: scaleX(0);
    transition: transform .6s;
    transform-origin: left;
  }

  #slide_1:checked~.slider .slide_1:before,
  #slide_2:checked~.slider .slide_2:before,
  #slide_3:checked~.slider .slide_3:before,
  #slide_4:checked~.slider .slide_4:before,
  #slide_5:checked~.slider .slide_5:before,
  #slide_6:checked~.slider .slide_6:before,
  #slide_7:checked~.slider .slide_7:before,
  #slide_8:checked~.slider .slide_8:before,
  #slide_9:checked~.slider .slide_9:before,
  #slide_10:checked~.slider .slide_10:before
   {
    transform: scaleX(1);
    width: 100%;
  }

  input {
    display: none;
  }


  .site-logo {
    width: 218.33px !important;
    margin-right: 50px;
  }

  .btn {
    border-radius: 5px;
    font-weight: normal;
    font-size: 15px;
    letter-spacing: 0.02em;
    line-height: 12px;
    text-align: center;
    font-weight: 600;
    font-size: 14px;
    padding: 14px 30px;
    cursor: pointer;
  }

  .btn-theme {
    background: var(--theme-color1);
    color: #212121;
  }

  .c-container {
    margin: auto;
    width: 93%;
    position: relative;
    z-index: 1;
  }

  .btn-outline-white {
    color: #fff;
    background-color: rgba(255, 255, 255, 0.1);
    background-image: none;
    border-width: 2px;
    border-color: #fff;
    font-weight: 500;
    -webkit-transition: all .2s;
    transition: all .2s;
  }

  .btn {
    border-radius: 5px;
    font-weight: normal;
    font-size: 15px;
    letter-spacing: 0.02em;
    line-height: 12px;
    text-align: center;
    font-weight: 600;
    font-size: 14px;
    padding: 14px 30px;
    cursor: pointer;
  }

  .btn-outline-white:hover {
    background-color: #fff;
    color: var(--text-dark);
  }

  @media (max-width: 991px) {
    .contents {
      width: 394px !important;
    }
  }

  @media (max-width: 767px) {
    .contents {
      width: 294px !important;
      padding: 0px 0px !important;
    }
  }

  @media (max-width: 530px) {
    .contents {
      width: 430px !important;
      padding: 0px 0px !important;
    }
  }

  @media (max-width: 530px) {
    .shr {
      margin-top: 0px !important;
    }
  }

  /*  @media (max-width: 530px) {
 .slidex {
   display:none !important;
}
}

@media (max-width: 530px) {
 .slidey {
   display:block !important;
}
} */

  @media (max-width: 530px) {
    .img {
      width: 160px !important;
      height: 160px !important;
    }
  }

  @media (max-width: 530px) {
    .x {
      font-size: 30px !important;
      margin-top: 25px;
    }
  }

  @media (max-width: 530px) {
    .z {
      font-size: 15px !important;
    }
  }






  @media (min-width: 530px) and (max-width: 767px) {
    .img {
      width: 180px !important;
    }
  }




  :root {
    --balloon1-bg-color: #45e760e6;
    --balloon2-bg-color: #56c5e7e6;
    --balloon3-bg-color: #df8232e3;
    --balloon4-bg-color: #f3c441d6;
    --balloon5-bg-color: #45e760e6;
    --bg-color: #c0d6df;

    --balloon-anim-1: balloon1 15s ease infinite;
    --balloon-anim-2: balloon2 5s ease infinite;
    --balloon-anim-3: balloon3 10s ease infinite;
    --balloon-anim-4: balloon4 5s ease infinite;
    --balloon-anim-5: balloon5 15s ease infinite;
    --balloon-anim-6: balloon7 5s ease infinite;
  }

  .happy,
  .birthday {
    flex-direction: row;
    display: flex;
    justify-content: center;
  }

  .name {
    display: flex;
    justify-content: center;
    padding: 50px;
    font-size: 80px;
    color: #4f6d7a;
    font-family: "Comic Sans MS", Arial, Helvetica, sans-serif;
  }

  .balloon {
    width: 40px;
    height: 50px;
    margin: 5px;
    border-radius: 80%;
    position: relative;
  }

  .balloon::after {
    position: absolute;
    bottom: -16px;
    left: 15px;
    content: "\2713";
    transform: rotate(180deg);
    font-weight: bold;
    font-size: 16px;
  }

  .happy .balloon::before,
  .birthday .balloon::before {
    position: absolute;
    top: calc(50% - 15px);
    left: calc(50% - 10px);
    font-size: 22px;
    color: #4f6d7a;
    font-family: "Comic Sans MS", Arial, Helvetica, sans-serif;
  }

  .happy .balloon:nth-child(1)::before {
    content: "H";
  }

  .happy .balloon:nth-child(2)::before {
    content: "A";
  }

  .happy .balloon:nth-child(3)::before {
    content: "P";
  }

  .happy .balloon:nth-child(4)::before {
    content: "P";
  }

  .happy .balloon:nth-child(5)::before {
    content: "Y";
  }

  .birthday .balloon:nth-child(1)::before {
    content: "B";
  }

  .birthday .balloon:nth-child(2)::before {
    content: "I";
  }

  .birthday .balloon:nth-child(3)::before {
    content: "R";
  }

  .birthday .balloon:nth-child(4)::before {
    content: "T";
  }

  .birthday .balloon:nth-child(5)::before {
    content: "H";
  }

  .birthday .balloon:nth-child(6)::before {
    content: "D";
  }

  .birthday .balloon:nth-child(7)::before {
    content: "A";
  }

  .birthday .balloon:nth-child(8)::before {
    content: "Y";
  }

  @keyframes balloon1 {

    0%,
    100% {
      transform: translate(0, 0) rotate(-10deg);
    }

    50% {
      transform: translate(0, 30px) rotate(10deg);
    }
  }

  @keyframes balloon2 {

    0%,
    100% {
      transform: translate(0, 0) rotate(-10deg);
    }

    50% {
      transform: translate(0, 30px) rotate(10deg);
    }
  }

  @keyframes balloon3 {

    0%,
    100% {
      transform: translate(0, 0) rotate(-10deg);
    }

    50% {
      transform: translate(0, 30px) rotate(10deg);
    }
  }

  @keyframes balloon4 {

    0%,
    100% {
      transform: translate(0, 0) rotate(-10deg);
    }

    50% {
      transform: translate(0, 30px) rotate(10deg);
    }
  }

  @keyframes balloon5 {

    0%,
    100% {
      transform: translate(0, 0) rotate(-10deg);
    }

    50% {
      transform: translate(0, 30px) rotate(10deg);
    }
  }

  @keyframes balloon6 {

    0%,
    100% {
      transform: translate(-10px, 0) rotate(0deg);
    }

    50% {
      transform: translate(0, 20px) rotate(30deg);
    }
  }

  @keyframes balloon7 {

    0%,
    100% {
      transform: translate(-10px, 0) rotate(0deg);
    }

    50% {
      transform: translate(0, 20px) rotate(30deg);
    }
  }

  .balloon1 {
    background: var(--balloon1-bg-color);
    box-shadow: inset 10px 10px 10px #45e760e6;
  }

  .balloon1::after {
    color: var(--balloon1-bg-color);
  }

  .balloon2 {
    background: var(--balloon2-bg-color);
    box-shadow: inset 10px 10px 10px #56c5e7e6;
  }

  .balloon2::after {
    color: var(--balloon2-bg-color);
  }

  .balloon3 {
    background: var(--balloon3-bg-color);
    box-shadow: inset 10px 10px 10px #df8232e3;
  }

  .balloon3::after {
    color: var(--balloon3-bg-color);
  }

  .balloon4 {
    background: var(--balloon4-bg-color);
    box-shadow: inset 10px 10px 10px #f3c441d6;
  }

  .balloon4::after {
    color: var(--balloon4-bg-color);
  }

  .balloon5 {
    background: var(--balloon5-bg-color);
    box-shadow: inset 10px 10px 10px #45e760e6;
  }

  .balloon5::after {
    color: var(--balloon5-bg-color);
  }

  .balloon-anim1 {
    animation: var(--balloon-anim-1);
  }

  .balloon-anim2 {
    animation: var(--balloon-anim-2);
  }

  .balloon-anim3 {
    animation: var(--balloon-anim-3);
  }

  .balloon-anim4 {
    animation: var(--balloon-anim-4);
  }

  .balloon-anim5 {
    animation: var(--balloon-anim-5);
  }

  .balloon-anim6 {
    animation: var(--balloon-anim-6);
  }
  .inner_part {
    display: none;
  }
</style>


<?if($birthday_count){?>
<div class="container mt-5 mb-5 slidex">
  <div class="card ">
    <input type="checkbox" id="slideImg">
    <?php $i=1; foreach($birthday_data as $birthday) { ?>
    <input type="radio" name="select" id="slide_<?=$i?>" <?if($i==1){echo "checked";}?>>
    <div class="inner_part">
      <label for="slideImg" class="img ">
        <?if(!empty($birthday['image'])){?>
          <img class="img_<?=$i?> " src="<?=base_url().$birthday['image']?>" alt="Member Image">
        <?}else{?>
          <img class="img_<?=$i?> " src="<?=base_url()?>assets/frontend/images/user.png" alt="Member Image">
        <?}?>
      </label>
      <div class="contents content_<?=$i?>  text-center mySlides2">
        <div class="happy">
          <div class="balloon balloon1 balloon-anim1"></div>
          <div class="balloon balloon2 balloon-anim6"></div>
          <div class="balloon balloon3 balloon-anim3"></div>
          <div class="balloon balloon4 balloon-anim4"></div>
          <div class="balloon balloon5 balloon-anim5"></div>
        </div>
        <div class="birthday mt-3">
          <div class="balloon balloon3 balloon-anim6"></div>
          <div class="balloon balloon1 balloon-anim2"></div>
          <div class="balloon balloon4 balloon-anim1"></div>
          <div class="balloon balloon2 balloon-anim6"></div>
          <div class="balloon balloon1 balloon-anim4"></div>
          <div class="balloon balloon3 balloon-anim5"></div>
          <div class="balloon balloon2 balloon-anim1"></div>
          <div class="balloon balloon4 balloon-anim6"></div>
        </div>
        <div class="shr mt-5">
          <h2 class="x" style="    font-size: 45px;
    background: -webkit-linear-gradient(90deg, #eb946c 0%, #f36727 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;"><?=$birthday['name']?></h2>
          <p class="z mt-2" style="font-family: 'Dancing Script', cursive;">We Hope You Have A Wonderful Birthday ! <span>🎉</span></p>
        </div>
      </div>
    </div>

<?php $i++; } ?>
<div class="slider">
    <?php $a=1; foreach($birthday_data as $birthday) { ?>
  <label for="slide_<?=$a?>" class="slide slide_<?=$a?>"></label>
  <?$a++;}?>
</div>
  </div>
</div>
<?}?>

<!--
       <script>
       $(document).ready(function() {
       var i = 1;

       function myLoop() {
         setTimeout(function() {
           console.log('hi')
           for(var a=1; a>=i;a++){
             if(a==i){
        $("slide_"+i).attr("checked","true");
       }else{
         $("slide_"+i).attr("checked","false");

       }
       }  //  your code here
           i++;
           if (i < 4) {
             myLoop();
           }else{
             i=1;
             myLoop();
           }
         }, 2000)
       }

       myLoop();
       /* code here */ });
       </script> -->
<!-- <div>
  <iframe style="width: 1px; min-width: 100%;" scrolling="no" width="100%" height="500px" frameborder="0" sandbox="allow-scripts allow-forms allow-same-origin" src="birth.html" frameborder="0"></iframe>
</div> -->

<!--========================================kalam====================================-->

<div class="sec-title mt-5 pl-3 ">
  <div class="title text-center">
    <img src="<?=base_url()?>assets/frontend/images/feathers.png" class="mb-1" />
    <span>अध्यक्ष की कलम से</span>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-6 pb-2">
      <img src="<?=base_url()?>assets/frontend/images\adhyaksh.jpg" alt="Adhyaksh">
    </div>
    <div class="col-lg-6">
      <div class="content hideContent">
        <p class="" style="text-align: justify;color:black">प्रिय सम्मानित साथियों<br />
          नमस्कार सर्वप्रथम मुझे राजस्थान ग्रामीण विकास सेवा परिषद का अध्यक्ष चुनने के लिए मैं आप सभी का हृदयतल से आभार व्यक्त करता हूँ। हार्दिक आभार इसलिए भी क्योंकि आप सभी ने भरपूर स्नेह देकर पूरे विश्वास के साथ बिना किसी विरोध के परस्पर सहमति के
          साथ
          निर्विरोध व सर्वसम्मति से मुझे प्रदेश के ग्रामीण विकास में महती योगदान देने वाली सेवा के संगठन , राजस्थान ग्रामीण विकास सेवा परिषद का अध्यक्ष चयनित कर मुझमें अपना विश्वास दिखाया है।<br />
          जैसा कि आप सभी को विदित है कि हमारी सेवा अन्य सेवाओं की तुलना में अभी नई है। किंतु इतने छोटे से अंतराल में ही हम सभी ने प्रदेश में अपनी सेवा की और अपनी सेवा से पहचान बनाई है।नई नई सेवा होने के कारण हमारी सेवा में अभी कई विसंगतियां हैं
          जिन्हें
          मैं अपनी कार्यकारिणी के साथ निश्चित रूप से दूर करने का सार्थक प्रयास करूंगा । हमारा ये भी प्रयास रहेगा कि आपको अपने कार्यक्षेत्र में सेवा से समन्धित कोई समस्याएं आएं तो उनका यथाशीघ्र एवं तत्समय निराकरण किया जाए । समय समय पर कार्यकारिणी
          द्वारा
          अधिवेशनों - कार्यक्रमों का आयोजन किया जाएगा जिसमें आप सभी साथी अधिकारियों की शत - प्रतिशत उपस्थिति प्रार्थनीय रहेगी ताकि हम आपस में संवाद के माध्यम से जुड़े रहें। हमारा सर्वथा प्रयास रहेगा कि प्रत्येक साथी अधिकारी परिषद के पटल पर निःसंकोच
          अपनी
          बात, व्यथा अथवा पीड़ा रख सके ताकि यथासंभव अधिकारियों के साथ सार्थक संवाद कर उस समस्या का हल निकाला जाकर साथी अधिकारी को परितोष दिलवाया जा सके ।<br />
          हम सभी की परिषद का अध्यक्ष होने के नाते आप सब से मेरी ये गुज़ारिश रहेगी कि आप सब परिषद द्वारा आयोजित कार्यक्रमों, अधिवेशनों में बढ़ चढ़ कर भाग लें तथा हमें अपने नित नवीन विचारों से अवगत कराते हुए मार्गदर्शित भी करें। संगठन के सदस्यों का परस्पर
          एक दूसरे में विश्वास रखते हुए परिषद के विकास के लिए संगठित रहना अतिआवश्यक है। यही इस समय की महती आवश्यकता भी है। हम अपने संगठन को नई ऊंचाइयों पर ले जाने के लिए हमेशा प्रयासरत रहेंगे । आप सभी से संगठन के लिए बुलाये जाने पर हमेशा की तरह संगठन
          के साथ बने रहने, खड़े रहने की अपेक्षा रहेगी। हम ये भी प्रयास करेंगे कि योग्य अधिवक्ताओं का एक पैनल हमारे परिषद के बैनर तले तैयार किया जाए ताकि कानूनी मुद्दों पर विधिक राय ली जा सके।<br />
          परिषद के लेखा/ खातों की निष्पक्षता व पारदर्शिता बनाये रखने के लिए ऑडिटिंग के लिए रायशुमारी करवाई जा सकती है। नए चुनावों के साथ ही ग्रामीण विकास सेवा परिषद की नई वेबसाइट को सर्वथा नए कलेवर के साथ आप सबके समक्ष प्रस्तुत करते हुए मुझे बहुत
          हर्ष
          हो रहा है। आशा है इस वेबसाइट के माध्यम से हम महत्वपूर्ण मुद्दों पर अपनी राय बेहतर तरीके से रख पाएंगे।<br />
          अध्यक्ष होने के नाते मैं पुनः आप सभी साथी अधिकारियों को विश्वास दिलाता हूँ कि अपनी कार्यकारिणी के साथ आपके विश्वास पर पूरी तरह खरा उतरने का प्रयास करूंगा और इस संगठन रूपी परिवार को संगठन का मुखिया होने के नाते नवीन ऊंचाइयों पर ले जाने के
          सपने
          को नए पंख देने की दिशा में भरपूर प्रयास करूंगा ।<br />
        <p style="color:black">
          कहता है कौन लक्ष्य यूँ हासिल नहीं होता।<br /> दिल से अगर चाहो तो कुछ मुश्किल नहीं होता।<br /> बढ़ते रहो हर पल किनारों की तलाश में,गंगा का कोई एक ही साहिल नहीं होता।<br />
          इसी आशा और विश्वास को अपने हृदय में संजोए .....<br />
          सद्भावी<br />
          तारा चंद
        </p>
        </p>
      </div>
      <div class="show-more">
        <a href="javascript:void(0);" style="color:#f36727">Show more</a>
      </div>
    </div>
  </div>
</div>
<!--========================================kalam====================================-->

<!--=================================banner===================================-->
<div class="container-fluid mt-5 text-center">
  <img src="<?=base_url()?>assets/frontend/images\banner.jpg" alt="Banner" class="img-fluid">
</div>



<!--=======================================heading====================================-->
<div class=" text-center mt-5 mb-5" style="font-size:10px;">
  <h2>WELCOME TO THE OFFICIAL WEBSITE OF R.D.S. ASSOCIATION</h2>
</div>
<!---==========================================news===========================================-->

<!-- news -->
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-12">
      <div class="sec-title">
        <div class="title text-center"><span>LATEST NEWS</span></div>
      </div>
      <div style="border:1px solid #39345a; width:100%;height: auto;">
        <div class=" input-box text-right align-self-end" style="width: 100%; margin-left:0px; background-color:#39345a;"><a href="<?=base_url()?>Home/all_news"><button style="background-color:#ed6f36; padding:0px 10px;"
              class="text-white align-self-end bts">View
              All</button></a></div>
        <marquee onMouseOver="this.stop()" onMouseOut="this.start()" direction="up" scrollamount="3" diraction="up" style="width:100%;height:350px;">
          <?php $i=1; foreach ($news_data->result() as $news) { ?>
          <h5 style="text-align:center;" class="mt-3"><a href="<?=base_url().$news->file?>" target="_blank" rel="noreferrer" style="color:black;"><?=$news->news_heading?></a>
          </h5>
          <?php $i++; } ?>
        </marquee>
        <div class=" input-box text-right align-self-end" style="width: 100%; margin-left:0px; background-color:#39345a;">&nbsp;</div>
      </div>
    </div>
  </div>
</div>
<!-- news end -->
<div class="container">
  <div class="mt-5">
    <div class="row">
      <div class="col-xl-6">
        <div class="about-title">
          <div class="sec-title">
            <div class="title text-center"><span>RDS ASSOCIATION</span></div>
          </div>
          <p style="text-align: justify; color:black">RDS association members are dedicatedly working since last 12 years in rural areas of all over Rajasthan. RDS officers are working as block development officers for the holistic development of
            villages in the state , implementing all government schemes at the grassroot level. Officers have sincerely tried to transform the rural scenario by educating the Panchayat Samiti members to take the right decision with regard to the
            programmes to be pursued and managing the execution of all the initiatives related to the construction and planning of the blocks. RDS officers have presented a COMPLETE SOLUTION model as block development officers. Apart from being BDOs
            in blocks, RDS officers have performed well and proved their excellence in desk job also in various Headoffices .Contributing their best in welfare activities, RDS officers have played a pivotal role in overall development strategy of the
            state . The vision and mission of the RDS service is sustainable and inclusive growth of Rural Rajasthan through a multipronged strategy for eradicating poverty, increasing livelihood opportunities, social safety net , and promoting
            disadvantaged sections of society.
          </p>
        </div>
      </div>

      <div class="col-xl-6 pb-2" style="padding-top:80px;">
        <img src="<?=base_url()?>assets/frontend/images\about_us.jpg" alt="About Us" class="img-fluid">
      </div>
    </div>
  </div>

</div>
</section>
<!-- <hr style="height:2px;border-width:0;color:gray;background-color:gray">
 -->
<!--End about Area-->


<!--Start Featured project area-->
<section class="latest-project-area">
  <div class="container-fluid" style="overflow:hidden;">
    <div class="row">
      <div class="col-xl-12">
        <div class="sec-title clr-white">
          <div class="title text-center"><span>VIDEO STREAM</span></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-12">
        <div class="latest-project">
          <div class="latest-project-carousel owl-carousel owl-theme">
            <!--Start single featured project-->
            <?php $i=1; foreach ($video_data->result() as $video) { ?>
            <div class="single-project-style1">
              <div class="video-holder-box wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                <iframe width="100%" height="315" src="<?=$video->link?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
            <?php $i++; } ?>
            <!--End single featured project-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="input-box text-center pt-5">
    <a href="<?=base_url()?>Home/all_video"><button class="btn-one" type="submit">View All</button></a>
  </div>
</section>
<!--End Featured project area-->


<!--Start Call Us area-->
<section class="call-us-area">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="sec-title ">
          <div class="title text-center"><span>WRITE US!</span></div>
        </div>
      </div>
    </div>
    <div class="row col-12 lkt rev">
      <div class="col-xl-4 col-lg-5" rev>
        <div class="contact-info-box">
          <ul>
            <li>
              <div class="icon">
                <span class="icon-mobile-phone"></span>
              </div>
              <div class="title">
                <h3>Contact Number</h3>
                <span>+91-9636327342</span>
              </div>
            </li>
            <li>
              <div class="icon">
                <span class="icon-email"></span>
              </div>
              <div class="title">
                <h3>Send us an e-mail.</h3>
                <span>rdsrajasthan@gmail.com</span>
              </div>
            </li>
          </ul>
          <div class="find-map-box">
            <div class="icon">
              <span class="icon-location"></span>
            </div>
            <div class="text">
              <a class="btn-two" href="<?=base_url()?>Home/about_us">Find Us on Map<span class="icon-thin-right-arrow"></span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 col-lg-7">
        <div class="contact-form">
          <form name="contact_form" class="default-form" action="<?=base_url()?>Home/contact_form_submit" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="input-box">
                  <input type="text" name="name" value="" placeholder="First Name" required="">
                  <div class="icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-box">
                  <input type="text" name="last" value="" placeholder="Last Name" required="">
                  <div class="icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="input-box">
                  <input type="email" name="email" value="" placeholder="Email Address" required="">
                  <div class="icon">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-box">
                  <input type="text" name="phone" value="" maxlength="10" minlength="10" placeholder="Phone" onkeypress="return isNumberKey(event)">
                  <div class="icon">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="input-box">
                  <textarea name="message" placeholder="Your Message..." required=""></textarea>
                  <div class="icon">
                    <i class="fa fa-comment" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12" style="text-align: -webkit-center">
                <div class="button-box">
                  <button class="btn-one" type="submit" data-loading-text="Please wait..." style="width:40%; height: 50px;">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>
<!--End Call Us area-->
<script>
  $(".show-more a").on("click", function() {
    var $this = $(this);
    var $content = $this.parent().prev("div.content");
    var linkText = $this.text().toUpperCase();

    if (linkText === "SHOW MORE") {
      linkText = "Show less";
      $content.switchClass("hideContent", "showContent", 400);
    } else {
      linkText = "Show more";
      $content.switchClass("showContent", "hideContent", 400);
    };

    $this.text(linkText);
  });
</script>
