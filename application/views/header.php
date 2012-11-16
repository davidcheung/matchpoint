<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link rel="stylesheet" href="<?=base_url('asset/bootstrap/css/bootstrap.min.css')?>"> <!--bootstrap-responsive.min.css-->
<script type="text/javascript" src="<?=base_url('asset/bootstrap/js/bootstrap.min.js')?>"></script>



<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#">MatchPoint</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <?=ucfirst($username)?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="./profile/">Profile</a></li>
                <li><a href="#">Court</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
            <li><?php echo anchor('/auth/logout/', 'Logout'); ?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>