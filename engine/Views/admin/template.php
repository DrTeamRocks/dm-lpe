<?php
$settings = $data['settings'];
?>
<br/>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-danger">
            <div class="panel-heading">Title</div>
            <input class="panel-body form-control" id="dm_title" value="<?php echo $settings['title']; ?>"/>
        </div>
    </div>
    <div class="col-sm-6 hidden-xs">
        Text in header title.
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-warning">
            <div class="panel-heading">Styles</div>
            <textarea class="panel-body form-control" id="dm_styles"><?php echo $settings['styles']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-6 hidden-xs">
        All required CSS libraries, one per line.
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-warning">
            <div class="panel-heading">Scripts</div>
            <textarea class="panel-body form-control" id="dm_scripts"><?php echo $settings['scripts']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-6 hidden-xs">
        All required JavaScripts, one per line.
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">Description</div>
            <textarea class="panel-body form-control" id="dm_description"><?php echo $settings['description']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-6 hidden-xs">
        Meta description of the site, this description will be displayed on the search engine page (eg Google or other)
        helpful for SEO.
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">Keywords</div>
            <textarea class="panel-body form-control" id="dm_keywords"><?php echo $settings['keywords']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-6 hidden-xs">
        Meta keywords, these keys are still used by some search engines, it is helpful for SEO
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <button class="btn btn-block btn-lg btn-info" id="save_template" data-loading-text="In progress...">Save</button>
    </div>
</div>
