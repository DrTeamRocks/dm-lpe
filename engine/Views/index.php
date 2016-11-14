<?php
$settings = $data['settings'];
$sections = $data['sections'];

$styles = preg_split("/\r\n|\n|\r/", $settings['styles']);
$scripts = preg_split("/\r\n|\n|\r/", $settings['scripts']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $settings['description']; ?>">
    <meta name="keywords" content="<?php echo $settings['keywords']; ?>">
    <meta name="author" content="<?php echo $settings['author']; ?>">

    <title><?php echo $settings['title']; ?></title>

    <!-- CSS -->
    <?php foreach ($styles as $style)
        echo "<link href='$style' rel='stylesheet'>\n"; ?>

</head>
<body id="page-top">

<?php echo htmlspecialchars_decode($settings['top']); ?>

<?php
foreach ($sections as $key => $value) {
    $id = $value->section_id;
    $class = $value->section_class;
    $html = htmlspecialchars_decode($value->content);
    ?>
    <section class='<?php echo $class; ?>' id='<?php echo $id; ?>'>
        <?php echo $html; ?>
    </section>
    <?php
}
?>

<?php echo htmlspecialchars_decode($settings['bottom']); ?>

<!-- JS -->
<?php foreach ($scripts as $script)
    echo "<script src='$script'></script>\n"; ?>

</body>
</html>
