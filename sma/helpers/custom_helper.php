<?php
/**
 * Created by PhpStorm.
 * User: Hyder
 * Date: 6/30/14
 * Time: 11:21 AM
 *
 */

function convert_to_mysql_date($date)
{
    // convert 06/18/2014 to 2014-06-10
    $date = explode('/', $date);
    $year = $date['2'];
    $month = $date['0'];
    $day = $date['1'];
    $mysql_date = "$year-$month-$day";
    return $mysql_date;
}

function convert_to_normal_date($date)
{
    // convert  2014-06-10  to 06/18/2014
    $date = explode('-', $date);
    $year = $date['0'];
    $month = $date['1'];
    $day = $date['2'];
    $date = "$month/$day/$year";
    return $date;

}