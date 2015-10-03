<?php

$a = require 'dis_common_district.json';

$a = json_decode($a, true);

$res = $parent = [];

$except = [35, 36];

$direct_city_val = [];
foreach($a as $k => $v) {
    if($v['level'] < 3 && !in_array($v['id'], $except)) {
    	$res[$k] = array_values($v);
    }
}

$res = array_values($res);
$json_string = json_encode($res, JSON_UNESCAPED_UNICODE);

file_put_contents('./dis_common_district_user.json', $json_string);