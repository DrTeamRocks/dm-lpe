<?php
$sites = $data['sites'];
?>

<div class="modal fade" id="addSite" tabindex="-1" role="dialog" aria-labelledby="addSiteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form data-toggle="validator" role="form" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $data['lng']->get('add_site'); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" placeholder="Domain URL" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" placeholder="Domain Alias"/>
                    </div>
                </div>
                <div class="modal-footer bg-blue">
                    <button class="btn btn-secondary pull-left" name="submit"
                            type="submit"><?php echo $data['lng']->get('submit'); ?></button>
                    <button class="btn btn-secondary pull-right" type="button"
                            data-dismiss="modal"><?php echo $data['lng']->get('close'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">

    <div class="col-sm-8 margin-top-20px">
        <div class="list-group">
            <?php
            $i = 0;
            while ($i < count($sites)) {
                ?>
                <div class="list-group-item">
                    <h4 class="card-title">
                        <a target="_blank"
                           href="http://<?php echo $sites[$i]->url; ?>"><?php echo $sites[$i]->url; ?></a>
                        <div class="btn-group pull-right">
                            <a href="<?php echo DIR . 'site/html/' . $sites[$i]->id ?>" class="btn btn-secondary">
                                <i class="fa fa-code"></i>
                            </a>
                            <a href="<?php echo DIR . 'site/variables/' . $sites[$i]->id ?>" class="btn btn-secondary">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <a href="<?php echo DIR . 'site/settings/' . $sites[$i]->id ?>" class="btn btn-secondary">
                                <i class="fa fa-cogs"></i>
                            </a>
                        </div>
                    </h4>
                    <p class="card-text">
                        <a target="_blank" href="http://<?php echo $sites[$i]->alias; ?>">
                            <?php echo $sites[$i]->alias; ?>
                        </a>
                    </p>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>
    </div>

    <div class="col-sm-4 margin-top-20px">
        <div class="row">

            <div class="col-sm-6">
                <?php if ($data['userinfo']->is_admin) { ?>
                    <a class="card bg-green darken" href="/system/users" style="text-decoration: none;">
                        <div class="card-block text-white text-xs-center">
                            <i class="fa fa-users"></i><br/>
                            Accounts
                        </div>
                    </a>
                <?php } ?>
            </div>

        </div>
    </div>

</div>
