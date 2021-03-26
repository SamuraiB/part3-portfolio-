<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php print @$this->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="app/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="app/css/jquery.miniColors.css" rel="stylesheet">
    <link href="app/css/app.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target=".subnav" data-offset="50">

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="#"><?php print @$this->title; ?></a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="#">Home</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        This panel is currently locked and cannot be accessed until you manually edit the <span class="label">site.settings.php</span> in your root folder and change <span class="label">"interface_locked" => "1"</span> to <span class="label">"interface_locked" => "0"</span> or remove the line altogether.
    </div>



</div> <!-- /container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="app/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>