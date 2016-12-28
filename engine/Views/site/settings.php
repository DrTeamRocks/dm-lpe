<?php
$settings = $data['settings'];
$site = $data['site'];
?>

<div class="margin-top-20px">
    <div class="card">
        <h4 class="card-header dm-card-header bg-blue lighten">
            <a target="_blank" href="http://<?php echo $site->url; ?>"><?php echo $site->url; ?></a>
            <?php if ($data['userinfo']->is_editor) { ?>
                <div class="btn-group pull-right">
                    <a href="<?php echo DIR . 'site/variables/' . $site->id ?>" class="btn btn-secondary">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <a href="<?php echo DIR . 'site/html/' . $site->id ?>" class="btn btn-secondary">
                        <i class="fa fa-code"></i>
                    </a>
                    <a href="<?php echo DIR . 'site/settings/' . $site->id ?>" class="btn btn-secondary">
                        <i class="fa fa-cogs"></i>
                    </a>
                </div>
            <?php } ?>
        </h4>
    </div>
</div>

<div class="row margin-top-20px">
    <div class="col-sm-8">
        <div class="card dm-card">
            <div class="card-header">
                <?php echo $data['lng']->get('system_url'); ?>
            </div>
            <input class="card-body form-control" id="dm_url" value="<?php echo $site->url; ?>"/>
        </div>
    </div>
    <div class="col-sm-4 hidden-xs">
        <?php echo $data['lng']->get('system_url_desc'); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="card dm-card">
            <div class="card-header">
                <?php echo $data['lng']->get('system_alias'); ?>
            </div>
            <input class="card-body form-control" id="dm_alias" value="<?php echo $site->alias; ?>"/>
        </div>
    </div>
    <div class="col-sm-4 hidden-xs">
        <?php echo $data['lng']->get('system_alias_desc'); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="card dm-card">
            <div class="card-header">
                <?php echo $data['lng']->get('system_title'); ?>
            </div>
            <input class="card-body form-control" id="dm_title" value="<?php echo $settings['title']; ?>"/>
        </div>
    </div>
    <div class="col-sm-4 hidden-xs">
        <?php echo $data['lng']->get('system_title_desc'); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="card dm-card">
            <div class="card-header">
                <?php echo $data['lng']->get('system_styles'); ?>
            </div>
                    <textarea class="card-body form-control" style="min-height: 150px;"
                              id="dm_styles"><?php echo $settings['styles']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-4 hidden-xs">
        <?php echo $data['lng']->get('system_styles_desc'); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="card dm-card">
            <div class="card-header">
                <?php echo $data['lng']->get('system_scripts'); ?>
            </div>
                    <textarea class="card-body form-control" style="min-height: 150px;"
                              id="dm_scripts"><?php echo $settings['scripts']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-4 hidden-xs">
        <?php echo $data['lng']->get('system_scripts_desc'); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="card dm-card">
            <div class="card-header">
                <?php echo $data['lng']->get('system_description'); ?>
            </div>
                    <textarea class="card-body form-control" style="min-height: 150px;"
                              id="dm_description"><?php echo $settings['description']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-4 hidden-xs">
        <?php echo $data['lng']->get('system_description_desc'); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="card dm-card">
            <div class="card-header">
                <?php echo $data['lng']->get('system_keywords'); ?>
            </div>
                    <textarea class="card-body form-control" style="min-height: 150px;"
                              id="dm_keywords"><?php echo $settings['keywords']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-4 hidden-xs">
        <?php echo $data['lng']->get('system_keywords_desc'); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="card dm-card">
            <div class="card-header">
                <?php echo $data['lng']->get('system_author'); ?>
            </div>
            <input class="card-body form-control" id="dm_author"
                   value="<?php echo $settings['author']; ?>"/>
        </div>
    </div>
    <div class="col-sm-4 hidden-xs">
        <?php echo $data['lng']->get('system_author'); ?>
    </div>
</div>

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
