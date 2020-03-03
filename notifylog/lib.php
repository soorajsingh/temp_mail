<?php

function send_notification_log(){
    global $CFG,$DB,$USER;
    
    
$sesskey=sesskey();

// file_put_contents($CFG->dirroot."/local/notifylog/report.csv",  $reportlog->download());
$tempdir = make_temp_directory('report/log');
$tempfile = $tempdir . '/' . md5(microtime()).'report.csv';
file_put_contents($tempfile, file_get_contents($CFG->wwwroot."/local/notifylog/test.php", 'r'));
// file_put_contents($CFG->dirroot."/local/notifylog/report.csv", file_get_contents($CFG->wwwroot."/local/notifylog/test.php", 'r'));

$to = $DB->get_record('user',array('id'=>1));
// $to->email='onlytestmail9@gmail.com';
$to->email='support@bluephish.org';


$from = get_admin();

$from->maildisplay = 1;


$emailsubject = "Log Report";

$emailmessage = "Please Check the log Report.";
 
//$tempdir = make_temp_directory('certificate/attachment');



//$attachment=$CFG->dirroot.'/local/notifylog/report.csv';


$test= email_to_user($to, $from, $emailsubject, $emailmessage,'',$tempfile,'report.csv',true);
var_dump($test);
echo "done";
}  





?>