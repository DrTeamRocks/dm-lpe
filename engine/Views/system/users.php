<?php
$users = $data['users'];
$roles = $data['roles'];

foreach ($roles as $role) {
    $roles_html .= '<option value="' . $role->id . '">' . $role->name . '</option>';
}
?>
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
                    <button type="submit" name="submit" class="btn btn-secondary pull-left">
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

<div class="margin-top-20px">
    <?php foreach ($users as $user) { ?>
        <div class="list-group-item" data-id="<?php echo $user->id; ?>">
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control dm-user-name" name="username" placeholder="Username"
                                   value="<?php echo $user->username; ?>"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control dm-user-email" name="email" placeholder="Email"
                                   value="<?php echo $user->email; ?>"/>
                        </div>
                        <div class="form-group">
                            <select class="form-control dm-user-role" name="id_role"
                                    data-id="<?php echo $user->id; ?>"
                                    data-default="<?php echo $user->id_role; ?>">
                                <?php echo $roles_html; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="btn-group pull-right">
                        <button class="btn btn-secondary dm-user-password" data-id="<?php echo $user->id; ?>"><i class="fa fa-cogs"></i></button>
                        <button class="btn btn-secondary dm-user-delete" data-id="<?php echo $user->id; ?>"><i
                                class="fa fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
