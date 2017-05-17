<nav class="navbar navbar-toggleable-md navbar-inverse bg-blue-2">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?php echo DIR; ?>dashboard">
            D&M
            <img src="<?php echo DIR ?>admin/img/logo-turquoise-64.png" style="width: 38px; height: 38px;"
                 class="d-inline-block align-top"/>
            Landing Page Engine
        </a>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav navbar-dark mr-auto">
            </ul>
            <ul class="navbar-nav navbar-dark">
                <?php if ($data['add_section']) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#newSection">
                            <?php echo $data['lng']->get('add_section'); ?>
                            <i class="fa fa-plus"></i>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($data['add_user'] && $data['userinfo']->is_admin) { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white" data-toggle="modal" data-target="#addUser">
                            <?php echo $data['lng']->get('user_add'); ?>
                            <i class="fa fa-user fa-fw"></i>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($data['add_site'] && $data['userinfo']->is_admin) { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white" data-toggle="modal" data-target="#addSite">
                            <?php echo $data['lng']->get('add_site'); ?>
                            <i class="fa fa-globe fa-fw"></i>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($data['userinfo']->is_admin) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo DIR; ?>system/users">
                            <?php echo $data['lng']->get('users'); ?>
                            <i class="fa fa-users fa-fw"></i>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" data-toggle="dropdown">
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

<section class="container" id="main-container">
