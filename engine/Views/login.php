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

<div class="container">
    <div class="row margin-top-10">
        <div class="col-md-4 col-md-offset-4">

            <div class="text-center">
                <img src="http://placehold.it/350x150"/>
            </div>

            <h3 class="text-center">Sign in</h3>

            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" data-toggle="validator" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" placeholder="Username" name="username" type="text"
                                   autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" placeholder="Password" name="password" type="password" required>
                        </div>
                        <br/>
                        <!-- Change this to a button or input when using this as a form -->
                        <button class="btn btn-lg btn-success btn-block" name="submit" type="submit"
                                data-loading-text="In progress...">
                            Login
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Vendor JS -->
<?php
$i = '0';
while ($i < count($data['scripts_vendor'])) {
    echo '<script type="text/javascript" src="/files/vendor/' . $data['scripts_vendor'][$i] . '"></script>' . "\n";
    $i++;
}
unset($i);
?>

<!-- Site JS -->
<?php
$i = '0';
while ($i < count($data['scripts'])) {
    echo '<script type="text/javascript" src="/files/admin/js/' . $data['scripts'][$i] . '"></script>' . "\n";
    $i++;
}
unset($i);
?>

</body>
</html>
