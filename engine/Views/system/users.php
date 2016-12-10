<?php
$users = $data['users'];
$roles = $data['roles'];

foreach ($roles as $role) {
    $roles_html .= '<option value="' . $role->id . '">' . $role->name . '</option>';
}
?>
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control"/>
                </div>
                <div class="form-group" style="margin-bottom: 0;">
                    <input type="text" class="form-control"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
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
                                    data-default="<?php echo $user->id_role; ?>">
                                <?php echo $roles_html; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-secondary pull-right" data-toggle="modal" data-target="#addUser"><i class="fa fa-cogs"></i></button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
