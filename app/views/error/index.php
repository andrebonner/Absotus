<!DOCTYPE html>
<!--
Error Template
-->
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
	<div class="error-template">
		<h1><?php echo $this->title; ?></h1>
		<img alt="<?php echo $this->data['description']; ?>" src="<?php echo $this->data['cfg']->url;?>app/views/error/images/error.png"/>
		<hr/>
		<p class="lead">
			<?php echo $this->data['msg']; ?><br/>
		</p>
	</div>
</div><!-- /.container -->

    </body>
</html>
