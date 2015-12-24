
        <div class="container">
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Change password</h3>
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
                                        <input class="form-control" required placeholder="Current Password" id="oldpassword" name="oldpassword" type="password" value="">
                                    </div>
                                    <div class="form-group newpass">
                                        <input class="form-control" required placeholder="New Password" id="newpassword" name="newpassword" type="password" value="">
                                    </div>
                                    <div class="form-group retypepass">
                                        <input class="form-control" required placeholder="Retype Password" id="retypepassword" name="retypepassword" type="password" value="">
                                    </div>
                                    
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Change Password">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        