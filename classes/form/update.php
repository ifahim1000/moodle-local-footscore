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
 * Version information
 *
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");


// Get and check parameters
class update extends moodleform {
    //Add elements to form
    public function definition() {
        echo "all";
        global $CFG;
        $mform = $this->_form; // Don't forget the underscore!

        // creating field for Team1
        $mform->addElement('text', 'team1', 'Team 1:'); // Add elements to your form
        $mform->setType('team1', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('team1', 'Please enter a team name');        //Default value

        // creating field for Team2
        $mform->addElement('text', 'team2', 'Team 2:'); // Add elements to your form
        $mform->setType('team2', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('team2', 'Please enter a team name');

        // creating field for Goal1
        $mform->addElement('text', 'goal1', 'Goals by Team 1:'); // Add elements to your form
        $mform->setType('goal1', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('goal1', 'Goals scored by Team 1');        //Default value

        // creating field for Goal2
        $mform->addElement('text', 'goal2', 'Goals by Team 2:'); // Add elements to your form
        $mform->setType( 'goal2', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault( 'goal2', 'Goals scored by Team 2');        //Default value

        $this->add_action_buttons();

    }
    public function show($x,$y)
    {
        echo $x,$y;
    }

    //Custom validation should be added here

    function validation($data, $files) {
        return array();
    }
}