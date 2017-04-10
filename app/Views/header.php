<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php echo $data['description']; ?>">
    <meta name="author" content="Paul Rock <paul@drteam.rocks>">
    <link rel="icon" href="/engine/files/img/logo-turquoise-64.png">

    <title><?php if (empty($data['title'])) echo SITETITLE; else echo $data['title'] . ' &#8212; ' . SITETITLE; ?></title>

    <!-- Vendor CSS -->
    <?php
    $i = '0';
    while ($i < count($data['styles_vendor'])) {
        echo '<link rel="stylesheet" href="/engine/files/vendor/' . $data['styles_vendor'][$i] . '">' . "\n";
        $i++;
    }
    unset($i);
    ?>

    <!-- Site CSS -->
    <?php
    $i = '0';
    while ($i < count($data['styles'])) {
        echo '<link rel="stylesheet" href="/engine/files/css/' . $data['styles'][$i] . '">' . "\n";
        $i++;
    }
    unset($i);
    ?>
</head>

<body>

<nav class="navbar navbar-dark bg-blue">
    <div class="container">
        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-toggleable-md" id="navbarResponsive">
            <a class="navbar-brand" href="<?php echo DIR; ?>dashboard">
                D&M
                <img src="/engine/files/img/logo-turquoise-64.png" style="width: 38px; height: 38px;"
                     class="d-inline-block align-top"/>
                Landing Page Engine
            </a>
            <ul class="nav navbar-nav navbar-dark pull-right">
                <?php if ($data['add_section']) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#newSection">
                            <?php echo $data['lng']->get('add_section'); ?>
                            <i class="fa fa-plus"></i>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($data['add_user'] && $data['userinfo']->is_admin) { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#addUser">
                            <?php echo $data['lng']->get('user_add'); ?>
                            <i class="fa fa-user fa-fw"></i>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($data['add_site'] && $data['userinfo']->is_admin) { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#addSite">
                            <?php echo $data['lng']->get('add_site'); ?>
                            <i class="fa fa-globe fa-fw"></i>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($data['userinfo']->is_admin) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo DIR; ?>system/users">
                            <?php echo $data['lng']->get('users'); ?>
                            <i class="fa fa-users fa-fw"></i>
                        </a>
                    </li>
                <?php } ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <?php echo $data['userinfo']->username; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                        <a class="dropdown-item" href="<?php echo DIR; ?>profile">
                            <i class="fa fa-user fa-fw"></i>
                            <?php echo $data['lng']->get('profile'); ?>
                        </a>
                        <a class="dropdown-item" href="<?php echo DIR; ?>auth/logout">
                            <i class="fa fa-sign-out fa-fw"></i>
                            <?php echo $data['lng']->get('logout'); ?>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" id="main-container">
