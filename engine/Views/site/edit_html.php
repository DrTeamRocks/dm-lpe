<?php
$sections = $data['sections'];
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

<div class="modal fade" id="newSection" tabindex="-1" role="dialog" aria-labelledby="newSectionLabel">
    <div class="modal-lg modal-dialog" role="document">
        <div class="modal-content">
            <form data-toggle="validator" role="form" method="post">
                <input type="hidden" name="mode" value="new"/>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $data['lng']->get('add_section'); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row dm-input-list">
                        <div class="col-sm-4">
                            <input class="form-control bg-blue lighten" name="title" type="text"
                                   placeholder="<?php echo $data['lng']->get('section_title'); ?>" value=""
                                   required/>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control bg-blue-3 lighten" name="section_id" type="text"
                                   placeholder="<?php echo $data['lng']->get('section_id'); ?>"
                                   value=""/>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control bg-blue-2 lighten" name="section_class" type="text"
                                   placeholder="<?php echo $data['lng']->get('section_classes'); ?>"
                                   value=""/>
                        </div>
                    </div>
                    <textarea class="form-control dm-textarea" name="content"
                              placeholder="<?php echo $data['lng']->get('section_html'); ?>"></textarea>
                </div>
                <div class="modal-footer bg-blue">
                    <button class="btn btn-secondary pull-left" name="submit"
                            type="submit"><?php echo $data['lng']->get('submit'); ?></button>
                    <button class="btn btn-secondary pull-right" type="button"
                            data-dismiss="modal"><?php echo $data['lng']->get('close'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (empty($sections)) { ?>
    <div class="margin-top-20px text-xs-center">
        <h3>We have no editable sections for this website, but you can create new</h3>
        <button class="btn btn-info bg-blue darken" data-toggle="modal" data-target="#newSection">
            <?php echo $data['lng']->get('add_section'); ?>
            <i class="fa fa-plus"></i>
        </button>
    </div>
<?php } else { ?>
    <div class="alert alert-success text-xs-center margin-top-20px" role="alert">
        You can use variables like <code><%text%></code>, but don't forget fill this via <i
            class="fa fa-pencil-square-o"></i> interface!
    </div>

    <div class="row margin-top-20px">

        <div class="col-xs-12 col-md-6 col-lg-3">
            <ul id="sections" class="list-group">
                <?php
                $i = 0;
                while ($i < count($sections)) {
                    $active = null;
                    if ($i == 0) $active = 'text-white bg-blue';
                    ?>
                    <li data-id="<?php echo $sections[$i]->id ?>" role="presentation"
                        class="list-group-item cursor-pointer dm-item section_id sortable <?php echo $active; ?>">
                        <?php echo $sections[$i]->title ?>
                    </li>
                    <?php
                    $i++;
                }
                ?>
            </ul>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-9">
            <?php
            $i = 0;
            while ($i < count($sections)) {
                $active = null;
                if ($i == 0) $active = 'active';
                ?>
                <div data-id="<?php echo $sections[$i]->id ?>"
                     class="card dm-content <?php echo $active; ?>">
                    <div class="card-block">
                        <div class="row dm-input-list">
                            <div class="col-sm-4">
                                <input class="form-control dm_title bg-blue lighten" type="text"
                                       placeholder="<?php echo $data['lng']->get('section_title'); ?>"
                                       data-toggle="tooltip" title="<?php echo $data['lng']->get('section_title'); ?>"
                                       value="<?php echo $sections[$i]->title ?>"/>
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control dm_id bg-blue-3 lighten" type="text"
                                       placeholder="<?php echo $data['lng']->get('section_id'); ?>"
                                       data-toggle="tooltip" title="<?php echo $data['lng']->get('section_id'); ?>"
                                       value="<?php echo $sections[$i]->section_id ?>"/>
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control dm_class bg-blue-2 lighten" type="text"
                                       placeholder="<?php echo $data['lng']->get('section_classes'); ?>"
                                       data-toggle="tooltip" title="<?php echo $data['lng']->get('section_classes'); ?>"
                                       value="<?php echo $sections[$i]->section_class ?>"/>
                            </div>
                        </div>
                    <textarea class="form-control dm-textarea"
                              placeholder="Section HTML"><?php echo $sections[$i]->content ?></textarea>
                    </div>
                    <div class="card-footer text-muted bg-blue">
                        <button class="btn btn-secondary section_save">
                            <?php echo $data['lng']->get('save'); ?>
                        </button>
                        <button class="btn btn-secondary text-danger pull-right section_delete">
                            <?php echo $data['lng']->get('delete'); ?>
                        </button>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>
    </div>
<?php } ?>
