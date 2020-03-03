<?php
require('../../config.php');
    global $CFG,$DB,$USER;

    require($CFG->dirroot."/lib/filelib.php");
    require_once($CFG->dirroot.'/report/log/locallib.php');
    require_once($CFG->dirroot.'/lib/tablelib.php'); 
//     $user = authenticate_user_login('admin', 'Admin@123');
//     complete_user_login($user);
    $sesskey=sesskey();
    
    
    
    $course          =  1;// Course ID.
    $group       = optional_param('group', 0, PARAM_INT); // Group to display.
    $user        = optional_param('user', 0, PARAM_INT); // User to display.
    $date        = mktime(0,0,0,date('m'),date('d'),date('Y')); // Date to display.
    $modid       = optional_param('modid', 0, PARAM_ALPHANUMEXT); // Module id or 'site_errors'.
    $modaction   = optional_param('modaction', '', PARAM_ALPHAEXT); // An action as recorded in the logs.
    $page        = optional_param('page', '0', PARAM_INT);     // Which page to show.
    $perpage     = optional_param('perpage', '100', PARAM_INT); // How many per page.
    $showcourses = optional_param('showcourses', false, PARAM_BOOL); // Whether to show courses if we're over our limit.
    $showusers   = optional_param('showusers', false, PARAM_BOOL); // Whether to show users if we're over our limit.
    $chooselog   = optional_param('chooselog', 1, PARAM_INT);
    $logformat   = 'csv'; 
    $logreader   = 'logstore_standard'; // Reader which will be used for displaying logs.
    $edulevel    = optional_param('edulevel', -1, PARAM_INT); // Educational level.
    $origin      = optional_param('origin', '', PARAM_TEXT); // Event origin.
    
    
    $reportlog = new report_log_renderable($logreader, $course, $user, $modid, $modaction, $group, $edulevel, $showcourses, $showusers,
            $chooselog, true, $url, $date, $logformat, $page, $perpage, 'timecreated DESC', $origin);
            // $readers = $reportlog->get_readers();
    $reportlog->setup_table();
    // \core\session\manager::write_close();
               
                // exit();

$sesskey=sesskey();
// $user = authenticate_user_login('admin', 'Admin@123', false, $reason, false);
        //     complete_user_login($user);


$reportlog->download();