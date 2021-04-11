<!DOCTYPE html>
<html lang="en">
    <head> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
		<!-- Website Font style -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

<link href="css/reg.css" rel="stylesheet">
<link href="css/matchmaking.css" rel="stylesheet">
		<title>Preferences form</title>
        <script>
            $(function() {
        $('.material-card > .mc-btn-action').click(function () {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });
    });
        </script>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				
<section class="container">
    <div class="col-md-12" style="position:relative;">
       <div class="col-md-8" style="position:absolute;bottom:0;">
        <h1>Sakura</h1>
       </div>
       <div class="col-md-4" style="position:absolute;bottom:0; right: 0;">
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#">Matching</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Chatroom</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Controller/logout.php">Logout</a>
            </li>
          </ul> 
       </div>
    </div>
    <hr>
    <div class="row active-with-click">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <article class="material-card Blue-Grey">
                <h2>
                    <span>Tim Chan</span>
                    <strong>
                        <i class="fa fa-fw fa-magic"></i>
                        Common Preferences: xxx, ooo
                    </strong>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <img class="img-responsive" src="https://wpdmcdn.s3.amazonaws.com/me.jpg">
                    </div>
                    <div class="mc-description">
                        I am Tim. My favourite habit is .....
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <a href="#" class="fa fa-fw fa-thumbs-up"></a>
                    <a href="#"  class="fa fa-fw fa-thumbs-down"></a>

                </div>
            </article>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <article class="material-card Blue-Grey">
                <h2>
                    <span>Tim Chan</span>
                    <strong>
                        <i class="fa fa-fw fa-magic"></i>
                        Common Preferences: xxx, ooo
                    </strong>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <img class="img-responsive" src="https://wpdmcdn.s3.amazonaws.com/me.jpg">
                    </div>
                    <div class="mc-description">
                        I am Tim. My favourite habit is .....
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <a href="#" class="fa fa-fw fa-thumbs-up"></a>
                    <a href="#"  class="fa fa-fw fa-thumbs-down"></a>

                </div>
            </article>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <article class="material-card Blue-Grey">
                <h2>
                    <span>Tim Chan</span>
                    <strong>
                        <i class="fa fa-fw fa-magic"></i>
                        Common Preferences: xxx, ooo
                    </strong>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <img class="img-responsive" src="https://wpdmcdn.s3.amazonaws.com/me.jpg">
                    </div>
                    <div class="mc-description">
                        I am Tim. My favourite habit is .....
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <a href="#" class="fa fa-fw fa-thumbs-up"></a>
                    <a href="#"  class="fa fa-fw fa-thumbs-down"></a>

                </div>
            </article>
        </div>
        
    </div>
</section>
			</div>
		</div>
	</body>
</html>