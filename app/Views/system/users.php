<?php
$users = $data['users'];
$roles = $data['roles'];

foreach ($roles as $role) {
    $roles_html .= '<option value="' . $role->id . '">' . $role->name . '</option>';
}
?>
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
                    <div class="btn-group text-right">
                        <button class="btn btn-secondary dm-user-password" data-id="<?php echo $user->id; ?>"><i class="fa fa-cogs"></i></button>
                        <button class="btn btn-secondary dm-user-delete" data-id="<?php echo $user->id; ?>"><i
                                class="fa fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
