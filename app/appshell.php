<?php
$host = "http://".$_SERVER["HTTP_HOST"];
$seo = new title();
$render ='<!DOCTYPE html>
<html>

<head>
  <title>'.$seo->title.' | JamiaWorld</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/css/materialize.min.css">';
$render.= "<style>".file_get_contents("css/jw.min.css")."</style>";
$render.='
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="'.$host.'/images/fav/favicon.ico" />
    <link rel="apple-touch-icon" sizes="57x57" href="'.$host.'/images/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="'.$host.'/images/fav/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="'.$host.'/images/fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="'.$host.'/images/fav/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="'.$host.'/images/fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="'.$host.'/images/fav/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="'.$host.'/images/fav/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="'.$host.'/images/fav/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="'.$host.'/images/fav/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="'.$host.'/images/fav/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="'.$host.'/images/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="'.$host.'/images/fav/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="'.$host.'/images/fav/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="'.$host.'/images/fav/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body class="jw-basic">
  <!--
  -->
  <nav class="nav-extended z-depth-0 jw-basic">
    <ul id="menu" class="sidenav sidenav-fixed hover">
      <li>
        <div class="user-view jw-inverted">
          <a href="#!user"><img class="circle" src="'.$host.'/images/user.png" id="userDp"></a>
          <a href="#!name"><span class="white-text name" id="userName">LogIN</span></a>
          <a href="#!email"><span class="white-text email" id="userEmail">To Get Our Free Service</span></a>
        </div>
      </li>
      <li><a href="#!" id="loginGoogle"><i class="material-icons fab fa-google"></i>LogIN With Google</a></li>
      <li><a href="#!" id="loginFacebook"><i class="material-icons fab fa-facebook"></i>LogIN With Facebook</a></li>
      <li>
        <div class="divider"></div>
      </li>
      <li><a href="'.$host.'/course" id="navCourses">Study Material</a></li>
      <li><a href="'.$host.'/events" id="navEvents">Event Updates</a></li>
      <li><a href="'.$host.'/market" id="navMarket">Market</a></li>
      <li><a href="'.$host.'/news" id="navNews">News</a></li>
      <li><a href="'.$host.'/news" id="navNews">Creative Jamia</a></li>
      <li><a href="'.$host.'/clubs">Club Jamia</a></li>
      <li><a href="'.$host.'/allumi">Allumi Network</a></li>
      <li><a href="'.$host.'/about">About US</a></li>
    </ul>
  </nav>
  <!--
  -->
  <header class="jw-brand-bar col ">
    <div class="row valin-wrapper">
      <div class="col s1 m1 l1">
        <div class="center">
          <img src="'.$host.'/images/logo.JPG" alt="" class="circle jw-brand-img">
        </div>
      </div>
      <div class="col s10 m5 l6">
        <div class="center show-on-small center">
          <h1 class="jw-brand-logo" id="brandLogo"><a href="'.$host.'"><b>Jamia</b>World</h1></a>
        </div>
      </div>
      <div class="col s1 m1 l1 push-m5 hide-on-large-only">
        <a href="#" data-target="menu" class="sidenav-trigger jw-basic right jw-brand-logo"><i class="material-icons fa fa-angle-double-left" ></i></a>
      </div>
      <div class="col s12 m5 l5 jw-basic-text pull-m1">
          <div class="input-field" style="margin:0">
            <input type="text" id="mainSearch" class="autocomplete fa jw-basic" placeholder="&#xf002; Search your course">
          </div>
      </div>
    </div>
    <div class="fixed-action-btn" id="fab">
      <a class="btn-floating btn-large jw-inverted jw-inverted-hover" id="fab-btn">
            <i class="large material-icons fa fa-comment"></i>
          </a>
      <ul>
        <li><a class="btn-floating btn-large jw-inverted jw-inverted-hover" href="intent://send/+917836950052#Intent;scheme=smsto;package=com.whatsapp;action=android.intent.action.SENDTO;end"><i class="large material-icons fab fa-whatsapp"></i></a></li>
        <li><a class="btn-floating btn-large jw-inverted jw-inverted-hover" href="tel:+917836950052"><i class="large material-icons fa fa-phone"></i></a></li>
        <li><a class="btn-floating btn-large jw-inverted jw-inverted-hover" href="mailto: "><i class="large material-icons fa fa-envelope"></i></a></li>
      </ul>
    </div>
  </header>
  <!--
  -->
  <main class="main" id="main">
    <div class="center loader">
      <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-green-only">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="components hide">
      <div id="askLogin">
        <span>LogIN For Great Experience</span>
        <button class="btn-flat sidenav-trigger yellow-text" data-target="menu">LOGIN</button>
      </div>
      <form id="requestForm">
        <input id="r" type="text" value="i-love-u">
      </form>
    </div>
    <div class="nc">
    </div>
</div>
    <div class="container page-role">
    </div>
  </main>
  <footer class="jw-basic">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="">JamiaWorld</h5>
                <p class="grey-text text-darken-4">Site is under construction. If u have any trouble then contact us.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="'.$host.'/contact">Contact US</h5>
                <ul>
                  <li><a class="" href="intent://send/+917836950052#Intent;scheme=smsto;package=com.whatsapp;action=android.intent.action.SENDTO;end"><i class="fab fa-whatsapp"></i>&nbsp;Chat with us on Whatsapp. Clear all doubt about Jamia. +91 7836950052</a></li>
                  <li><a class="" href="tel: +917836950052"><i class="fa fa-phone"></i>&nbsp; You Can Directly Call US. We will Feel glad to help. +91 7836950052</a></li>
                  <li><a class="" href="tel: +917836950052"><i class="fa fa-envelope"></i>&nbsp;Mail us like convention</a></li>
                  <li><a class="" href="https://www.facebook.com/jamiaworld.in/"><i class="fab fa-facebook-f"></i>&nbsp; Follow us on Facebook</a></li>
                  <li><a class="" href="https://www.instagram.com/jamiaworld.in/"><i class="fab fa-instagram"></i>&nbsp; Follow us on Instagram</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright black">
            <div class="container white-text center">
              &copy; 2017-18 Aria16
            <a class="grey-text text-lighten-2 right" href="http://faisal-manzer.in">Know More</a>
            </div>
          </div>
        </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js"></script>
  <script type="text/javascript" src="'.$host.'/js/jw.min.js" async></script>
  <link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">

</body>

</html>';
echo mini($render);
?>
