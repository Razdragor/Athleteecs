<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 07/07/2016
 * Time: 19:51
 */

namespace App;


class HelperYoutube
{
    public static function UrlsYoutube($message){
        $regex = '#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#';
        preg_match_all($regex, $message, $matches);
        $matches = array_unique($matches[0]);
        usort($matches, function($a, $b) {
            return strlen($b) - strlen($a);
        });
        return $matches;
    }

    public static function KeyYoutube($url){
        $pattern = '%^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=))([\w-]{10,12})$%x';
        $result = preg_match($pattern, $url, $matches);
        if ($result) {
            return $matches[1];
        }
        return false;
    }
}