<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="404">
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
<body class="dm-404">

    <div class="container text-xs-center">
        <h1>100 000 100</h1>
        <p>Oh, my digitzz!</p>
        <p>Human not found</p>
        <img src="/engine/files/img/robot.png" style="min-width: 200px; width: 25%;"/>
        <h2>Back to <a href="<?php echo DIR; ?>">Main Page</a></h2>
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
