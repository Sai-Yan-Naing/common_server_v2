<?php   
$url = $_SERVER['REQUEST_URI'];
$request = parse_url($url);
switch ($request['path']) {
// login section
// views
    case '' :
    case '/' :include 'views/index.php';break;
        
    case '/login' : include 'views/login.php';break; 
    case '/logout' : include 'controllers/accounts/logout.php';break; 

    case '/forgotpass' : include 'views/forgotpass.php'; break;

    case '/add_multi_domain' : include 'views/admin/add_domain/create.php'; break;

    //controller

    case '/login_confirm' : include 'controllers/accounts/login_confirm.php'; break;

    case '/pass_reset_confirm' : include 'controllers/accounts/pass_reset_confirm.php'; break;

    case '/new_password' : include 'controllers/accounts/new_password.php'; break;

    case '/add_multi_domain_confirm' : include 'controllers/accounts/add_multi_domain_confirm.php'; break;
    case '/site_onoff' : include 'controllers/sites/site_onoff.php'; break;

// admin section
// views
    case '/admin' : include 'views/admin/index.php'; break;
    case '/admin/servers' : include 'views/admin/servers/index.php'; break;
//end admin
    
// share
// views 
/* +++++++++++++++++++ server setting +++++++++++++++++++++++ */
    /*----------------- sites setting ------------------*/
    case '/share' : include 'views/share/index.php'; break;
    case '/share/servers/sites/basic' : include 'views/share/sites/basic.php'; break;
    // errors pages
    case '/share/servers/sites/errors/create' : include 'views/share/sites/errors/create.php'; break;
    case '/share/servers/sites/errors/edit' : include 'views/share/sites/errors/edit.php'; break;

    case "/share/servers/sites/application" : include 'views/share/sites/application.php'; break;
    // case '/share/servers/sites/application' : include 'views/share/application_setting/index.php'; break;
    // controller
    case '/change/app_version' : include 'controllers/application/app_version.php'; break;
    case '/share/appinstall' : include 'controllers/application/install.php'; break;
    case '/share/servers/sites/error/confirm' : include 'controllers/sites/error_confirm.php'; break;
    /*----------------- end sites setting ------------------*/

    /*----------------- security setting ------------------*/
    case '/share/servers/security' : include 'views/share/security/index.php'; break;
    case '/share/servers/security/waf' : include 'views/share/security/waf.php'; break;
    case '/share/servers/security/directory' : include 'views/share/security/directory.php'; break;
    case '/share/servers/security/ip' : include 'views/share/security/ip.php'; break;

    /*----------------- end security setting ------------------*/
    /*----------------- database ----------------------------*/
    case '/share/servers/database' : include 'views/share/database/index.php'; break;
    case '/share/servers/database/mssql' : include 'views/share/database/mssql.php'; break;
    case '/share/servers/database/mariadb' : include 'views/share/database/mariadb.php'; break;
    case '/share/servers/database/create' : include 'views/share/database/create.php'; break;
    case '/share/servers/database/edit' : include 'views/share/database/edit.php'; break;
    case '/share/servers/database/delete' : include 'views/share/database/delete.php'; break;
    // database controller
    case '/share/servers/database/confirm' : include 'controllers/database/confirm.php'; break;
    /* --------------------end database --------------------*/
    /* --------------------ftp --------------------*/
    case '/share/servers/ftp' : include 'views/share/ftp/index.php'; break;
    case '/share/servers/ftp/create' : include 'views/share/ftp/create.php'; break;
    case '/share/servers/ftp/edit' : include 'views/share/ftp/edit.php'; break;
    case '/share/servers/ftp/delete' : include 'views/share/ftp/delete.php'; break;
    // controller
    case '/share/servers/ftp/confirm' : include 'controllers/ftp/confirm.php'; break;
    /* --------------------end ftp --------------------*/
    case '/share/servers/filemanager' : include 'views/share/filemanager/index.php'; break;
    // controller filemanager
    case '/share/servers/filemanager/confirm' : include 'controllers/filemanager/confirm.php'; break;
    case '/share/servers/analysis' : include 'views/share/analysis/index.php'; break;


/* +++++++++++++++++++ end server setting +++++++++++++++++++++++ */

/* +++++++++++++++++++ mail setting +++++++++++++++++++++++ */
    // mails setting
    case '/share/mails' : include 'views/share/mails/index.php'; break;
    case '/share/mails/create' : include 'views/share/mails/create.php'; break;
    case '/share/mails/edit' : include 'views/share/mails/edit.php'; break;
    case '/share/mails/delete' : include 'views/share/mails/delete.php'; break;
    case '/share/mails/popimap' : include 'views/share/mails/popimap.php'; break;
    case '/share/mails/smtp' : include 'views/share/mails/smtp.php'; break;
    case '/share/mails/webmail' : include 'views/share/mails/webmail.php'; break;
    case '/share/mails/lists' : include 'views/share/mails/lists.php'; break;
    // controller
    case '/share/mails/confirm' : include 'controllers/mails/confirm.php'; break;
/* +++++++++++++++++++ end mail setting +++++++++++++++++++++++ */

/* +++++++++++++++++++ various setting +++++++++++++++++++++++ */
    //various setting
    case '/share/various' : include 'views/share/various/index.php'; break;
    case '/share/various/contractinfo' : include 'views/share/various/index.php'; break;
    case '/share/various/domain' : include 'views/share/various/domain.php'; break;
    case '/share/various/backup' : include 'views/share/various/backup.php'; break;
    // controllers
    case '/share/various/confirm' : include 'controllers/various/confirm.php'; break;
    case '/share/various/site' : include 'controllers/various/site.php'; break;
/* +++++++++++++++++++ end various setting +++++++++++++++++++++++ */
//end share



    case '/testing' : include 'views/testing.php'; break;
//default

    //for my test
    case '/test_khin' : include 'views/test_khin.php'; break;
    case '/push_testing' : include 'views/push_testing.php'; break;

    case '/pushing' : include 'views/pushing.php'; break;
    
    default: http_response_code(404); include'views/404.php'; break;
}