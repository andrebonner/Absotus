<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Send verification code</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="" role="form">
                        <input type="hidden" name="remember" value="true"/>
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
                                <label for="provider" >Select Two-Factor Authentication Provider:</label>
                                <select name="provider" class="form-control" required>
                                    <option value="phone">PhoneCode</option>
                                    <option value="email">EmailCode</option>
                                </select>
                            </div>
                            <input type="submit" value="Submit" class="btn btn-lg btn-success btn-block" />

                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
