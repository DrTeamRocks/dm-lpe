<?php
$sections = $data['sections'];
?>
<br/>

<button class="btn btn-info" id="section_add">Add section</button>

<br/><br/>

<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-4">
        <ul id="sections" class="nav nav-pills nav-stacked">
            <?php
            $i = 0;
            while ($i < count($sections)) {
                $active = null;
                if ($i == 0) $active = 'active';
                ?>
                <li data-id="<?php echo $sections[$i]->id ?>" role="presentation"
                    class="dm-item sortable <?php echo $active; ?>">
                    <a href="#">
                        <?php echo $sections[$i]->title ?>
                    </a>
                </li>
                <?php
                $i++;
            }
            ?>
        </ul>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-8">
        <?php
        $i = 0;
        while ($i < count($sections)) {
            $active = null;
            if ($i == 0) $active = 'active';
            ?>
            <div data-id="<?php echo $sections[$i]->id ?>"
                 class="panel panel-default s_panel section_id dm-content <?php echo $active; ?>">
                <div class="panel-body">
                    <div class="row dm-input-list">
                        <div class="col-sm-4">
                            <input class="form-control dm_title" type="text" placeholder="Section Title"
                                   value="<?php echo $sections[$i]->title ?>"/>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control dm_id" type="text" placeholder="Section ID"
                                   value="<?php echo $sections[$i]->section_id ?>"/>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control dm_class" type="text" placeholder="Section Classes"
                                   value="<?php echo $sections[$i]->section_class ?>"/>
                        </div>
                    </div>
                        <textarea class="form-control dm-textarea"
                                  placeholder="Section HTML"><?php echo $sections[$i]->content ?></textarea>

                </div>
                <div class="panel-footer">
                    <button class="btn btn-info section_save" data-loading-text="In progress...">
                        Save
                    </button>
                    <button class="btn btn-default pull-right section_delete">
                        Delete
                    </button>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
</div>
