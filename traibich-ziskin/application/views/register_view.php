<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>chat</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validation.js" ></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
    </head>
    <body>    
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel-heading">
                        <h2 class="panel-title">Registration</h2>
                    </div>
                    <div class="panel-body">
                        <!--error msg in case email is in DB-->
                        <?php
                        if (!empty($error_msg)) {
                            ?>
                            <div class="alert alert-danger">
                                <?php echo $error_msg; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <!-- msg if any field is empty -->
                        <?php
                        if (!empty($empty_error_msg)) {
                            ?>
                            <div class="alert alert-danger">
                                <?php echo $empty_error_msg; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <form id="registerform" role="form" method="post" action="<?php echo base_url('register/register_user'); ?>">
                            <fieldset>
                                <!-- name field -->
                                <div class="form-group <?php
                                if (!empty($empty_error_msg)) {
                                    echo "has-error";
                                }
                                ?>"> 
                                    <input id="name" class="form-control" placeholder="Name" name="user_name" type="text" value="<?php
                                    if (!empty($name)) {
                                        echo $name;
                                    }
                                    ?>" autofocus>
                                    <div id="nameError" class="errorMsg"></div><!-- place holder  for error  -->
                                </div>
                                <!-- email field -->
                                <div class="form-group <?php
                                if (!empty($empty_error_msg) || !empty($error_msg)) {
                                    echo "has-error";
                                }
                                ?>">
                                    <input id="email" class="form-control" placeholder="E-mail" name="user_email" value="<?php
                                    if (!empty($email)) {
                                        echo $email;
                                    }
                                    ?>" type="email" autofocus>
                                    <div id="emailError" class="errorMsg"></div><!-- place holder  for error  -->
                                </div>
                                <!-- password field -->
                                <div class="form-group">
                                    <input id="password" class="form-control" placeholder="Password" name="user_password"  type="password" value="">
                                    <div id="passwordError" class="errorMsg"></div><!-- place holder  for error  -->
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >
                            </fieldset>
                        </form>
                        <center><b>Already registered ?</b> <br></b><a href="<?php echo base_url('login'); ?>">Login here</a></center><!--for centered text-->
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