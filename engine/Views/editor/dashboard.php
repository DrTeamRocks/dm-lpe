<?php
$sections = $data['sections'];
?>
<br/>

<div class="row">
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
                        <div class="col-xs-12">
                            <h5 class="text-xs-center">You can use variables like <code><%text%></code>, but dont forget fill this via client interface!</h5>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control dm_title bg-blue lighten" type="text" placeholder="<?php echo $data['lng']->get('section_title'); ?>"
                                   data-toggle="tooltip" title="<?php echo $data['lng']->get('section_title'); ?>"
                                   value="<?php echo $sections[$i]->title ?>"/>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control dm_id bg-blue-3 lighten" type="text" placeholder="<?php echo $data['lng']->get('section_id'); ?>"
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
