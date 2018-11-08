<!DOCTYPE html>
<html lang="en">
    <head>
        <title>chat</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validation.js" ></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel-heading">
                        <h2 class="panel-title">Please sign in</h2>
                    </div>
                    <div class="panel-body">
                        <!-- msg if registration was a success  -->
                        <?php
                        if (!empty($success_msg)) {
                            ?>
                            <div class="alert alert-success">
                                <?php echo $success_msg; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <!-- if login failed-->
                        <?php
                        if (!empty($error_msg)) {
                            ?>
                            <div class="alert alert-danger">
                                <?php echo $error_msg; ?>
                            </div>
                            <?php
                        }
                        ?>

                        <form class="form-horizontal" id="loginform" action="<?php echo site_url() ?>/login/checklogin" method="post">
                            <div class="form-group"><!-- email  field -->
                                <input type="email" class="form-control" id="email" placeholder="Enter email" value="<?php
                                if (!empty($email)) {
                                    echo $email;
                                }
                                ?>" name="email">
                                
                                <div id="emailError" class="errorMsg"></div><!-- place holder  for error  -->
                            </div>
                            <div class="form-group">   <!-- password  field -->  
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                                <div id="pwdError" class="errorMsg"></div><!-- place holder  for error  -->
                            </div>
                            <div class="form-group">        
                                <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
                            </div>
                            <center><b>Not registered?</b> <br></b><a href="<?php echo base_url('register'); ?>">register here</a></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Bad Input!!!</h4>
                    </div>
                    <div class="modal-body" id="modeltxt"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

