<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Enter verification code</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="" role="form">
                        <input type="hidden" name="remember" value="true"/>
                        <input type="hidden" name="provider" value=""/>
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
                                <label for="code" >Code</label>
                                <input name="code" type="text" class="form-control" placeholder="Code" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="checkbox-inline" name="rememberBrowser" value="true" />
                                <label for="rememberBrowser">Remember this browser?</label>
                            </div>
                            <input type="submit" value="Submit" class="btn btn-lg btn-success btn-block" />
                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
