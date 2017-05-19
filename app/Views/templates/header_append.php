<nav class="navbar navbar-toggleable-md navbar-inverse bg-blue-2">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?php echo DIR; ?>site">
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

                <?php if ($data['userinfo']->is_admin) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" data-toggle="dropdown">
                            <?php echo $data['lng']->get('sites'); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                            <a class="dropdown-item" href="<?php echo DIR; ?>site">
                                <i class="fa fa-user fa-fw"></i>
                                <?php echo $data['lng']->get('all_sites'); ?>
                            </a>
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#addSite">
                                <i class="fa fa-sign-out fa-fw"></i>
                                <?php echo $data['lng']->get('add_site'); ?>
                            </a>
                        </div>
                    </li>
                <?php } ?>

                <?php if ($data['userinfo']->is_admin) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" data-toggle="dropdown">
                            <?php echo $data['lng']->get('users'); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                            <a class="dropdown-item" href="<?php echo DIR; ?>system/users">
                                <i class="fa fa-user fa-fw"></i>
                                <?php echo $data['lng']->get('all_users'); ?>
                            </a>
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#addUser">
                                <i class="fa fa-sign-out fa-fw"></i>
                                <?php echo $data['lng']->get('add_user'); ?>
                            </a>
                        </div>
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

<div class="modal fade" id="addSite" tabindex="-1" role="dialog" aria-labelledby="addSiteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form data-toggle="validator" role="form" method="post">
            <input type="hidden" name="mode" value="add"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $data['lng']->get('add_site'); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" placeholder="Domain URL" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="alias" placeholder="Domain Alias"/>
                    </div>
                </div>
                <div class="modal-footer bg-blue">
                    <button class="btn btn-secondary pull-left" name="submit"
                            type="submit"><?php echo $data['lng']->get('submit'); ?></button>
                    <button class="btn btn-secondary pull-right" type="button"
                            data-dismiss="modal"><?php echo $data['lng']->get('close'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <input type="hidden" id="user_id" value=""/>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addUserLabel"><?php echo $data['lng']->get('user_delete'); ?></h4>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary"
                        id="delete_user"><?php echo $data['lng']->get('delete'); ?></button>
                <button type="button" data-dismiss="modal"
                        class="btn"><?php echo $data['lng']->get('chancel'); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="passUser" tabindex="-1" role="dialog" aria-labelledby="passUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <input type="hidden" id="user_pass_id" value=""/>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="passUserLabel"><?php echo $data['lng']->get('user_change_password'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="password" class="form-control" name="password"
                           data-minlength="6" data-minlength-error="Minimum of 6 characters" required
                           placeholder="<?php echo $data['lng']->get('password'); ?>"/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password_again"
                           required data-match="[name=password]" data-match-error="Passwords don't match"
                           placeholder="<?php echo $data['lng']->get('password_again'); ?>"/>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary"
                        id="delete_user"><?php echo $data['lng']->get('save'); ?></button>
                <button type="button" data-dismiss="modal"
                        class="btn"><?php echo $data['lng']->get('chancel'); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form data-toggle="validator" role="form" method="post">
            <input type="hidden" name="mode" value="add"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $data['lng']->get('user_add'); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" required
                               placeholder="<?php echo $data['lng']->get('username'); ?>"/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" required
                               placeholder="<?php echo $data['lng']->get('email'); ?>"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password"
                               data-minlength="6" data-minlength-error="Minimum of 6 characters" required
                               placeholder="<?php echo $data['lng']->get('password'); ?>"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password_again"
                               required data-match="[name=password]" data-match-error="Passwords don't match"
                               placeholder="<?php echo $data['lng']->get('password_again'); ?>"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-secondary">
                        <?php echo $data['lng']->get('submit'); ?>
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <?php echo $data['lng']->get('close'); ?>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<section class="container" id="main-container">
