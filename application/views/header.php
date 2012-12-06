<!DOCTYPE HTML>
    <link rel="icon" href="<?=base_url('asset/images/tennis_ball.ico')?>" type="image/gif">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.1/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.1/css/bootstrap-responsive.min.css">
    <link href='http://fonts.googleapis.com/css?family=Snowburst+One' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="<?=base_url('asset/css/style.css')?>">

    <script type="text/javascript" src="<?=base_url('asset/jQuery-Easy-Pinned-Footer-master/jquery.ez-pinned-footer.js')?>"></script><!-- ez footer -->


    <script type="text/javascript">
    $(window).load(function() {
        $("#footer").pinFooter();
    });

    $(window).resize(function() {
        $("#footer").pinFooter();
    });
    </script>

    <div id="footer" >
      <div class="pull-right footer-text" >ITEC 4020 - Implementation</div>
    </div>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <?=anchor('welcome','MatchPoint', array( 'class'=> 'brand'))?>

      <div class="nav-collapse collapse pull-right">
        <ul class="nav">
          <li class="<?=( uri_string() == "welcome" ? "active" : "")?>"><?=anchor('welcome','Home')?></li>


           <li class="dropdown <?=( $this->uri->segment(1) == "matches" ? "active" : "")?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matches <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><?=anchor('matches/create','Create Match')?></li>
              
              <li><?=anchor('matches/history','Match History')?></li>
             
              
            </ul>
          </li>


          <li class="dropdown <?=( $this->uri->segment(1) == "courts" ? "active" : "")?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Courts <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><?=anchor('courts/find','Find a Court')?></li>
              <li><?=anchor('courts/create','Create a Court')?></li>
                          
              <li class="divider"></li>

              <li><?=anchor('bookings','Book a Court')?></li>
              <li><?=anchor('bookings/browse','View Bookings')?></li>
            </ul>
          </li>

          

          <li class="dropdown <?=( $this->uri->segment(1) == "profile" ? "active" : "")?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <?=ucfirst($username)?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><?=anchor('profile/view','View Profile')?></li>
              
              <li><?=anchor('profile/edit','Edit Profile')?></li>
              <li><?=anchor('profile/browse','Browse Players')?></li>
              <!-- <li><a href="#">Something else here</a></li> -->
              <li class="divider"></li>
              <li class="nav-header">Others</li>
              <li><a href="#">Report a Player</a></li>
              <!-- <li><a href="#">One more separated link</a></li> -->
              
            </ul>
          </li>

         



          <!-- <li>  <a href="#" class="navbar-link">Logged in as <?=ucfirst($username)?></a></li> -->
          <li><?php echo anchor('auth/logout/', 'Logout'); ?></li>

        </ul>

      </div><!--/.nav-collapse -->
      <p class="navbar-text pull-right">
            <span></span>
            &nbsp;&nbsp;&nbsp;
            
        </p>
    </div>
  </div>
</div>



<!-- this is in place because the header takes up 40pixels so content doesnt get blocked by header -->
<div style="clear:both;padding-top:40px;"></div>

