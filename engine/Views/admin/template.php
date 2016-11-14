<?php
$settings = $data['settings'];
?>
<br/>

<div class="row">
    <div class="col-sm-8">
        <div class="panel panel-info">
            <div class="panel-heading">Top HTML</div>
            <textarea class="panel-body form-control" id="dm_top" style="min-height: 300px;"><?php echo $settings['top']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-4 hidden-xs">
        Additional code in the page header.
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="panel panel-info">
            <div class="panel-heading">Bottom HTML</div>
            <textarea class="panel-body form-control" id="dm_bottom" style="min-height: 300px;"><?php echo $settings['bottom']; ?></textarea>
        </div>
    </div>
    <div class="col-sm-4 hidden-xs">
        Additional code in the page footer.
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <button class="btn btn-block btn-lg btn-info" id="save_template" data-loading-text="In progress...">Save</button>
    </div>
</div>
