<?php
$sections = $data['sections'];
$site = $data['site'];
?>

<div class="margin-top-20px">
    <div class="card">
        <h4 class="card-header dm-card-header bg-blue lighten">
            <a target="_blank" href="http://<?php echo $site->url; ?>"><?php echo $site->url; ?></a>
            <div class="btn-group pull-right">
                <a href="<?php echo DIR . 'site/html/' . $site->id ?>" class="btn btn-secondary">
                    <i class="fa fa-code"></i>
                </a>
                <a href="<?php echo DIR . 'site/variables/' . $site->id ?>" class="btn btn-secondary">
                    <i class="fa fa-pencil-square-o"></i>
                </a>
                <a href="<?php echo DIR . 'site/settings/' . $site->id ?>" class="btn btn-secondary">
                    <i class="fa fa-cogs"></i>
                </a>
            </div>
        </h4>
    </div>
</div>

<?php if (empty($sections)) { ?>
    <div class="margin-top-20px text-xs-center">
        <h3>We have no editable sections for this website</h3>
    </div>
<?php } ?>

<div class="row margin-top-20px">
    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
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
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
        <?php
        $i = 0;
        while ($i < count($sections)) {
            $active = null;
            $matches = null;
            $variables = null;
            $variables_db = null;
            $variable_name = null;
            $variable_value = null;

            if ($i == 0) $active = 'active';

            // Parse the html
            $variables = preg_match_all('/&lt;\%(.*)\%&gt;/i', $sections[$i]->content, $matches);
            $variables_db = json_decode(htmlspecialchars_decode($sections[$i]->variables), true);
            ?>
            <div data-id="<?php echo $sections[$i]->id ?>"
                 class="card dm-content <?php echo $active; ?>">
                <div class="card-block">
                    <?php
                    // If we cant find the variables
                    if ($variables < 1) echo 'Non editable';

                    // Parse data in circle
                    for ($j = 0; $j < $variables; $j++) {
                        $variable_name = \System\Core\Helpers::cleaner($matches[1][$j], 'api');

                        // Hack with variables from database
                        if (!empty($variables_db[$j])) {
                            // Optional check, if variable from database equal current variable
                            if ($variables_db[$j]['name'] == $variable_name) {
                                // Set value from database to varible
                                $variable_value = $variables_db[$j]['value'];
                            } else {
                                $variable_value = null;
                            }
                        }

                        ?>
                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">
                                <?php echo $variable_name; ?>
                            </label>
                            <div class="col-xs-10">
                                <textarea class="form-control dm-variable" data-name="<?php echo $variable_name; ?>"><?php echo $variable_value; ?></textarea>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php if ($variables > 0) { ?>
                    <div class="card-footer text-muted bg-blue">
                        <button class="btn btn-secondary section_save">
                            <?php echo $data['lng']->get('save'); ?>
                        </button>
                    </div>
                <?php } ?>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
</div>
