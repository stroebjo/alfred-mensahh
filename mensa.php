<?php

$config = include('conf.php');

$mensa_id = intval($_ENV['MENSA_ID']);
$mensa_name = $_ENV['MENSA_NAME']; // set by Alfred utility
$date_filter = str_replace($mensa_name, '', $argv[1]);

if (empty($date_filter)) {
	$timestamp =  time();
} else {
	$timestamp = strtotime($date_filter);
}
$date = date('Ymd', $timestamp);

$mensa_github_url_part = null;
for($i = 0; $i < count($config['locations']) && is_null($mensa_github_url_part); $i++) {
	if ($config['locations'][$i]['id'] == $mensa_id) {
		$mensa_github_url_part = rawurlencode($config['locations'][$i]['name']);
	}
}

$url = sprintf($config['github_data_repo_url'], $mensa_github_url_part, $date);

$return = ['items' => []];

try {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	$ret = curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	$header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
	$header = substr($ret, 0, $header_len);
	$data = substr($ret, $header_len);
	curl_close($ch);

	if ($httpcode != 200) {
		throw new Exception('No data found on GitHub repo (HTTP Status code '.$httpcode.')');
	}

	$json = json_decode($data);

	foreach($json as $row) {

		switch($_ENV['PRICE']) {
			case 'Attendant':
				$price = number_format($row->PriceAttendant, 2);
			break;

			case 'Guest':
				$price = number_format($row->PriceGuest, 2);
			break;

			case 'Student':
				$price = number_format($row->PriceStudent, 2);
			break;
			default:
				$price = 'Set price pref in settings';
		}

		// prepare name, make it shorter so we see more of the menu name in Alfred
		
		// remove additives (are in subtitle)
		$name = preg_replace('/\s*\([a-z0-9, ]+\)\s*/i', '', $row->Name);

		// remove hashtags (including trailing "...,")
		$name = preg_replace('/#[a-z0-9, ]+\.*,?\s*/i', '', $name);


		$additives = '';
		$additives_array = array_keys(get_object_vars($row->Additives));
		if (count($additives_array)) {
			$additives = ' | ' . implode(', ', $additives_array);
		}

		// check for available icon
		$icon = false;

		if ($row->LactoseFree) {
			$icon = 'lactose-free.png';
		}

		if ($row->Alcohol) {
			$icon = 'alcohol.png';
		}

		if ($row->Fish) {
			$icon = 'fish.png';
		}
		if ($row->Pig) {
			$icon = 'pig.png';
		}
		if ($row->Poultry) {
			$icon = 'poultry.png';
		}
		if ($row->Beef) {
			$icon = 'beef.png';
		}

		if ($row->Vegetarian) {
			$icon = 'vegetarian.png';
		}
		if ($row->Vegan) {
			$icon = 'vegan.png';
		}

	
		$item = [
			'title' => $name,
			'subtitle' => sprintf("%s | %s%s", $price, $row->Category, $additives),
			'arg' => 'https://speiseplan.studierendenwerk-hamburg.de/de/530/2020/0/',
			'text' => [
				'largetype' => $row->Name,
				'copy' => $row->Name,
			]
		];

		if ($icon) {
			$item['icon'] = [
				'path' => 'images/category/'.$icon,
			];
		}

		$return['items'][] = $item;
	}
} catch (Exception $e) {
	$item = [
		'title' => $e->getMessage(),
		'subtitle' => $url,
	];
	$return['items'][] = $item;
}

echo json_encode($return);