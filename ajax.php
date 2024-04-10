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
 * @copyright
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once ('../../config.php');
require_once ($CFG->libdir . '/adminlib.php');
require_once ($CFG->dirroot . '/admin/tool/totara_sync/lib.php');

/**
 * * get protected Value
 */
function getProtectedValue($object, $prop_name)
{
    $array = (array) $object;
    $prefix = chr(0) . '*' . chr(0);
    return $array[$prefix . $prop_name];
}

/**
 * * get csv, create hader info and array of data
 */
function local_import_csvtoarray()
{
    global $CFG;

    $stream = fopen($CFG->dataroot . '/hrimport/test.csv', 'r');
    if ($stream) {
        $header = [];
        $csv = [];
        $count = 0;
        while (!feof($stream)) {
            $row = fgetcsv($stream, 0, ';');
            if (empty($header)) {
                $header = $row;
            } elseif (empty($row)) {
                continue;
            } else {
                $csv[] = array_combine($header, $row);
            }
        }
    } else {
        throw new Exception($stream . ' doesn`t exist or is not readable.');
    }
    fclose($stream);

    return [$header, $csv];
}

$header = local_import_csvtoarray()[0];
$csv = local_import_csvtoarray()[1];

file_put_contents($CFG->dataroot . '/hrimport/user.json', json_encode($header, JSON_PRETTY_PRINT));

/** * get source data for hr-import */
$elementname = 'user';
$sourcename = 'totara_sync_source_user_csv';

if (!$element = totara_sync_get_element($elementname)) {
    print_error('elementnotfound', 'tool_totara_sync');
}

// get every config entry
$source = $element->get_source($sourcename)->get_config(null);
// var_dump($source);

foreach ($source as $key => $value) {
    // if ($key == 'delimiter') {
    //     $sourceArray[$key] = $value;
    // }
    if (strstr($key, 'import_') && $value == '1') {
        $sourceArray[] = substr($key, 7);
    }
}
// file_put_contents($CFG->dataroot . '/hrimport/hrimportfields_user.json', json_encode($sourceArray, JSON_PRETTY_PRINT));

/*
 * if (!$source->has_config()) {
 *     print_error('nosourceconfig', 'tool_totara_sync', $elementname);
 * }
 */
$response = new \stdClass;
try {
    if (isset($_GET)) {
        $response->sucess = 'success';
        $response->userfields = $sourceArray;
    }
} catch (Exception $e) {
    $response->error = $e;
}
echo json_encode($response);

// totara_sync_add_to_config_log('totara_sync','totara_sync_source_user_csv|fieldmapping_idnumber','manuell2');

/**
 * backup
 * /admin/tool/totara_sync/lib.php
 */
// function totara_sync_add_to_config_log($plugin, $name, $value) {
//     // We don't want to save any passwords as plain text.
//     if ($name === 'database_dbpass') {
//         $value = sha1($value);
//         $oldvalue = get_config($plugin, $name) === false ? null : sha1(get_config($plugin, $name));
//     } else {
//         $oldvalue = get_config($plugin, $name) === false ? null : get_config($plugin, $name);
//     }

//     if ($value != $oldvalue) {
//         $name = $plugin !== 'totara_sync' ? $plugin . '|' . $name : $name;
//         add_to_config_log($name, $oldvalue, $value,'totara_sync');
//     }
// }

