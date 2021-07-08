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
    //controller
    case '/login_confirm' : include 'controllers/accounts/login_confirm.php'; break;
    case '/pass_reset_confirm' : include 'controllers/accounts/pass_reset_confirm.php'; break;
    case '/new_password' : include 'controllers/accounts/new_password.php'; break;
    case '/site_onoff' : include 'controllers/sites/site_onoff.php'; break;
// admin section
// views
    case '/admin' : include 'views/admin/index.php'; break;
    case '/admin/servers' : include 'views/admin/servers/index.php'; break;
    case '/admin/servers/domain_transfer' : include 'views/admin/servers/domain_transfer/index.php'; break;
    case '/admin/servers/domain_transfer/confirm' : include 'controllers/admin/confirm/domain_transfer.php'; break;
    case '/domainChecker': include 'controllers/domainChecker.php'; break;
    // case '/admin/servers/action' : include 'views/admin/servers/action.php'; break;
/*+++++++++++++++++++++++++++++++domain+++++++++++++++++*/
    case '/admin/add_multi_domain' : include 'views/admin/add_domain/create.php'; break;
    // case '/admin/app_setting' : include 'views/admin/share/index.php'; break;
    // controller
    case '/admin/multi_domain_confirm' : include 'controllers/admin/multi_domain_confirm.php'; break;
    case '/admin/app_setting/confirm' : include 'controllers/admin/app_setting_confirm.php'; break;
    case '/admin/servers/dns_confirm' : include 'controllers/admin/confirm/dns.php'; break;
    case '/admin/servers/sitebinding' : include 'controllers/admin/confirm/sitebinding.php'; break;
/*+++++++++++++++++++++++++++++++end domain+++++++++++++++++*/
/*+++++++++++++++++++++++++++++++site setting +++++++++++++++++*/
    case '/admin/share' : include 'views/admin/share/index.php'; break;
    case '/admin/share/servers/sites/basic' : include 'views/admin/share/servers/sites/basic.php'; break;
    case '/admin/share/servers/sites/app' : include 'views/admin/share/servers/sites/app.php'; break;
    // security
    case '/admin/share/servers/security' : include 'views/admin/share/servers/security/index.php'; break;
    case '/admin/share/servers/security/waf' : include 'views/admin/share/servers/security/waf.php'; break;
    case '/admin/share/servers/security/directory' : include 'views/admin/share/servers/security/directory.php'; break;
    case '/admin/share/servers/security/ip' : include 'views/admin/share/servers/security/ip.php'; break;
    // controller
    case '/admin/share/appinstall-confirm' : include 'controllers/admin/share/appinstall.php'; break;
    case '/admin/share/ssl-confirm' : include 'controllers/admin/share/ssl_confirm.php'; break;
    // end security
    // database
    case '/admin/share/servers/database' : include 'views/admin/share/servers/database/main.php'; break;
    // end database
    case '/admin/share/servers/ftp' : include 'views/admin/share/servers/ftp/main.php'; break;
    case '/admin/share/servers/filemanager' : include 'views/admin/share/servers/filemanager/index.php'; break;
    case '/admin/share/servers/analysis' : include 'views/admin/share/servers/analysis/index.php'; break;
    // controller
    case '/admin/share/servers/ftp/confirm' : include 'controllers/admin/share/ftp.php'; break;
/*+++++++++++++++++++++++++++++++end site setting+++++++++++++++++*/
/*+++++++++++++++++++++++++++++++ mails setting+++++++++++++++++*/
    case '/admin/share/mails' : include 'views/admin/share/mails/main.php'; break;
    case '/admin/share/mails/popimap' : include 'views/admin/share/mails/popimap.php'; break;
    case '/admin/share/mails/smtp' : include 'views/admin/share/mails/smtp.php'; break;
/*+++++++++++++++++++++++++++++++end mails setting+++++++++++++++++*/
/*+++++++++++++++++++++++++++++++ various setting+++++++++++++++++*/
    case '/admin/share/various' : include 'views/admin/share/various/main.php'; break;
    case '/admin/share/various/backup' : include 'views/admin/share/various/backup.php'; break;
/*+++++++++++++++++++++++++++++++end various setting+++++++++++++++++*/

// contact us form
    case '/admin/contact_us' : include 'views/admin/contactus.php'; break;
    case '/admin/share/contactus' : include 'views/admin/share/contactus.php'; break;
    case '/share/contact_us' : include 'views/share/contactus.php'; break;
    case '/admin/contact_us/confirm' : include 'controllers/admin/contactus.php'; break;
    case '/share/contact_us/confirm' : include 'controllers/share/contactus.php'; break;
    

// ++++++++++++++++++++++++++++++ start vps +++++++++++++++++

    case '/admin/vps' : include 'views/admin/vps.php'; break;
    case '/admin/vps/panel' : include 'views/admin/vps/index.php'; break;

// ++++++++++++++++++++++++++++++ end vps +++++++++++++++++

//end admin
    
// share
// views 
/* +++++++++++++++++++ server setting +++++++++++++++++++++++ */
    /*----------------- sites setting ------------------*/
    case '/share' : include 'views/share/index.php'; break;
    case '/share/servers/sites/basic' : include 'views/share/servers/sites/basic.php'; break;
    case "/share/servers/sites/app" : include 'views/share/servers/sites/app.php'; break;
    // controller
    case '/change/app_version' : include 'controllers/application/app_version.php'; break;
    case '/share/appinstall' : include 'controllers/application/install.php'; break;
    /*----------------- end sites setting ------------------*/

    /*----------------- security setting ------------------*/
    case '/share/servers/security' : include 'views/share/servers/security/index.php'; break;
    case '/share/servers/security/waf' : include 'views/share/servers/security/waf.php'; break;
    case '/share/servers/security/directory' : include 'views/share/servers/security/directory.php'; break;
    case '/share/servers/security/ip' : include 'views/share/servers/security/ip.php'; break;
    /*----------------- end security setting ------------------*/
    case '/share/servers/database' : include 'views/share/servers/database/main.php'; break;
    /* --------------------ftp --------------------*/
    case '/share/servers/ftp' : include 'views/share/servers/ftp/main.php'; break;
    /* --------------------end ftp --------------------*/
    case '/share/servers/filemanager' : include 'views/share/filemanager/index.php'; break;
    // controller filemanager
    case '/share/servers/filemanager/confirm' : include 'controllers/filemanager/confirm.php'; break;
    case '/share/servers/analysis' : include 'views/share/servers/analysis/index.php'; break;


/* +++++++++++++++++++ end server setting +++++++++++++++++++++++ */

/* +++++++++++++++++++ mail setting +++++++++++++++++++++++ */
    case '/share/mails' : include 'views/share/mails/main.php'; break;
    case '/share/mails/popimap' : include 'views/share/mails/popimap.php'; break;
    case '/share/mails/smtp' : include 'views/share/mails/smtp.php'; break;
/* +++++++++++++++++++ end mail setting +++++++++++++++++++++++ */

/* +++++++++++++++++++ various setting +++++++++++++++++++++++ */
    //various setting
    case '/share/various' : include 'views/share/various/main.php'; break;
    case '/share/various/backup' : include 'views/share/various/backup.php'; break;
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