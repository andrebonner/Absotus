<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo isset($this->title) ? $this->title : $this->data['cfg']->title; ?></title>
        <link rel="icon" href="app/webroot/bootstrap/images/favicon.ico">
        <?php foreach ($this->css as $css) { ?>
            <link rel="stylesheet" href="<?php echo $this->data['cfg']->url . $css; ?>" type="text/css"/>
        <?php } ?>
    </head>
    <body>
        <div class="container">
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Change password</h3>
                        </div>
                        <div class="panel-body">
                            <form id="loginform" method="POST" action="<?php echo $this->data['cfg']->url; ?>account/changepassword" accept-charset="UTF-8" role="form">
                                <fieldset> 
                                    <?php if ($this->data['error']) { ?>
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <?php echo $this->data['error']; ?>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <input class="form-control" required placeholder="Current Password" name="oldpassword" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required placeholder="New Password" name="newpassword" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required placeholder="Retype Password" name="retypepassword" type="password" value="">
                                    </div>
                                    
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Change Password">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
        <!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
        <?php foreach ($this->js as $js) { ?>
            <script src="<?php echo $this->data['cfg']->url . $js; ?>" type="text/javascript" ></script>
        <?php } ?>
    </body>
</html>
