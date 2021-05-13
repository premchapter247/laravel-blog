<?php 
/**
* Added By Prem
* Date - 07-05-2021
* Helpers file for defining common function 
* 
**/

// Defining all tags in the array
if (! function_exists('all_tags')) {
    function all_tags() {
        return array(
            '1'=> 'App',
            '2'=> 'It',
            '3'=> 'Business',
            '4'=> 'Mac',
            '5'=> 'Design',
            '6'=> 'Office',
            '7'=> 'Creative',
            '8'=> 'Studio',
            '9'=> 'Smart',
            '10'=> 'Tips',
            '11'=> 'Marketing',
        );
    }
}

// Get tags by tag ID
if (! function_exists('get_tag_by_id')) {
    function get_tag_by_id($id='') {
        $tagArray =  array(
            '1'=> 'App',
            '2'=> 'It',
            '3'=> 'Business',
            '4'=> 'Mac',
            '5'=> 'Design',
            '6'=> 'Office',
            '7'=> 'Creative',
            '8'=> 'Studio',
            '9'=> 'Smart',
            '10'=> 'Tips',
            '11'=> 'Marketing',
        );
        return $tagArray[$id];
    }
}