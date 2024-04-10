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

defined('MOODLE_INTERNAL') || die;
$systemcontext = context_system::instance();

$ADMIN->add(
    'tool_totara_sync',
    new admin_externalpage(
        'hrimport_vue',
        get_string('hrimport_adminsettings_vue', 'local_hrimport'),
        new moodle_url('/local/hrimport/hrimport.php'),
    )
);

/*
 * $ADMIN->add('tool_totara_sync', new admin_category('hrimport_adminsettings_cat', get_string('hrimport_adminsettings_cat','local_hrimport')));
 * $ADMIN->add(
 *         'hrimport_adminsettings_cat',
 *         new admin_externalpage(
 *             'hrimport_skript',
 *             get_string('hrimport_adminsettings_run_task', 'local_hrimport'),
 *             new moodle_url('/local/hrimport/debug.php'),
 *         )
 *     );
 * $ADMIN->add(
 *         'hrimport_adminsettings_cat',
 *         new admin_externalpage(
 *             'user_mapping',
 *             get_string('hrimport_adminsettings_user_mapping', 'local_hrimport'),
 *             new moodle_url('/local/hrimport/usermapping.php'),
 *         )
 *     );
 * $ADMIN->add(
 *         'hrimport_adminsettings_cat',
 *         new admin_externalpage(
 *             'job_mapping',
 *             get_string('hrimport_adminsettings_job_mapping', 'local_hrimport'),
 *             new moodle_url('/local/hrimport/jobmapping.php'),
 *         )
 * );
 */

