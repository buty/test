<?php

$a = require 'dis_common_district.json';

$a = json_decode($a, true);

$direct_city = [1, 2, 9, 22];

$res = $parent = [];

$except = [32, 33, 34, 35, 36];

$direct_city_val = [];
foreach($a as $k => $v) {
    if($v['level'] < 3 && !in_array($v['id'], $except)) {
    	$parent[$v['id']] = $v;
    	//直辖市
    	if(in_array($v['upid'], $direct_city)) {
    		if(isset($direct_city_val[$v['upid']])) {
    			unset($res[$k]);
    		} else {
    			$tv = $parent[$v['upid']];
    			$v['name'] = $tv['name'];
    			$res[$k] = array_values($v);
    			$direct_city_val[$v['upid']] = true;
    		}
    	} else {
    		$res[$k] = array_values($v);
    	}
    }
}

$res = array_values($res);
$json_string = json_encode($res, JSON_UNESCAPED_UNICODE);

file_put_contents('./dis_common_district_charge.json', $json_string);