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
 * Tests for the sync_grades scheduled task class.
 *
 * @package enrol_lti
 * @copyright 2016 Jun Pataleta <jun@moodle.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use enrol_lti\data_connector;
use enrol_lti\helper;
use enrol_lti\task\sync_grades;
use enrol_lti\tool_provider;
use IMSGlobal\LTI\ToolProvider\Context;
use IMSGlobal\LTI\ToolProvider\ResourceLink;
use IMSGlobal\LTI\ToolProvider\ToolConsumer;
use IMSGlobal\LTI\ToolProvider\User;

defined('MOODLE_INTERNAL') || die();

/**
 * Tests for the sync_grades scheduled task class.
 *
 * @package enrol_lti
 * @copyright 2016 Jun Pataleta <jun@moodle.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class sync_grades_testcase extends advanced_testcase {
    /**
     * Test for sync_grades::execute().
     */

    /**
     * Enable auth_lti plugin.
     */
    protected function enable_auth() {
        $auths = get_enabled_auth_plugins(true);
        if (!in_array('lti', $auths)) {
            $auths[] = 'lti';
        }
        set_config('auth', implode(',', $auths));
    }

    /**
     * Enable enrol_lti plugin.
     */
    protected function enable_enrol() {
        $enabled = enrol_get_plugins(true);
        $enabled['lti'] = true;
        $enabled = array_keys($enabled);
        set_config('enrol_plugins_enabled', implode(',', $enabled));
    }
    public function test_execute() {
        $this->resetAfterTest();

        // Enable auth_lti.
        $this->enable_auth();
        $this->enable_enrol();

        $task = new enrol_lti\task\sync_grades;
        $task->execute();
    }


}
