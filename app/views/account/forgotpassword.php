<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Forgot Password</h3>
                </div>
                <div class="panel-body">
                    <form id="changepasswordform" method="POST" action="<?php echo $this->data['cfg']->url; ?>account/changepassword" accept-charset="UTF-8" role="form">
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
                                        <label for="email">Email Address</label>
                                        <input name="email" type="email" class="form-control" placeholder="name@absotus.com" required/>
                                    </div>
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Email Link" />
                                </fieldset>
                    </form>
                                        
                    </div>
            </div>
        </div>
    </div>
</div>