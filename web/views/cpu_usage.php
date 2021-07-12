<?php
if($_GET['case']=='cpu')
{
    echo cpu();
}else if($_GET['case']=='ram')
{
    echo ram();
}
function cpu()
{
    return preg_replace('/\s+/', '', str_replace('LoadPercentage','',shell_exec('wmic cpu get loadpercentage')));
}

function ram()
{
    $shell1 =  preg_replace('/\s+/', '',exec('systeminfo | findstr /C:"Available Physical Memory"'));
    $shell1 =  explode('AvailablePhysicalMemory:',$shell1);
    $shell1 = explode('MB',$shell1[1]);

    return $shell1[0];
    
}

?>