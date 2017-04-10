<?php

print_r($data['error']);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="login">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title><?php echo $data['title']; ?></title>

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

<div class="container padding-top-10">
    <div class="login-wrapper">
        <div class="text-xs-center">
            <img src="<?php echo DIR ?>engine/files/img/logo-turquoise.png" style="height: 100px;"
                 class="margin-bottom-xs"/>
            <h4><?php echo $data['lng']->get('login_title') . ' ' . SITETITLE; ?></h4>
        </div>
        <form action="" method="post" class="login-form">
            <div class="login-inputs">
                <input name="username" type="text" class="form-control" placeholder="<?php echo $data['lng']->get('username'); ?>"/>
                <input name="password" type="password" class="form-control" placeholder="<?php echo $data['lng']->get('password'); ?>"/>
            </div>
            <button name="submit" type="submit" class="btn btn-lg bg-turquoise btn-block"><?php echo $data['lng']->get('login_button'); ?></button>
        </form>
    </div>
</div>

<!-- Vendor JS -->
<?php
$i = '0';
while ($i < count($data['scripts_vendor'])) {
    echo '<script type="text/javascript" src="/engine/files/vendor/' . $data['scripts_vendor'][$i] . '"></script>' . "\n";
    $i++;
}
unset($i);
?>

<!-- Site JS -->
<?php
$i = '0';
while ($i < count($data['scripts'])) {
    echo '<script type="text/javascript" src="/engine/files/js/' . $data['scripts'][$i] . '"></script>' . "\n";
    $i++;
}
unset($i);
?>

</body>
</html>
