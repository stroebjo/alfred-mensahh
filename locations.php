<?php

$config = include('conf.php');

$filter = ($argc == 2) ? $argv[1] : false;
$return = ['items' => []];

foreach($config['locations'] as $location) {

	if ($filter && (stripos($location['name'], $filter) === false)) {
		continue;
	}

	$item = [
		'uid' => $location['id'],
		'title' => $location['name'],
		'subtitle' => $location['opening_hours'],
		'arg' => sprintf('%s,%s', $location['id'], $location['name']),
		'mods' => [
			'cmd' => [
				'valid' => true,
				'arg' => sprintf($config['mensa_url'], $location['id']),
				'subtitle' => 'Open website',
			],
			'alt' => [
				'valid' => true,
				'arg' => sprintf($config['maps_url'], $location['address'], $location['place_id']),
				'subtitle' => 'Show on map',
			]
		]
	];

	$return['items'][] = $item;
}

echo json_encode($return);
