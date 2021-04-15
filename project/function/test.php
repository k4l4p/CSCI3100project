
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script >

        $('.close').click(function(){
            alert("hello");
            var $target = $(this).parents('li');
            $target.hide('slow', function(){ $target.remove(); });

        })
    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12"><h3>Remove cards demo</h3></div>
    </div>
    <ul class="row list-unstyled">
        <li class="col-md-4">
            <div class="thumbnail"> <a class="close" href="#">×</a>

                <img src="//placehold.it/100" class="img-responsive">
                <h3>Thumbnail label</h3>

                <p>Thumbnail caption...</p>
            </div>
        </li>
        <li class="col-md-4">
            <div class="thumbnail"> <a class="close" href="#">×</a>

                <img src="//placehold.it/100" class="img-responsive">
                <h3>Thumbnail label</h3>

                <p>Thumbnail caption...</p>
            </div>
        </li>
        <li class="col-md-4">
            <div class="thumbnail"> <a class="close" href="#">×</a>

                <img src="//placehold.it/100" class="img-responsive">
                <h3>Thumbnail label</h3>

                <p>Thumbnail caption...</p>
            </div>
        </li>
        <li class="col-md-4">
            <div class="thumbnail"> <a class="close" href="#">×</a>

                <img src="//placehold.it/100" class="img-responsive">
                <h3>Thumbnail label</h3>

                <p>Thumbnail caption...</p>
            </div>
        </li>
        <li class="col-md-4">
            <div class="thumbnail"> <a class="close" href="#">×</a>

                <img src="//placehold.it/100" class="img-responsive">
                <h3>Thumbnail label</h3>

                <p>Thumbnail caption...</p>
            </div>
        </li>
        <li class="col-md-4">
            <div class="thumbnail"> <a class="close" href="#">×</a>

                <img src="//placehold.it/100" class="img-responsive">
                <h3>Thumbnail label</h3>

                <p>Thumbnail caption...</p>
            </div>
        </li>
        <li class="col-md-4">
            <div class="thumbnail"> <a class="close" href="#">×</a>

                <img src="//placehold.it/100" class="img-responsive">
                <h3>Thumbnail label</h3>

                <p>Thumbnail caption...</p>
            </div>
        </li>
        <li class="col-md-4">
            <div class="thumbnail"> <a class="close" href="#">×</a>

                <img src="//placehold.it/100" class="img-responsive">
                <h3>Thumbnail label</h3>

                <p>Thumbnail caption...</p>
            </div>
        </li>
        <li class="col-md-4">
            <div class="thumbnail"> <a class="close" href="#">×</a>

                <img src="//placehold.it/100" class="img-responsive">
                <h3>Thumbnail label</h3>

                <p>Thumbnail caption...</p>
            </div>
        </li>
    </ul>

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="..." class="rounded mr-2" alt="...">
            <strong class="mr-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>

</div>
</body>
</html>