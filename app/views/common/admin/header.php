<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAGARPA</title>
    <link href="<?php echo asset("css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo asset("css/style.css"); ?>" rel="stylesheet">
    <script src="<?php echo asset("js/jquery-2.1.1.js"); ?>"></script>
</head>

<body class="admin">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sagarpa</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo route("/"); ?>">Home</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
<!--                <li><a href="../navbar/">Default</a></li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Usuario <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo route("/admin/profile"); ?>">Perfil</a></li>
<!--                        <li role="separator" class="divider"></li>-->
<!--                        <li class="dropdown-header">Perfil</li>-->
                        <li><a href="<?php echo route("/admin/change"); ?>">Cambiar contraseña</a></li>
                        <li><a href="<?php echo route("/logout"); ?>">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <?php echo render('common/admin/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="page-header"><?php echo $page_title ?></h2>
            <?php echo app()->flash->display(); ?>
