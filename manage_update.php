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

global $DB;

$PAGE->set_url(new moodle_url('/local/footscore/manage_update.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Update Football Scores');

$goalrecords= $DB->get_records('local_footscore');


echo $OUTPUT->header();
$templatecontext = (object)[
    'texttodisplay'=> array_values($goalrecords),
    'url1'=> new moodle_url('/local/footscore/manage.php'),
    'url2'=> new moodle_url('/local/footscore/update.php')
];

echo $OUTPUT->render_from_template('local_footscore/manage_update',$templatecontext);
echo $OUTPUT->footer();