<?php

require_once('../../config.php');
require_once($CFG->libdir . '/adminlib.php');


$PAGE->set_url('/local/hrimport/hrimport.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_title('ka:media HR-Import');
$PAGE->set_heading('ka:media HR-Import');

require_login();

admin_externalpage_setup('totarasyncsettings');


$component = new \totara_tui\output\component('local_hrimport/pages/hrimport');
$component->register($PAGE);

echo $OUTPUT->header();
echo $OUTPUT->render($component);
echo $OUTPUT->footer();