<?php
$sites = $data['sites'];
?>

<div class="row padding-top-30px">

    <?php
    $i = 0;
    while ($i < count($sites)) {
        ?>
        <div class="col-sm-12 col-md-6 col-lg-4 margin-bottom-20px">
            <div class="card" style="height: 100%;">
                <div class="card-header text-muted text-right">
                    <a href="<?php echo DIR . 'site/variables/' . $sites[$i]->id ?>" class="btn btn-secondary">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <?php if ($data['userinfo']->is_editor) { ?>
                        <a href="<?php echo DIR . 'site/html/' . $sites[$i]->id ?>" class="btn btn-secondary">
                            <i class="fa fa-code"></i>
                        </a>
                        <a href="<?php echo DIR . 'site/settings/' . $sites[$i]->id ?>"
                           class="btn btn-secondary">
                            <i class="fa fa-cogs"></i>
                        </a>
                    <?php } ?>
                </div>
                <div class="card-block">
                    <a target="_blank" class="card-subtitle mb-2" href="http://<?php echo $sites[$i]->url; ?>">
                        <i class="fa fa-fw fa-globe"></i> <?php echo $sites[$i]->url; ?>
                    </a>
                    <br/>
                    <?php if (!empty($sites[$i]->alias)) { ?>
                        <a target="_blank" class="card-subtitle mb-2" href="http://<?php echo $sites[$i]->alias; ?>">
                            <i class="fa fa-fw fa-external-link"></i> <?php echo $sites[$i]->alias; ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
        $i++;
    }
    ?>

</div>
