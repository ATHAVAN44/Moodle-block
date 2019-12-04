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
 * Block displaying information about current logged-in user.
 *
 * This block can be used as anti cheating measure, you
 * can easily check the logged-in user matches the person
 * operating the computer.
 *
 * @package    block_is_current_year_leap
 * @copyright  2010 Remote-Learner.net
 * @author     Athavan Pooranananthan
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Displays the current user's profile information.
 *
 * @copyright  2010 Remote-Learner.net
 * @author     Athavan Pooranananthan
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_is_current_year_leap extends block_base {
    /**
     * block initializations
     */


    public function init() {
        $this->title = get_string('pluginname', 'block_is_current_year_leap');
    }

    public function get_content() {
    if ($this->content !== null) {
      return $this->content;
    }
    
    $date = date("Y");
    $ts = time();
    //Get the current date in year format
    if(!is_null($date)){
        
        if(strlen($date) == 4){
            //covert to full date string.
            $date = $date . '-01-01';
        }
        $ts = strtotime("$date");
    }
    //If date "L" returns a 1 string, it was a leap year.
    if(date('L', $ts) == 1){
        $result = 'is leap year';
    }
    //Otherwise, return false.
    else{
        $result = 'is not a leap year';
    }
     
    $this->content         =  new stdClass;
   
     $this->content->text   =  'Current year '.$result;


    return $this->content;
}



}
