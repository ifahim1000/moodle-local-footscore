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
 * Confirm modal before delete.
 * @author      ifahim1000
 * @module     local_footscore/confirm_delete
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'jquery',
    'core/ajax',
    'core/str',
    'core/modal_factory',
    'core/modal_events',
    'core/notification'
], function($,
            Ajax,
            str,
            ModalFactory,
            ModalEvents,
            Notification) {

    $('.delete-btn').on('click', function() {
        let btnId = $(this).attr("id");
        let arr = btnId.split("-");
        let scoreId = arr[arr.length - 1];

        ModalFactory.create({
            type: ModalFactory.types.SAVE_CANCEL,
            title: 'Delete item',
            body: 'Do you really want to delete the record?',
        }).then(function(modal) {
            modal.setSaveButtonText('Delete');

            let root = modal.getRoot();
            root.on(ModalEvents.save, function() {
                let wsfunction = 'local_footscore_delete_score_by_id';
                let params = {
                    'scoreid': scoreId,
                };
                let request = {
                    methodname: wsfunction,
                    args: params
                };
                Ajax.call([request])[0].done(function() {
                    window.location.href = $(location).attr('href');
                }).fail(Notification.exception);
            });
            modal.show();
        });
    });
});