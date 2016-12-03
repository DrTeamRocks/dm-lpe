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
            <a class="navbar-brand" href="<?php echo DIR; ?>admin">
                D&M
                <img src="/engine/files/img/logo-turquoise-64.png" width="40" height="40"
                     class="d-inline-block align-top"/>
                Landing Page Engine
            </a>
            <ul class="nav navbar-nav navbar-dark pull-right">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo DIR; ?>">
                        <?php echo $data['lng']->get('landing_page'); ?>
                        <i class="fa fa-eye"></i>
                    </a>
                </li>
                <?php if ($data['userinfo']->is_admin || $data['userinfo']->is_editor) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">
                            <?php echo $data['lng']->get('add_section'); ?>
                            <i class="fa fa-plus"></i>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <?php echo $data['userinfo']->username; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                        <a class="dropdown-item" href="<?php echo DIR; ?>admin/profile">
                            <i class="fa fa-user fa-fw"></i>
                            <?php echo $data['lng']->get('profile'); ?>
                        </a>

                        <?php if ($data['userinfo']->is_admin) { ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo DIR; ?>admin/users">
                                <i class="fa fa-users fa-fw"></i>
                                <?php echo $data['lng']->get('users'); ?>
                            </a>
                            <a class="dropdown-item" href="<?php echo DIR; ?>admin/system">
                                <i class="fa fa-cog fa-fw"></i>
                                <?php echo $data['lng']->get('system'); ?>
                            </a>
                        <?php } ?>

                        <div class="dropdown-divider"></div>
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

<?php if ($data['userinfo']->is_admin || $data['userinfo']->is_editor) { ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-lg modal-dialog" role="document">
            <div class="modal-content">
                <form data-toggle="validator" role="form" method="post" action="<?php echo DIR ?>editor">
                    <input type="hidden" name="mode" value="new"/>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $data['lng']->get('add_section'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row dm-input-list">
                            <div class="col-sm-4">
                                <input class="form-control bg-blue lighten" name="title" type="text"
                                       placeholder="<?php echo $data['lng']->get('section_title'); ?>" value=""
                                       required/>
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control bg-blue-3 lighten" name="section_id" type="text"
                                       placeholder="<?php echo $data['lng']->get('section_id'); ?>"
                                       value=""/>
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control bg-blue-2 lighten" name="section_class" type="text"
                                       placeholder="<?php echo $data['lng']->get('section_classes'); ?>"
                                       value=""/>
                            </div>
                        </div>
                    <textarea class="form-control dm-textarea" name="content"
                              placeholder="<?php echo $data['lng']->get('section_html'); ?>"></textarea>
                    </div>
                    <div class="modal-footer bg-blue">
                        <button class="btn btn-secondary pull-left" name="submit"
                                type="submit"><?php echo $data['lng']->get('submit'); ?></button>
                        <button class="btn btn-secondary pull-right" type="button"
                                data-dismiss="modal"><?php echo $data['lng']->get('close'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<div class="container" id="main-container">
    <div class="margin-top-30px">
        <a class="btn btn-info" href="<?php echo DIR ?>admin">Admin</a>
        <a class="btn btn-info" href="<?php echo DIR ?>editor">Editor</a>
        <a class="btn btn-info" href="<?php echo DIR ?>user">User</a>
    </div>