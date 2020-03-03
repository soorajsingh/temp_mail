<?php
namespace local_notifylog\task;
require('../../lib.php');
/**
 * An example of a scheduled task.
 */
class notify_log extends \core\task\scheduled_task {
 
    /**
     * Return the task's name as shown in admin screens.
     *
     * @return string
     */
    public function get_name() {
        return get_string('notify_log', 'local_notifylog');
    }
 
    /**
     * Execute the task.
     */
    public function execute() {
        // Apply fungus cream.
        // Apply chainsaw.
        // Apply olive oil.
        send_notification_log();
    }
}