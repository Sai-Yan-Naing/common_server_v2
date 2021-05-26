// new password reset popup

// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[id='new_pass_confirm']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            newpass: {
                required: true,
                minlength: 5
            },
            newpass_con: {
                required: true,
                minlength: 5,
                equalTo: "#newpass"
            }
        },
        // Specify validation error messages
        messages: {
            newpass: {
                required: "Please enter a password",
                minlength: "Your password must be at least 5 characters long"
            },
            newpass_con: {
                required: "Please enter confirm password",
                minlength: "Your confirm password must be at least 5 characters long",
                equalTo: "password does not match."
            },
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            var cf = confirm("パスワードが初期化されますがよろしいですか");
            // var r = confirm("パスワードが初期化されますがよろしいですか");
            if (cf) {
                form.submit();
            }
            event.preventDefault();
        }
    });

    // for login page
    $("form[id='login_confirm']").validate({
        rules: {
            domain_userid: {
                required: true,
            },
            password: {
                required: true,
                minlength: 5,
            }
        },
        // Specify validation error messages
        messages: {
            domain_userid: {
                required: "Please enter domain or user ID",
                minlength: "Your password must be at least 5 characters long",
            },
            password: {
                required: "Please enter password",
                minlength: "Your password must be at least 5 characters long",
            },
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // For Domain Homepage
    $("form[id='app-install-form']").validate({
        rules: {
            url: {
                required: true,
            },
            site_name: {
                required: true,
            },
            username: {
                required: true,
                maxlength: 255,
            },
            email: {
                required: true,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 70,
            },
            db_name: {
                required: true,
            },
            db_username: {
                required: true,
            },
            db_password: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            url: {
                required: "Please enter URL link",

            },
            site_name: {
                required: "Please enter site name",

            },
            username: {
                required: "Please enter user name",
                maxlength: "Usernamr must be maximum 255 characters long",
            },
            email: {
                required: "Please enter email address",
            },
            password: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            },
            db_name: {
                required: "Please enter database name",

            },
            db_username: {
                required: "Please enter database username",
            },
            db_password: {
                required: "Please enter database password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
 
    // $("form[id='database_create']").validate({
    //     rules: {
    //         db_name: {
    //             required: true,
    //             minlength: 8,
    //             maxlength: 70,
    //             number:true,
    //         },
    //         db_username: {
    //             required: true,
    //             minlength: 8,
    //             maxlength: 70,
    //         },
    //         db_password: {
    //             required: true,
    //             minlength: 8,
    //             maxlength: 70,
    //         }
    //     },
    //     // Specify validation error messages
    //     messages: {
    //         db_name: {
    //             required: "Please enter database name",
    //             minlength: "Database name must be at least 8 characters long",
    //             maxlength: "Usernamr must be maximum 70 characters long",
    //             number:"number",
    //         },
    //         db_username: {
    //             required: "Please enter user name",
    //             minlength: "Username must be at least 8 characters long",
    //             maxlength: "Usernamr must be maximum 70 characters long",
    //         },
    //         db_password: {
    //             required: "Please enter password",
    //             minlength: "Your password must be at least 8 characters long",
    //             maxlength: "Your password must be maximum 70 characters long",
    //         }
    //     },
    //     submitHandler: function(form) {
    //         form.submit();
    //     }
    // });

    // For Free SSl
    $("form[id='free-ssl']").validate({
        rules: {
            common_name: {
                required: true,
            },
            prefecture: {
                required: true,
            },
            municipality: {
                required: true,
                maxlength: 255,
            },
            organization: {
                required: true,
            },
            department: {
                required: true,
            }
        },
        // Specify validation error messages
        messages: {
            common_name: {
                required: "Please enter common name",

            },
            prefecture: {
                required: "Please enter prefecture",
            },
            municipality: {
                required: "Please enter municipality",
            },
            organization: {
                required: "Please enter organization name",

            },
            department: {
                required: "Please enter department",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // For Add Directory
    $("form[id='add-directory']").validate({
        rules: {
            dir_path: {
                required: true,
            }
        },
        // Specify validation error messages
        messages: {
            dir_path: {
                required: "Please enter directory path",

            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // For Dir Information
    $("form[id='dir-information']").validate({
        rules: {
            user: {
                required: true,
                maxlength: 14,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            user: {
                required: "Please enter user name",
                maxlength: "Your name must be maximum 14 characters long",
            },
            password: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });




    // ------ftp js---------

    $("form[id='ftpUser']").validate({
        rules: {
            ftp_user: {
                required: true,
                maxlength: 14,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            ftp_user: {
                required: "Please enter FTP user",
                maxlength: "Usernamr must be maximum 14 characters long",
            },
            password: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // ------mail setting-------------

    jQuery.validator.addMethod("emailaddress", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9-]+)*$/.test(value);

    }, "You cannot enter @ signature");


    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });

    $("form[id='mailSetting']").validate({
        rules: {
            email: {
                required: true,
                emailaddress: true,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            email: {
                required: "Please enter email address",
            },
            password: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // -----------------mail information------------------

    jQuery.validator.addMethod("emailordomain", function(value, element) {
        return this.optional(element) || /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(value) || /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/.test(value);
    }, "Please must fill include(.)");


    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });

    $("form[id='application']").validate({
        rules: {
            domain_name: {
                required: true,
                emailordomain: true,
            },
            domain_type: {
                required: true,
            },
            auth_code: {
                required: true,
                digits: true,
            }
        },
        // Specify validation error messages
        messages: {
            domain_name: {
                required: "Please enter domain name",
            },
            domain_type: {
                required: "Please enter domain type",
            },
            auth_code: {
                required: "Please enter auth code",
                digits: "Please fill only integer"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $("form[id='another-app']").validate({

        rules: {
            domain_name: {
                required: true,
                emailordomain: true,
            },
            domain_type: {
                required: true,
            }
        },
        // Specify validation error messages
        messages: {
            domain_name: {
                required: "Please enter domain name",
            },
            domain_type: {
                required: "Please enter domain type",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // For Edit Dir Information
    $("form[id='edit-dir-information']").validate({
        rules: {
            password: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            password: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // For Edit server information (contract_information.php)
    $("form[id='edit-server-information']").validate({
        rules: {
            hostname: {
                required: true,
            },
            ip_address: {
                required: true,
            }
        },
        // Specify validation error messages
        messages: {
            hostname: {
                required: "Please enter hostname",
            },
            ip_address: {
                required: "Please enter ip address",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    // -----------status code and url eidt validate---------

    $("form[id='changeIp']").validate({
        rules: {
            status_code: {
                required: true,
                digits: true
            },
            url_spec: {
                required: true,
            }
        },
        // Specify validation error messages
        messages: {
            status_code: {
                required: "Please enter status code",
                digits: "Please must fill integer"
            },
            url_spec: {
                required: "Please enter url specification",

            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // -----------change target directory edit validate---------

    $("form[id='target-directory']").validate({
        rules: {
            target_dir: {
                required: true,
            }
        },
        // Specify validation error messages
        messages: {
            target_dir: {
                required: "Please enter document root",

            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // -----------authenticated user edit validate---------

    $("form[id='changePassword']").validate({
        rules: {
            pass_word: {
                required: true,
            }
        },
        // Specify validation error messages
        messages: {
            pass_word: {
                required: "Please enter password",

            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // -----------ftp edit validate---------

    $("form[id='ftp-password']").validate({
        rules: {
            pass_word2: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            pass_word2: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",

            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // -----------database in use edit validate---------

    $("form[id='database-use']").validate({
        rules: {
            password2: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            password2: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // -----------mail-setting edit validate---------

    $("form[id='mailSetting-edit']").validate({
        rules: {
            password2: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            password2: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // -----------dhome.php password edit validate---------

    $("form[id='user-change-password']").validate({
        rules: {
            pass_word2: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            pass_word2: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // -----------dhome.php user added btn validate---------

    $("form[id='add-user-btn']").validate({
        rules: {
            username2: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            username2: {
                required: "Please enter username",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });


});

$(document).ready(function() {

    // dhome added basic button click
    $('#addedBasic').click(function() {
        var $clone = $(".basicSet").clone(true);
        $clone.first().appendTo("#basicSetClone");
    });

    $('.remove').click(function() {
        // alert("hello World");
        $('.basicSet').not(':first').last().remove();
    });


    // basic auth setting toggle
    $(".basicSet").click(function() {
        $(this).find('.data-item').fadeToggle();
    });

});