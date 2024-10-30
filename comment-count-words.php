<?php
/*
Plugin Name: Comment count in words
Plugin URI: http://www.htmlremix.com/projects/comment-count-in-words-wordpress-plugin
Description: Displays wordpress comment count in words. Like instead of 5 Comments, it shows Five Comments
Version: 2.0
Author: Remiz Rahnas
Author URI: http://www.htmlremix.com

Copyright 2010  Creative common  (email: mail@htmlremix.com)

This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

You are allowed to use, change and redistibute without any legal issues. I am not responsible for any damage caused by this program. Use at your own risk
Tested with Wordpress 2.9.2 only. Works normal settings
You will need to put <?php comment_words(); ?> in your theme file where you want to show comments in number.
*/


 
 $words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fourteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred &','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
function no_to_words($no)
{    global $words;
    if($no == 0)
        return ' ';
    else {           $novalue='';$highno=$no;$remainno=0;$value=100;$value1=1000;        
            while($no>=100)    {
                if(($value <= $no) &&($no  < $value1))    {
                $novalue=$words["$value"];
                $highno = (int)($no/$value);
                $remainno = $no % $value;
                break;
                }
                $value= $value1;
                $value1 = $value * 100;
            }        
          if(array_key_exists("$highno",$words))
              return $words["$highno"]." ".$novalue." ".no_to_words($remainno);
          else { 
             $unit=$highno%10;
             $ten =(int)($highno/10)*10;             
             return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno);
           }
    }
}
// $commentscount = get_comments_number(); 
//$commentscount = 1010; 
// echo no_to_words($commentscount);
function comment_words() {
	$commentscount = get_comments_number(); 
	echo no_to_words($commentscount);
	if ($commentscount=="0") echo "Add a comment"; else
	if ($commentscount=="1") echo "Comment"; else
	echo "Comments";
}
?>