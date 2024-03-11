<?php
/*
 * This file is part of Totara LMS
 *
 * Copyright (C) 2010 onwards Totara Learning Solutions LTD
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Alex Süß <alexander.suess@kamedia.de>
 * @package hrimport
 */

require('../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->dirroot.'/admin/tool/totara_sync/lib.php');
require_once($CFG->dirroot.'/admin/tool/totara_sync/admin/forms.php');

$elementname = 'user';
$sourcename = 'totara_sync_source_user_csv';

admin_externalpage_setup($sourcename);

if (!$element = totara_sync_get_element($elementname)) {
    print_error('elementnotfound', 'tool_totara_sync');
}

$source = $element->get_source($sourcename);

var_dump($source);
die();

if (!$source->has_config()) {
    print_error('nosourceconfig', 'tool_totara_sync', $elementname);
}

$form = new totara_sync_source_settings_form($FULLME, array('elementname' => $elementname, 'source' => $source));

/// Process actions
if ($data = $form->get_data()) {
    // Save source-specific config
    $source->config_save($data);

    \core\notification::success(get_string('settingssaved', 'tool_totara_sync'));
    redirect($FULLME);
}

/// Set form data
$form->set_data(get_config($sourcename));

/// Output
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string("settings:{$sourcename}", 'tool_totara_sync'));
echo $element->source->get_notifications();

$form->display();

echo $OUTPUT->footer();

