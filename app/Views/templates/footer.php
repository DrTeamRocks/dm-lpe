<!-- Vendor JS -->
<?php
$i = '0';
while ($i < count($data['scripts_vendor'])) {
    echo '<script type="text/javascript" src="/vendor/' . $data['scripts_vendor'][$i] . '"></script>' . "\n";
    $i++;
}
unset($i);
?>

<!-- Site JS -->
<?php
$i = '0';
while ($i < count($data['scripts'])) {
    echo '<script type="text/javascript" src="/admin/js/' . $data['scripts'][$i] . '"></script>' . "\n";
    $i++;
}
unset($i);
?>

</body>
</html>
