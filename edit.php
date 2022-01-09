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

 require_once(__DIR__.'/../../config.php');
 require_once($CFG->dirroot.'/local/footscore/classes/form/edit.php');

 global $DB;


  $PAGE->set_url(new moodle_url('/local/footscore/edit.php'));
  $PAGE->set_context(\context_system::instance());
  $PAGE->set_title('Edit Scores');




  // displaying the form
  $mform=new edit();

  if ($mform->is_cancelled()) {
    //Back to manage.php
     redirect($CFG->wwwroot . '/local/footscore/manage.php');

} else if ($fromform = $mform->get_data()) {

    //inserting data to DB
    $recordstoinsert = new stdClass();
    $recordstoinsert->team1=$fromform->team1;
    $recordstoinsert->team2=$fromform->team2;
    $recordstoinsert->goal1=$fromform->goal1;
    $recordstoinsert->goal2=$fromform->goal2;

    $DB->insert_record('local_footscore',$recordstoinsert);

    //go back to manage page
    redirect($CFG->wwwroot.'/local/footscore/manage.php',"Thank you for inserting a record.");
} 


  echo $OUTPUT->header();
  $mform->display();
  echo $OUTPUT->footer();