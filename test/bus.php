<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://120.55.243.109/MapMonitor/GetCarInfo');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ids=2%2C3%2C7%2C9%2C10%2C15%2C207883300%2C654408972%2C1484614871%2C1736548547%2C1863789157%2C2053060190');

$r = curl_exec($ch);

curl_close($ch);

$data = json_decode($r, true);

$res = array();

for ($i = 0; $i < count($data['data']); $i++) {
	$res[] = array(
		'IS_ONLINE' => $data['data'][$i]['isol'],
		'BUS_NUM' => $data['data'][$i]['carnum'],
		'LINE_NAME' => $data['data'][$i]['linename'],
		'CURRENT_STOP_NAME' => $data['data'][$i]['cursname'],
		'NEXT_STOP_NAME' => $data['data'][$i]['nextsname'],
		'POSITION_LNG' => $data['data'][$i]['lng'],
		'POSITION_LAT' => $data['data'][$i]['lat'],
		'UPDATE_TIME' => $data['data'][$i]['gtime']
	);
}

?>

<pre><?php print_r($res); ?></pre>
