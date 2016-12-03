<?php
$settings = $data['settings'];
?>
<br/>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#settings"
           role="tab"><?php echo $data['lng']->get('system'); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#template"
           role="tab"><?php echo $data['lng']->get('template'); ?></a>
    </li>
</ul>

<button class="btn btn-block btn-lg btn-info margin-horizontal-10px save_template">
    <?php echo $data['lng']->get('save'); ?>
</button>

<!-- Tab panes -->
<div class="tab-content" style="padding-bottom: 0px;">

    <div class="tab-pane active" id="settings" role="tabpanel">
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
    </div>
    <div class="tab-pane" id="template" role="tabpanel">
        <div class="row">
            <div class="col-sm-8">
                <div class="card dm-card">
                    <div class="card-header">
                        <?php echo $data['lng']->get('system_top'); ?>
                    </div>
                    <textarea class="card-body form-control" id="dm_top" style="min-height: 350px;"
                              style="min-height: 300px;"><?php echo $settings['top']; ?></textarea>
                </div>
            </div>
            <div class="col-sm-4 hidden-xs">
                <?php echo $data['lng']->get('system_top_desc'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="card dm-card">
                    <div class="card-header">
                        <?php echo $data['lng']->get('system_bottom'); ?>
                    </div>
                        <textarea class="card-body form-control" id="dm_bottom" style="min-height: 350px;"
                                  style="min-height: 300px;"><?php echo $settings['bottom']; ?></textarea>
                </div>
            </div>
            <div class="col-sm-4 hidden-xs">
                <?php echo $data['lng']->get('system_bottom_desc'); ?>
            </div>
        </div>

    </div>
</div>

<button class="btn btn-block btn-lg btn-info save_template">
    <?php echo $data['lng']->get('save'); ?>
</button>
