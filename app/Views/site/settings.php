<?php
$settings = $data['settings'];
$site = $data['site'];
?>

<div class="margin-top-20px">
    <div class="card">
        <h4 class="card-header dm-card-header bg-blue lighten">
            <a target="_blank" href="http://<?php echo $site->url; ?>"><?php echo $site->url; ?></a>
            <?php if ($data['userinfo']->is_editor) { ?>
                <div class="pull-right">
                    <button class="btn btn-secondary favorite" data-id="<?php echo $site->id; ?>" data-fav="<?php echo $site->favorite; ?>">
                        <i class="fa fa-star"></i>
                    </button>
                    <div class="btn-group">
                        <a href="<?php echo DIR . 'site/variables/' . $site->id ?>" class="btn btn-secondary">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a href="<?php echo DIR . 'site/html/' . $site->id ?>" class="btn btn-secondary">
                            <i class="fa fa-code"></i>
                        </a>
                    </div>
                    <a href="<?php echo DIR . 'site/settings/' . $site->id ?>" class="btn btn-secondary">
                        <i class="fa fa-cogs"></i>
                    </a>
                </div>
            <?php } ?>
        </h4>
        <div class="card-block">
            <div class="form-group row">
                <label for="inputHorizontalSuccess"
                       class="col-sm-2 col-form-label"><?php echo $data['lng']->get('system_url'); ?></label>
                <div class="col-sm-10">
                    <input class="card-body form-control" id="dm_url" value="<?php echo $site->url; ?>"/>
                    <small class="form-text text-muted"><?php echo $data['lng']->get('system_url_desc'); ?></small>
                </div>
            </div>
            <div class="form-group row margin-top-20px">
                <label for="inputHorizontalSuccess"
                       class="col-sm-2 col-form-label"><?php echo $data['lng']->get('system_alias'); ?></label>
                <div class="col-sm-10">
                    <input class="card-body form-control" id="dm_alias" value="<?php echo $site->alias; ?>"/>
                    <small class="form-text text-muted"><?php echo $data['lng']->get('system_alias_desc'); ?></small>
                </div>
            </div>
            <div class="form-group row margin-top-20px">
                <label for="inputHorizontalSuccess"
                       class="col-sm-2 col-form-label"><?php echo $data['lng']->get('system_title'); ?></label>
                <div class="col-sm-10">
                    <input class="card-body form-control" id="dm_title" value="<?php echo $settings['title']; ?>"/>
                    <small class="form-text text-muted"><?php echo $data['lng']->get('system_title_desc'); ?></small>
                </div>
            </div>
            <div class="form-group row margin-top-20px">
                <label for="inputHorizontalSuccess"
                       class="col-sm-2 col-form-label"><?php echo $data['lng']->get('system_styles'); ?></label>
                <div class="col-sm-10">
                        <textarea class="card-body form-control" style="min-height: 150px;"
                                  id="dm_styles"><?php echo $settings['styles']; ?></textarea>
                    <small class="form-text text-muted"><?php echo $data['lng']->get('system_styles_desc'); ?></small>
                </div>
            </div>
            <div class="form-group row margin-top-20px">
                <label for="inputHorizontalSuccess"
                       class="col-sm-2 col-form-label"><?php echo $data['lng']->get('system_scripts'); ?></label>
                <div class="col-sm-10">
                        <textarea class="card-body form-control" style="min-height: 150px;"
                                  id="dm_scripts"><?php echo $settings['scripts']; ?></textarea>
                    <small class="form-text text-muted"><?php echo $data['lng']->get('system_scripts_desc'); ?></small>
                </div>
            </div>
            <div class="form-group row margin-top-20px">
                <label for="inputHorizontalSuccess"
                       class="col-sm-2 col-form-label"><?php echo $data['lng']->get('system_description'); ?></label>
                <div class="col-sm-10">
                        <textarea class="card-body form-control" style="min-height: 150px;"
                                  id="dm_description"><?php echo $settings['description']; ?></textarea>
                    <small class="form-text text-muted"><?php echo $data['lng']->get('system_description_desc'); ?></small>
                </div>
            </div>
            <div class="form-group row margin-top-20px">
                <label for="inputHorizontalSuccess"
                       class="col-sm-2 col-form-label"><?php echo $data['lng']->get('system_keywords'); ?></label>
                <div class="col-sm-10">
                        <textarea class="card-body form-control" style="min-height: 150px;"
                                  id="dm_keywords"><?php echo $settings['keywords']; ?></textarea>
                    <small class="form-text text-muted"><?php echo $data['lng']->get('system_keywords_desc'); ?></small>
                </div>
            </div>
            <div class="form-group row margin-top-20px">
                <label for="inputHorizontalSuccess"
                       class="col-sm-2 col-form-label"><?php echo $data['lng']->get('system_author'); ?></label>
                <div class="col-sm-10">
                    <input class="card-body form-control" id="dm_author"
                           value="<?php echo $settings['author']; ?>"/>
                    <small class="form-text text-muted"><?php echo $data['lng']->get('system_author'); ?></small>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-10">
                    <button class="btn btn-block btn-lg btn-info save_settings">
                        <?php echo $data['lng']->get('save'); ?>
                    </button>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-block btn-lg btn-danger delete_site disabled">
                        <?php echo $data['lng']->get('delete_site'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
