<?php
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
 * @prettier
 */

namespace local_hrimport\task;

defined('MOODLE_INTERNAL') || die();

/**
 * An example of a scheduled task.
 */
class hrimport extends \core\task\scheduled_task
{
    /**
     * Return the task's name as shown in admin screens.
     *
     * @return string
     */
    public function get_name()
    {
        return get_string('user_import', 'local_hrimport');
    }

    /**
     * Execute the task.
     */
    public function execute()
    {
        require_once __DIR__ . '/../../lib.php';

        mtrace('prepare Input');
    }
}