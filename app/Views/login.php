<div class="container padding-top-10">
    <div class="login-wrapper">
        <div class="text-center">
            <img src="<?php echo DIR ?>admin/img/logo-turquoise.png" style="height: 100px;"
                 class="margin-bottom-xs"/>
            <h4><?php echo $data['lng']->get('login_title') . ' ' . SITETITLE; ?></h4>
        </div>
        <form action="" method="post" class="login-form">
            <div class="login-inputs">
                <input name="username" type="text" class="form-control"
                       placeholder="<?php echo $data['lng']->get('username'); ?>"/>
                <input name="password" type="password" class="form-control"
                       placeholder="<?php echo $data['lng']->get('password'); ?>"/>
            </div>
            <button name="submit" type="submit" class="btn btn-lg bg-turquoise btn-block text-muted">
                <?php echo $data['lng']->get('login_button'); ?>
            </button>
        </form>
    </div>
</div>
