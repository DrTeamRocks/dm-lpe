<?php
print_r($data);
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#expert" aria-controls="expert" role="tab" data-toggle="tab">Expert</a></li>
                <li role="presentation">
                    <a href="#standard" aria-controls="standard" role="tab" data-toggle="tab">Standard</a></li>
            </ul>
        </div>
    </div>
    <div class="row tab-pane active" role="tabpanel" id="expert">
        <div class="col-sm-6">
            <textarea class="form-control"></textarea>
        </div>
        <div class="col-sm-6">
            <label>
                <input class="form-control" type="text">
            </label>
        </div>
    </div>

</div>