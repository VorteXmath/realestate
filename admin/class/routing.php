//routing class

<?php
class Routing
{
    static function go($url, $time = 0)
    {
        if ($time != 0) {
            header("Refresh:$time;url=$url");
        } else {
            header("Location:$url");
        }
    }

    static function comeBack($time = 0)
    {
        $url = $_SERVER["HTTP_REFERER"];
        if ($time != 0) {
            header("Refresh:$time;url=$url");
        } else {
            header("Location:$url");
        }
    }
}
