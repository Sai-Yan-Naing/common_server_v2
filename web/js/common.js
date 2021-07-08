function change_mail_text(change) {
    $("#change_mail_text").text(change)
}
$(document).ready(function() {
    allValidate();
})

function allValidate() {

    $(function() {
        // ip validate
        $.validator.addMethod('ip', function(value) {
            var split = value.split('.');
            if (split.length != 4)
                return false;

            for (var i = 0; i < split.length; i++) {
                var s = split[i];
                if (s.length == 0 || isNaN(s) || s < 0 || s > 255)
                    return false;
            }
            return true;
        }, 'Invalid IP address');
        

        // for  domain validate
        $.validator.addMethod('domain', function(value) {
            var regex = /^([a-zA-Z0-9_.+-])+(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(value);
        }, 'Invalid domain');

        
        $.validator.addMethod('jpdomain', function(value) {
            if(value.substr(value.length - 3) == '.jp')
            $("#authcode-error").remove();
            return true;
        }, 'Jp domain');

        // japanse character validate
        // var regex = /[\u3000-\u303F]|[\u3040-\u309F]|[\u30A0-\u30FF]|[\uFF00-\uFFEF]|[\u4E00-\u9FAF]|[\u2605-\u2606]|[\u2190-\u2195]|\u203B/g
        // allow special character
        $.validator.addMethod('numberalphabet', function(value){
            var regex = /^[! A-Za-z0-9_@./#&+-]*$/;
            if(regex.test(value))
            {
                return true;
            }
        }, "Please enter number and alphabet character only");

        $.validator.addMethod("nowhitespace", function(value, element) {
            return !/\s/.test(value);
        }, "Cannot enter white space");

        // allow underscroll ( _ ) and dash (-)
        // var regex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        $.validator.addMethod("nospecialchar", function(value){
            var regex = /[!@#$%^&*()+\=\[\]{};':"\\|,.<>\/?]+/;
            if(!regex.test(value)){
                return true;
            }
        }, "Cannot enter special character")

        // for add multiple domain
        $("form[id='add_multiple_domain']").validate({
            rules: {
                domain: {
                    required: true,
                    domain:true,
                },
                web_dir: {
                    required: true,
                    minlength: 8,
                    maxlength: 20
                },
                ftp_user: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    nospecialchar: true,
                    minlength: 1,
                    maxlength: 255
                },
                password: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    minlength: 8,
                    maxlength: 70
                },
            },
            // Specify validation error messages
            messages: {
                domain: {
                    required: "Please enter ドメイン名",
                },
                web_dir: {
                    required: "Please enter  web directory",
                    minlength: "8～20文字、半角英数字記号",
                    maxlength: "8～20文字、半角英数字記号"
                },
                ftp_user: {
                    required: "Please enter FTP user",
                    minlength: "1～255文字、半角英数小文字と_-.@",
                    maxlength: "1～255文字、半角英数小文字と_-.@"
                },
                password: {
                    required: "Please enter password",
                    minlength: "8～70文字、半角英数字記号",
                    maxlength: "8～70文字、半角英数字記号"
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end multiple domain
        // for add Contact Us Form
        $("form[id='contactus_form']").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    nospecialchar:true,
                    minlength: 8,
                },
                subject: {
                    required: true,
                    minlength: 8,
                },
                message: {
                    required: true,
                    minlength: 8,
                },
            },
            // Specify validation error messages
            messages: {
                name: {
                    required: "Please enter Name",
                },
                email: {
                    required: "Please enter email",
                    minlength: "Please enter a valid email address"
                },
                phone: {
                    required: "Please enter Phone number",
                    minlength: "Phone number must be at least 8 characters long",
                },
                subject: {
                    required: "Please enter subject",
                    minlength: "Phone number must be at least 8 characters long",
                },
                message: {
                    required: "Please enter message",
                    minlength: "Phone number must be at least 8 characters long",
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end Contact Us Form

        // for add app_install_form
        $("form[id='app_install_form']").validate({
            rules: {
                url: {
                    required: true,
                    url: true,
                },
                site_name: {
                    required: true,
                },
                username: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    nospecialchar: true,
                    minlength: 1,
                    maxlength: 255
                },
                email: {
                    required: true,
                },
                password: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    minlength: 8,
                    maxlength: 70
                },
                db_name: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    nospecialchar: true,
                    minlength: 5,
                    maxlength: 70
                },
                db_user: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    nospecialchar: true,
                    minlength: 5,
                    maxlength: 70
                },
                db_pass: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    minlength: 8,
                    maxlength: 70
                },
            },
            // Specify validation error messages
            messages: {
                url: {
                    required: "Please enter URL",
                    url: "Please enter valid URL",
                },
                site_name: {
                    required: "Please enter  サイト名",
                },
                username: {
                    required: "Please enter ユーザー名",
                    minlength: "1～255文字、半角英数小文字と_-.@"
                },
                email: {
                    required: "Please enter メールアドレス",
                },
                password: {
                    required: "Please enter password",
                    minlength: "8～70文字、半角英数字記号",
                    maxlength: "8～70文字、半角英数字記号"
                },
                db_name: {
                    required: "Please enter データベース名",
                    minlength: "5～70文字、半角英数字記号",
                    maxlength: "5～70文字、半角英数字記号"
                },
                db_user: {
                    required: "Please enter ユーザー名",
                    minlength: "5～70文字、半角英数字記号",
                    maxlength: "5～70文字、半角英数字記号"
                },
                db_pass: {
                    required: "Please enter パスワード",
                    minlength: "8～70文字、半角英数字記号",
                    maxlength: "8～70文字、半角英数字記号"
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end app_install_form

        // for add dir_path_create
        $("form[id='dir_path_create']").validate({
            rules: {
                dir_path: {
                    required: true,
                    nowhitespace:true,
                    nospecialchar: true,
                },
                ftp_user: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    nospecialchar: true,
                    minlength: 1,
                    maxlength: 14
                },
                ftp_pass: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    minlength: 8,
                    maxlength: 70
                },
            },
            messages: {
                dir_path: {
                    required: "Please enter ディレクトリ",
                },
                ftp_user: {
                    required: "Please enter  ユーザー名",
                    minlength: "1-14文字、半角英数字",
                    maxlength: "1-14文字、半角英数字"
                },
                ftp_pass: {
                    required: "Please enter パスワード",
                    minlength: "8～70文字、半角英数字記号",
                    maxlength: "8～70文字、半角英数字記号"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end dir_path_create

        $("form[id='blockip_create']").validate({
            rules: {
                block_ip: {
                    required: true,
                    ip: true,
                },
            },
            messages: {
                block_ip: {
                    required: "Please enter IP Address",
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end blockip_create

        // for add database_create
        $("form[id='database_create']").validate({
            rules: {
                db_name: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    nospecialchar: true,
                    minlength: 8,
                    maxlength: 70
                },
                db_user: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    nospecialchar: true,
                    minlength: 8,
                    maxlength: 70
                },
                db_pass: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    minlength: 8,
                    maxlength: 70
                },
            },
            // Specify validation error messages
            messages: {
                db_name: {
                    required: "Please enter データベース名",
                    minlength: "8～70文字、半角英数字記号",
                    maxlength: "8～70文字、半角英数字記号"
                },
                db_user: {
                    required: "Please enter ユーザー名",
                    minlength: "8～70文字、半角英数字記号",
                    maxlength: "8～70文字、半角英数字記号"
                },
                db_pass: {
                    required: "Please enter パスワード",
                    minlength: "8～70文字、半角英数字記号",
                    maxlength: "8～70文字、半角英数字記号"
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end database_create

        // for add ftp_create
        $("form[id='ftp_create']").validate({
            rules: {
                ftp_user: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    nospecialchar: true,
                    minlength: 1,
                    maxlength: 14
                },
                ftp_pass: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    minlength: 8,
                    maxlength: 70
                },
                "permission[]": {
                    required: true,
                },
            },
            errorPlacement: function(error, element) {
                if (element.is(":checkbox")) {
                    error.insertAfter($("#permission_error"));
                } else {
                    error.insertAfter(element);
                }
            },
            messages: {
                ftp_user: {
                    required: "Please enter  ユーザー名",
                    minlength: "1-14文字、半角英数字",
                    maxlength: "1-14文字、半角英数字"
                },
                ftp_pass: {
                    required: "Please enter パスワード",
                    minlength: "8～70文字、半角英数字記号",
                    maxlength: "8～70文字、半角英数字記号"
                },
                "permission[]": {
                    required: "Please check permission",
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end ftp_create

        // for add email_create
        $("form[id='email_create']").validate({
            rules: {
                email: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    nospecialchar: true,
                },
                mail_pass_word: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    minlength: 8,
                    maxlength: 70
                },
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") == "email") {
                    error.insertAfter($("#email_error"));
                } else {
                    error.insertAfter($("#mail_pass_word_error"));
                }
            },
            messages: {
                email: {
                    required: "Please enter メールアドレス",
                },
                mail_pass_word: {
                    required: "Please enter パスワード",
                    minlength: "8～70文字、半角英数字記号",
                    maxlength: "8～70文字、半角英数字記号"
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end email_create
        // $.validator.addMethod('ip', function(value) {
        //     var split = value.split('.');
        //     if (split.length != 4)
        //         return false;

        //     for (var i = 0; i < split.length; i++) {
        //         var s = split[i];
        //         if (s.length == 0 || isNaN(s) || s < 0 || s > 255)
        //             return false;
        //     }
        //     return true;
        // }, 'Invalid IP address');

        // for add dns_create
        $("form[id='dns_create']").validate({
            rules: {
                sub: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                },
                target: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    minlength: 8,
                }
            },

            // Specify validation error messages
            messages: {
                sub: {
                    required: "Please enter ホスト名",
                },
                target: {
                    required: "Please enter ＩＰ/ドメイン",
                    minlength: "ＩＰ/ドメイン must be at least 8 characters long"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end dns_create

        // for add basic_adduser_create
        $("form[id='basic_adduser_create']").validate({
            rules: {
                bass_user: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    nospecialchar: true,
                },
                bass_pass: {
                    required: true,
                    numberalphabet: true,
                    nowhitespace:true,
                    minlength: 8,
                    maxlength: 70,
                }
            },

            // Specify validation error messages
            messages: {
                bass_user: {
                    required: "Please enter ユーザー名",
                },
                bass_pass: {
                    required: "Please enter パスワード",
                    minlength: "8～70文字、半角英数記号の組み合わせ",
                    maxlength: "8～70文字、半角英数記号の組み合わせ"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end basic_adduser_create
        // for add serach_domain_fm
        // $("form[id='search_domain_fm']").validate({
        //     rules: {
        //         domain: {
        //             required: true
        //         }
        //     },

        //     // Specify validation error messages
        //     messages: {
        //         domain: {
        //             required: "Please enter ドメイン名",
        //         }
        //     },
        //     submitHandler: function(form) {
        //         form.submit();
        //     }
        // });

        // end serach_domain_fm
        // for add domian_transfer_tous
        $("form[id='domian_transfer_tous']").validate({
            rules: {
                domain: {
                    required: true,
                    domain:true,
                    jpdomain:true
                },
                authcode: {
                    required: {
                        depends: function(element) {
                            return ($('#usdomain').val().substr($('#usdomain').val().length - 3) != '.jp')
                        }
                    },
                    number:true,
                    minlength: 4,
                    maxlength: 16,
                }
            },

            // Specify validation error messages
            messages: {
                domain: {
                    required: "Please enter ドメイン名",
                },
                authcode: {
                    number: "AuthCode must be number",
                    required: "Please enter AuthCode",
                    minlength: "AuthCode must be between 4 and 16 characters long",
                    maxlength: "AuthCode must be between 4 and 16 characters long"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end domian_transfer_tous

        // for add domian_transfer_to_other
        $("form[id='domian_transfer_to_other']").validate({
            rules: {
                domain: {
                    required: true,
                    domain_search:true
                }
            },

            // Specify validation error messages
            messages: {
                domain: {
                    required: "Please enter ドメイン名",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end domian_transfer_to_other

        // for add bass_dir_create
        $("form[id='bass_dir_create']").validate({
            rules: {
                bass_dir: {
                    required: true,
                    nowhitespace:true,
                    nospecialchar: true
                }
            },

            // Specify validation error messages
            messages: {
                bass_dir: {
                    required: "Please enter directory",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // end bass_dir_create

    });

}