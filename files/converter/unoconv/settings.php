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
 * Settings for unoconv.
 *
 * @package   fileconverter_unoconv
 * @copyright 2017 Andrew Nicols <andrew@nicols.co.uk>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Unoconv setting.
$settings->add(new admin_setting_configexecutable('pathtounoconv',
        new lang_string('pathtounoconv', 'fileconverter_unoconv'),
        new lang_string('pathtounoconv_help', 'fileconverter_unoconv'),
        '/usr/bin/unoconv')
    );

$options = array(
    0 => get_string('unoconvtimeout_default', 'fileconverter_unoconv'),
    30 => '30',
    60 => '60',
    120 => '120',
    180 => '180',
    240 => '240',
    300 => '300',
    360 => '360',
    420 => '420',
    480 => '480',
    540 => '540',
    600 => '600'
);

$settings->add(new admin_setting_configselect('unoconvtimeout', new lang_string('unoconvtimeout', 'fileconverter_unoconv'),
        new lang_string('unoconvtimeout_help', 'fileconverter_unoconv'), 1, $options));

$url = new moodle_url('/files/converter/unoconv/testunoconv.php');
$link = html_writer::link($url, get_string('test_unoconv', 'fileconverter_unoconv'));
$settings->add(new admin_setting_heading('test_unoconv', '', $link));
