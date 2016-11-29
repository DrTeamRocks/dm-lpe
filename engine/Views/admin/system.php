<?php
$settings = $data['settings'];
?>
<br/>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#template" role="tab">Template</a>
    </li>
</ul>

<button class="btn btn-block btn-lg btn-info margin-horizontal-10px save_template">
    Save
</button>

<!-- Tab panes -->
<div class="tab-content" style="padding-bottom: 0px;">

    <div class="tab-pane active" id="settings" role="tabpanel">
        <div class="row">
            <div class="col-sm-8">
                <div class="card dm-card">
                    <div class="card-header">
                        Section Title
                    </div>
                    <input class="card-body form-control" id="dm_title" value="<?php echo $settings['title']; ?>"/>
                </div>
            </div>
            <div class="col-sm-4 hidden-xs">
                Text in header title.
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="card dm-card">
                    <div class="card-header">
                        Styles
                    </div>
                        <textarea class="card-body form-control" style="min-height: 150px;"
                                  id="dm_styles"><?php echo $settings['styles']; ?></textarea>
                </div>
            </div>
            <div class="col-sm-4 hidden-xs">
                All required CSS libraries, one per line.
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="card dm-card">
                    <div class="card-header">Scripts</div>
                        <textarea class="card-body form-control" style="min-height: 150px;"
                                  id="dm_scripts"><?php echo $settings['scripts']; ?></textarea>
                </div>
            </div>
            <div class="col-sm-4 hidden-xs">
                All required JavaScripts, one per line.
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="card dm-card">
                    <div class="card-header">Description</div>
                        <textarea class="card-body form-control" style="min-height: 150px;"
                                  id="dm_description"><?php echo $settings['description']; ?></textarea>
                </div>
            </div>
            <div class="col-sm-4 hidden-xs">
                Meta description of the site, this description will be displayed on the search engine page (eg
                Google or other) helpful for SEO.
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="card dm-card">
                    <div class="card-header">Keywords</div>
                        <textarea class="card-body form-control" style="min-height: 150px;"
                                  id="dm_keywords"><?php echo $settings['keywords']; ?></textarea>
                </div>
            </div>
            <div class="col-sm-4 hidden-xs">
                Meta keywords, these keys are still used by some search engines, it is helpful for SEO
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="card dm-card">
                    <div class="card-header">Author</div>
                    <input class="card-body form-control" id="dm_author"
                           value="<?php echo $settings['author']; ?>"/>
                </div>
            </div>
            <div class="col-sm-4 hidden-xs">
                The text in the author field, optional.
            </div>
        </div>
    </div>
    <div class="tab-pane" id="template" role="tabpanel">
        <div class="row">
            <div class="col-sm-8">
                <div class="card dm-card">
                    <div class="card-header">Top HTML</div>
                        <textarea class="card-body form-control" id="dm_top" style="min-height: 350px;"
                                  style="min-height: 300px;"><?php echo $settings['top']; ?></textarea>
                </div>
            </div>
            <div class="col-sm-4 hidden-xs">
                Additional code in the page header.
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="card dm-card">
                    <div class="card-header">Bottom HTML</div>
                        <textarea class="card-body form-control" id="dm_bottom" style="min-height: 350px;"
                                  style="min-height: 300px;"><?php echo $settings['bottom']; ?></textarea>
                </div>
            </div>
            <div class="col-sm-4 hidden-xs">
                Additional code in the page footer.
            </div>
        </div>

    </div>
</div>

<button class="btn btn-block btn-lg btn-info save_template">
    Save
</button>
