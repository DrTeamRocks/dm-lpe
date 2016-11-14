<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php echo $data['description']; ?>">
    <meta name="author" content="Paul Rykov <paul@drteam.rocks>">
    <link rel="icon" href="/files/img/favicon.png">

    <title><?php if (empty($data['title'])) echo SITETITLE; else echo $data['title'] . ' &mdash; ' . SITETITLE; ?></title>

    <!-- Vendor CSS -->
    <?php
    $i = '0';
    while ($i < count($data['styles_vendor'])) {
        echo '<link rel="stylesheet" href="/files/vendor/' . $data['styles_vendor'][$i] . '">' . "\n";
        $i++;
    }
    unset($i);
    ?>

    <!-- Site CSS -->
    <?php
    $i = '0';
    while ($i < count($data['styles'])) {
        echo '<link rel="stylesheet" href="/files/admin/css/' . $data['styles'][$i] . '">' . "\n";
        $i++;
    }
    unset($i);
    ?>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo DIR ?>admin"><?php echo SITETITLE ?></a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <li><a href="/admin/template">Template</a></li>
            <li><a href="/admin/settings">Settings</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Admin <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="/admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
    </div>
</nav>

<div class="container">
