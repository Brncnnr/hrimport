<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * @package   local_hrimport
 * @copyright 2023, Alex Süß <alexander.suess@kamedia.de>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
//defined('MOODLE_INTERNAL') || die();

/*
 * totara_sync_get_elements -> get all enabled elements 
 */
require('../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->dirroot.'/admin/tool/totara_sync/lib.php');
require_once($CFG->dirroot.'/admin/tool/totara_sync/admin/forms.php');

$hrroot = $CFG->dataroot . '/hrimport';
$elements = totara_sync_get_elements(true);

//var_dump(totara_sync_get_element('pos')->get_source

/*
 * gives 'pos' back ->
var_dump(key($elements));
die();
* create arary of the standard fields
* foreach over enabled positions
* get custom_fields and mapping
* create files
* fill file here?
*
* function get_customfield_json
 */
$user_fields = [
    'address', 'city', 'country', 'department', 'description',
    'email', 'firstname', 'institution', 'lang', 'lastname', 'firstnamephonetic',
    'lastnamephonetic', 'middlename', 'alternatename', 'phone1', 'phone2',
    'timemodified', 'timezone', 'url', 'username', 'suspended', 'emailstop', 'auth'
];

$pos_fields = [
            'idnumber',
            'fullname',
            'shortname',
            'deleted',
            'description',
            'frameworkidnumber',
            'parentidnumber',
            'typeidnumber',
            'timemodified'
];

$job_fields = [
            'idnumber',
            'useridnumber',
            'timemodified',
            'deleted',
            'fullname',
            'startdate',
            'enddate',
            'orgidnumber',
            'posidnumber',
            'appraiseridnumber',
            'manageridnumber',
            'tempmanageridnumber'
];

$org_fields = [
            'idnumber',
            'fullname',
            'shortname',
            'deleted',
            'description',
            'frameworkidnumber',
            'parentidnumber',
            'typeidnumber',
            'timemodified'
];

foreach ($elements as $element) {
    $title = key($elements);
    $source = $element->get_source("totara_sync_source_{$title}_csv");
    var_dump($element->get_source("totara_sync_source_{$title}_csv"));
    die();
//    var_dump(json_decode($element,true, 5));
    file_put_contents("{$hrroot}/{$title}.json", json_encode($source)); 
    die();
}

//var_dump($elements);
die();
