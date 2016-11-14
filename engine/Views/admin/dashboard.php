<?php
$sections = $data['sections'];
?>
<br/>

<button class="btn btn-info" id="section_add">Add section</button>

<br/><br/>

<div id="sections">

    <?php
    $i = 0;
    while ($i < count($sections)) {
        ?>
        <div class="panel panel-info s_panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo $sections[$i]->title ?>
                </div>
            </div>
            <div data-id="<?php echo $sections[$i]->id ?>" class="section_id" style="<?php if ($i != 0) echo 'display: none;'; ?>">
                <div class="panel-body">
                    <div class="row dm_input_list">
                        <div class="col-sm-3">
                            <input class="form-control dm_title" type="text" placeholder="Section Title"
                                   value="<?php echo $sections[$i]->title ?>"/>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control dm_id" type="text" placeholder="Section ID"
                                   value="<?php echo $sections[$i]->section_id ?>"/>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control dm_class" type="text" placeholder="Section Classes"
                                   value="<?php echo $sections[$i]->section_class ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <textarea class="form-control dm_textarea"
                                      placeholder="Section HTML"><?php echo $sections[$i]->content ?></textarea>
                        </div>
                        <div class="col-sm-4">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <td>Section Title</td>
                                    <td>"In Admin" section name</td>
                                </tr>
                                <tr>
                                    <td>Section ID</td>
                                    <td>HTML identificator</td>
                                </tr>
                                <tr>
                                    <td>Section Classes</td>
                                    <td>CSS classes of section</td>
                                </tr>
                            </table>
                            <button class="btn btn-info btn-block pull-right section_delete">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
                <button class="panel-footer btn btn-info btn-lg btn-block section_save"
                        data-loading-text="In progress...">
                    Save
                </button>
            </div>
        </div>
        <?php
        $i++;
    }
    ?>

</div>
