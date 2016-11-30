<?php
$settings = $data['settings'];
?>
<br/>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-danger">
            <div class="panel-heading"><?php echo $data['lng']->get('system_title'); ?></div>
            <input class="panel-body form-control" id="dm_title" value="<?php echo $settings['title']; ?>"/>
        </div>
    </div>
    <div class="col-sm-6 hidden-xs">
        <?php echo $data['lng']->get('system_title_desc'); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-warning">
            <div class="panel-heading"><?php echo $data['lng']->get('system_styles'); ?></div>
            <textarea class="panel-body form-control" id="dm_styles"><?php echo $settings['styles']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-6 hidden-xs">
        <?php echo $data['lng']->get('system_styles'); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-warning">
            <div class="panel-heading"><?php echo $data['lng']->get('system_scripts'); ?></div>
            <textarea class="panel-body form-control" id="dm_scripts"><?php echo $settings['scripts']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-6 hidden-xs">
        <?php echo $data['lng']->get('system_styles'); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo $data['lng']->get('system_styles'); ?></div>
            <textarea class="panel-body form-control" id="dm_description"><?php echo $settings['description']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-6 hidden-xs">
        <?php echo $data['lng']->get('system_styles'); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo $data['lng']->get('system_keywords'); ?></div>
            <textarea class="panel-body form-control" id="dm_keywords"><?php echo $settings['keywords']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-6 hidden-xs">
        <?php echo $data['lng']->get('system_keywords_desc'); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo $data['lng']->get('system_author'); ?></div>
            <input class="panel-body form-control" id="dm_author" value="<?php echo $settings['author']; ?>"/>
        </div>
    </div>
    <div class="col-sm-6 hidden-xs">
        <?php echo $data['lng']->get('system_author_desc'); ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <button class="btn btn-block btn-lg btn-info" id="save_template"><?php echo $data['lng']->get('save'); ?></button>
    </div>
</div>
