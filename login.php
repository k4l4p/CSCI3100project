<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/login.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
<title>Sakura</title>
    </head>
    <body>
        <div class="container login-container">
            <div class="row">
                <div class="col-xl-3">

                </div>
                <div class="col-xl-6">
                    <div class="panel-heading">
                        <div class="panel-title text-center">
                                <h1 class="title">Sakura</h1>
                                <hr />
                            </div>
                     </div> 
                  <div class="col-xl-12 login-form">
                    <form method="post" action="./Controller/login_process.php">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email *" value="" name="email"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" value="" name="password"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">

                            <a href="reg.php" class="Register" value="Login">Register</a>
                        </div>
                    </form>
                </div>  
                </div>
                
            </div>
        </div>
    </body>
</html>
