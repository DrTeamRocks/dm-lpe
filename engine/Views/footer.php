</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-xs-center text-muted small">
                2016 <i class="fa fa-smile-o"></i> Powered by <a rel="nofollow" href="https://github.com/DrTeamRocks/dm-lpe">D&M LPE</a>
            </div>
        </div>
    </div>
</footer>

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
