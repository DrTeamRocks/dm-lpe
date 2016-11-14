<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="Paul Rykov <paul@drteam.rocks>">
    <link rel="icon" href="/files/img/favicon.png">

    <title>Sign In &mdash; D&M Landing Page Engine</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/files/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/files/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/files/vendor/ubuntu-fontface/ubuntu.min.css">

    <!-- Site CSS -->
    <link rel="stylesheet" href="/files/admin/css/sb-admin-2.css">
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text"
                                       autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password"
                                       value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
