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
 * Version details
 *
 * @package    local_footscore
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @var stdClass $plugin
 */

require_once("$CFG->libdir/externallib.php");

class local_footscore_external_delete extends external_api
{
    public static function delete_footballscore_parameters()
    {
        return new external_function_parameters(
            array(
                'scoreid' => new external_value(PARAM_INT, "Score id")
            )
        );
    }
    public static function delete_footballscore($id)
    {
        global $DB;
       $DB->delete_records('local_footscore', array('id' => $id));

        $return_value = [
            'id' => $id,
            'status' => 'deleted'
        ];
        return $return_value;

    }

    public static function delete_footballscore_returns()
    {
        return new external_single_structure(
            array(
                'id' => new external_value(PARAM_INT, 'deleted data id'),
                'status' => new external_value(PARAM_TEXT, 'deleted')
            )
        );
    }
}
