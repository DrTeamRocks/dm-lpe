<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php echo $data['description']; ?>">
    <meta name="author" content="Paul Rock <paul@drteam.rocks>">
    <link rel="icon" href="/admin/img/logo-turquoise-64.png">

    <title><?php if (empty($data['title'])) echo SITETITLE; else echo $data['title'] . ' &#8212; ' . SITETITLE; ?></title>

    <!-- Vendor CSS -->
    <?php
    foreach ($data['styles_vendor'] as $style)
        echo '<link rel="stylesheet" href="/vendor/' . $style . '">' . "\n";
    ?>

    <!-- Site CSS -->
    <?php
    foreach ($data['styles'] as $style)
        echo '<link rel="stylesheet" href="/admin/css/' . $style . '">' . "\n";
    ?>
</head>

<body>
