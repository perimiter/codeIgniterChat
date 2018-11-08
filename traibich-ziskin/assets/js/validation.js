
$(function () {

    // client side validation before submit the register form
    $("#registerform").submit(function (event) {

        //reset form before validation
        $("#name").parent().removeClass("has-error");

        $("#email").parent().removeClass("has-error");

        $("#password").parent().removeClass("has-error");

        $("#modeltxt").html("");

        $(".errorMsg").hide();

        //check if any field is empty
        var name_val = $.trim($("#name").val());
        var email_val = $.trim($("#email").val());
        var pwd_val = $.trim($("#password").val());

        //check if model is needed
        if (name_val.length === 0 || email_val.length === 0 || pwd_val.length === 0) {

            //check if field has error to mark
            if (name_val.length === 0) {

                $("#name").parent().addClass("has-error");
                $("#modeltxt").append("name is empty</br>");
                $("#nameError").html("name field cant be empty");
                $("#nameError").show();
            }

            if (email_val.length === 0) {

                $("#email").parent().addClass("has-error");
                $("#modeltxt").append("email is empty</br>");
                $("#emailError").html("email field cant be empty");
                $("#emailError").show();
            }

            if (pwd_val.length === 0) {

                $("#password").parent().addClass("has-error");
                $("#modeltxt").append("please enter a password</br>");
                $("#passwordError").html("password field cant be empty");
                $("#passwordError").show();
            }

            $('#myModal').modal('show');

            event.preventDefault();
        }

    });

    // client side validation before submit the login form
    $("#loginform").submit(function (event) {
        console.log('in login check');

        //reset form before validation
        $("#pwd").parent().removeClass("has-error");

        $("#email").parent().removeClass("has-error");

        $("#modeltxt").html("");

        $(".errorMsg").hide();

        //check if any field is empty
        var pass_val = $.trim($("#pwd").val());
        var email_val = $.trim($("#email").val());

        //check if model is needed
        if (pass_val.length === 0 || email_val.length === 0) {

            //check if field has error to mark
            if (pass_val.length === 0) {

                $("#pwd").parent().addClass("has-error");
                $("#modeltxt").append("password field is empty</br>");
                $("#pwdError").html("password field cant be empty");
                $("#pwdError").show();
            }

            if (email_val.length === 0) {

                $("#email").parent().addClass("has-error");
                $("#modeltxt").append("email field is empty</br>");
                $("#emailError").html("email field cant be empty");
                $("#emailError").show();
            }

            $('#myModal').modal('show');

            event.preventDefault();
        }
    });
     // prevent empty msg from being sent in chat window
    $('#msg').keyup(function(){
        if($(this).val().length !==0){
            $('#sendButton').attr('disabled', false); 
        }else{
            $('#sendButton').attr('disabled',true);
        }
    });
});

