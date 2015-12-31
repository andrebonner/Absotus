
        <div class="container">
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please sign in</h3>
                        </div>
                        <div class="panel-body">
                            <form id="loginform" method="POST" action="" accept-charset="UTF-8" role="form">
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
                                        <input class="form-control" required placeholder="E-mail" id="email" name="email" type="email">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required placeholder="Password" id="password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                                        </label>
                                    </div>
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
