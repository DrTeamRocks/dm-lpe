<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php echo $data['description']; ?>">
    <meta name="author" content="Paul Rykov <paul@drteam.rocks>">
    <link rel="icon" href="/files/img/favicon.png">

    <title><?php if (empty($data['title'])) echo SITETITLE; else echo $data['title'] . ' &mdash; ' . SITETITLE; ?></title>

    <!-- Vendor CSS -->
    <?php
    $i = '0';
    while ($i < count($data['styles_vendor'])) {
        echo '<link rel="stylesheet" href="/files/vendor/' . $data['styles_vendor'][$i] . '">' . "\n";
        $i++;
    }
    unset($i);
    ?>

    <!-- Site CSS -->
    <?php
    $i = '0';
    while ($i < count($data['styles'])) {
        echo '<link rel="stylesheet" href="/files/admin/css/' . $data['styles'][$i] . '">' . "\n";
        $i++;
    }
    unset($i);
    ?>
</head>

<body>

<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <div class="row">
            <div class="col-sm-5">
                <ul class="nav navbar-nav navbar-right">
                    <!--id="section_add"-->
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i> Add section
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-2">
                <a class="navbar-brand" href="<?php echo DIR; ?>admin"><img src="//placehold.it/160x80&amp;text=logo"/></a>
            </div>
            <div class="col-sm-5">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="<?php echo DIR; ?>admin/system">System <i class="fa fa-cogs"></i></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Admin <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="<?php echo DIR; ?>auth/logout">
                                    <i class="fa fa-sign-out fa-fw"></i> Logout
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
            </div>
        </div>
    </div><!-- /.navbar-collapse -->
</nav>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form data-toggle="validator" role="form" method="post" action="<?php echo DIR ?>admin">
                <input type="hidden" name="mode" value="new"/>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create new section</h4>
                </div>
                <div class="modal-body">
                    <div class="row dm-input-list">
                        <div class="col-sm-4">
                            <input class="form-control" name="title" type="text" placeholder="Section Title" value=""
                                   required/>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" name="section_id" type="text" placeholder="Section ID"
                                   value=""/>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" name="section_class" type="text" placeholder="Section Classes"
                                   value=""/>
                        </div>
                    </div>
                    <textarea class="form-control dm-textarea" name="content" placeholder="Section HTML"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-info" name="submit" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container" id="main-container">
