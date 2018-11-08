<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>chat</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/chat.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validation.js" ></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8"><!-- user data table -->
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th colspan="4"><h4 class="text-center">Welcome User</h4></th>
                        </tr>
                        <tr>
                            <td>User Name</td>
                            <td><?php echo $name ?></td>
                            <td>User Email</td>
                            <td><?php echo $email ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <a href="<?php echo base_url('login/logout'); ?>" >  
                <button type="button" class="btn btn-primary">Logout</button>
            </a>
        </div>
        <br/>
        <div class="container"><!-- chat body -->
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-header panel-heading">
                        <form method="post" action="<?php echo site_url() ?>login/addMsg" id="chatform">
                            <div class="input-group">
                                <input type="text" class="form-control" id="msg" autocomplete="off" placeholder="Enter message" name="msg">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" disabled="true" id="sendButton" type="submit">Send</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="panel-body">
                        <div class="container">
                            <?php
                            //place holder for massege
                            if (!empty($messages)) {
                                foreach ($messages as $row) {
                                    ?>
                                    <div class="row message-bubble "><!-- send to delete msg the params: name, date. dltmsg check using the name to find the id in User.  -->
                                        <?php if ($session_id === $row['user_id']) { ?> <a href="<?php echo site_url() ?>login/deleteMsg/<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-remove icon_close" ></span></a> <?php } ?>
                                        <p class="text-muted"><?php echo $row['name'], ' ', $row['date']; ?></p>
                                        <span><?php echo $row['message']; ?></span>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>