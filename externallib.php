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
        $goalrecord= $DB->get_record('local_footscore',array('id' => $id));
        $DB->delete_records('local_footscore', array('id' => $id));

        $return_value = [
            'id' => $goalrecord->id,
            'Team1' => $goalrecord->team1,
            'Goal1' => $goalrecord->goal1,
            'Team2' => $goalrecord->team2,
            'Goal2' => $goalrecord->goal2,
            'status' => 'deleted'
        ];
        return $return_value;

    }

    public static function delete_footballscore_returns()
    {
        return new external_single_structure(
            array(
                'id' => new external_value(PARAM_INT, 'deleted data id'),
                'Team1' => new external_value(PARAM_TEXT,'Team1 name'),
                'Goal1' => new external_value(PARAM_TEXT, 'Goal by Team1'),
                'Team2' => new external_value(PARAM_TEXT,'Team2 name'),
                'Goal2' => new external_value(PARAM_TEXT, 'Goal by Team2'),
                'status' => new external_value(PARAM_TEXT, 'deleted')
            )
        );
    }
}
