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
 * @package   local_hrimport
 * @copyright 2024, Alex Süß <alexander.suess@kamedia.de>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();
require_once ($CFG->dirroot . '/admin/tool/totara_sync/sources/source_user_csv.php');

function local_hrimport_user_mapping()
{
    $standard_fields = [
        'address',
        'city',
        'country',
        'department',
        'description',
        'email',
        'firstname',
        'institution',
        'lang',
        'lastname',
        'firstnamephonetic',
        'lastnamephonetic',
        'middlename',
        'alternatename',
        'phone1',
        'phone2',
        'timemodified',
        'timezone',
        'url',
        'username',
        'suspended',
        'emailstop',
        'auth'
    ];
    return $standard_fields;
}

/*
 * function local_hrimport_get_mappings()
 * {
 *     global $DB;
 *
 *     /**
 * TODO get all field
 * just get every entry in user_info_field
 * separate between required and custom?
 *
 * $user_fields = [
 *     'address',
 *     'city',
 *     'country',
 *     'department',
 *     'description',
 *     'email',
 *     'firstname',
 *     'institution',
 *     'lang',
 *     'lastname',
 *     'firstnamephonetic',
 *     'lastnamephonetic',
 *     'middlename',
 *     'alternatename',
 *     'phone1',
 *     'phone2',
 *     'timemodified',
 *     'timezone',
 *     'url',
 *     'username',
 *     'suspended',
 *     'emailstop',
 *     'auth'
 * ];
 *
 *     $pos_fields = [
 *         'idnumber',
 *         'fullname',
 *         'shortname',
 *         'deleted',
 *         'description',
 *         'frameworkidnumber',
 *         'parentidnumber',
 *         'typeidnumber',
 *         'timemodified'
 *     ];
 *
 *     $job_fields = [
 *         'idnumber',
 *         'useridnumber',
 *         'timemodified',
 *         'deleted',
 *         'fullname',
 *         'startdate',
 *         'enddate',
 *         'orgidnumber',
 *         'posidnumber',
 *         'appraiseridnumber',
 *         'manageridnumber',
 *         'tempmanageridnumber'
 *     ];
 *
 *     $org_fields = [
 *         'idnumber',
 *         'fullname',
 *         'shortname',
 *         'deleted',
 *         'description',
 *         'frameworkidnumber',
 *         'parentidnumber',
 *         'typeidnumber',
 *         'timemodified'
 *     ];
 *
 *     /** get all customfields
 *     $cstmfields = $DB->get_records('user_info_field');
 *     var_dump($cstmfields);
 * }
 */
