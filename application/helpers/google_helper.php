<?php
function google_search($query)
{
    $api_url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&&rsz=large&q=" . $query;

    $body = file_get_contents($api_url);
    return json_decode($body);
}
