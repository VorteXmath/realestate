<?php

function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed;
    $minutes    = round($time_elapsed / 60);
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400);
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640);
    $years      = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        return "Şimdi";
    }
    //Minutes
    else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "1 dakika önce";
        } else {
            return "$minutes dakika önce";
        }
    }
    //Hours
    else if ($hours <= 24) {
        if ($hours == 1) {
            return "1 saat önce";
        } else {
            return "$hours saat önce";
        }
    }
    //Days
    else if ($days <= 7) {
        if ($days == 1) {
            return "dün";
        } else {
            return "$days gün önce";
        }
    }
    //Weeks
    else if ($weeks <= 4.3) {
        if ($weeks == 1) {
            return "1 hafta önce";
        } else {
            return "$weeks hafta önce";
        }
    }
    //Months
    else if ($months <= 12) {
        if ($months == 1) {
            return "1 ay önce";
        } else {
            return "$months ay önce";
        }
    }
    //Years
    else {
        if ($years == 1) {
            return "1 yıl önce";
        } else {
            return "$years yıl önce";
        }
    }
}
