<?php

return [

	/**
	 * Base URL of a mensa detail view. 
	 * 
	 */
	'mensa_url' => 'https://speiseplan.studierendenwerk-hamburg.de/index.php/de/cafeteria/show/id/%s',

	/**
	 * URL for the map service provider, first argugment to sprintf() is the 
	 * - %1$s - address
	 * - %2$s - Google place id
	 * 
	 * Maps providers: 
	 * - Goggle Maps: https://www.google.com/maps/search/?api=1&query=%1$s&query_place_id=%2$s
	 * - Apple Maps: https://maps.apple.com/?q=%1$s
	 * - OpenStreetMap: https://www.openstreetmap.org/search?query=%1$s
	 * 
	 */
	'maps_url' => (isset($_ENV['MAPS_URL'])) ? $_ENV['MAPS_URL'] : 'https://www.openstreetmap.org/search?query=%1$s',

	'github_data_repo_url' => 'https://raw.githubusercontent.com/HAWHHCalendarBot/mensa-data/master/%s/%s.json',

	'locations' => [
		[
			'name' => 'Café (am Mittelweg)',
			'id' => 690,
			'opening_hours' => 'Mo - Do 8.00 - 15.30 Uhr | Fr 8.00 - 15.00 Uhr',
			'address' => 'Mittelweg 177, 20148 Hamburg',
			'place_id' => '', // not found on Google Maps
		],

		[
			'name' => 'Café Alexanderstraße',
			'id' => 660,
			'opening_hours' => 'Mo - Do 7.45 - 17.00 Uhr | Fr 7.45 - 16.00 Uhr',
			'address' => 'Alexanderstraße 1, 20099 Hamburg',
			'place_id' => 'ChIJmZjFbOiOsUcRNjF2AqI9GB8',
		],
		[
			'name' => 'Café Berliner Tor',
			'id' => 531,
			'opening_hours' => 'Mo - Do 7.45 - 18.00 Uhr | Fr 7.45 - 17.00 Uhr',
			'address' => 'Berliner Tor 7, 20099 Hamburg',
			'place_id' => 'ChIJBUQPQMKOsUcRzThYnbKhqe8',
		],
		[
			'name' => 'Café CFEL',
			'id' => 680,
			'opening_hours' => 'Mo - Do 8.00 - 16.00 Uhr | Fr 8.00 - 15.30 Uhr',
			'address' => 'Notkestrasse 85, 22607 Hamburg',
			'place_id' => '', // not found on Google Maps
		],
		[
			'name' => 'Café Jungiusstraße',
			'id' => 610,
			'opening_hours' => 'Mo - Do 9.30 - 16.00 Uhr | Fr 9.30 - 15.30 Uhr',
			'address' => 'Jungiusstraße 9, 20355 Hamburg',
			'place_id' => '', // not found on Google Maps
		],
		[
			'name' => 'Mensa Armgartstraße',
			'id' => 590,
			'opening_hours' => 'Mo - Do 9.00 - 15.00 Uhr | Fr 9.00 - 14.30 Uhr',
			'address' => 'Armgartstr. 24, 22087 Hamburg',
			'place_id' => 'ChIJ0e_2FMWOsUcRixuL9fecHI8',
		],
		[
			'name' => 'Mensa Bergedorf',
			'id' => 520,
			'opening_hours' => 'Mo - Do 11.15 - 14.30 Uhr | Fr 11.15 - 14.00 Uhr',
			'address' => 'Ulmenliet 20, 21033 Hamburg',
			'place_id' => 'ChIJyYCpmZPysUcRIgtPwv_hKEo',
		],
		[
			'name' => 'Mensa Berliner-Tor',
			'id' => 530,
			'opening_hours' => 'Mo - Do 11.15 - 14.30 Uhr | Fr 11.15 - 14.00 Uhr',
			'address' => 'Berliner Tor 7, 20099 Hamburg',
			'place_id' => 'ChIJCQTDFcKOsUcRp6AD50GmQZ0',
		],
		[
			'name' => 'Mensa Botanischer-Garten',
			'id' => 560,
			'opening_hours' => 'Mo - Do 11.00 - 15.00 Uhr | Fr 11.00 - 14.30 Uhr',
			'address' => 'Ohnhorststraße 18, 22609 Hamburg',
			'place_id' => 'Mensa Botanischer Garten',
		],
		[
			'name' => 'Mensa Bucerius-Law-School',
			'id' => 410,
			'opening_hours' => 'Mo - Fr 11.30 - 14.30 Uhr',
			'address' => 'Jungiusstraße 6, 20355 Hamburg',
			'place_id' => 'ChIJP2J2JxaPsUcREsDlNsUJwdw',
		],
		[
			'name' => 'Mensa Campus',
			'id' => 340,
			'opening_hours' => 'Mo - Fr 8.00 - 15.00 Uhr',
			'address' => 'Von-Melle-Park 5, 20146 Hamburg',
			'place_id' => 'ChIJqZOFkzuPsUcRRq61-ZKi6A8',
		],
		[
			'name' => 'Mensa Finkenau',
			'id' => 420,
			'opening_hours' => 'Mo - Do 11.30 - 14.45 Uhr | Fr 11.30 - 14.30 Uhr',
			'address' => 'Finkenau 35, 22081 Hamburg',
			'place_id' => 'ChIJ-eMirMmOsUcRfUX8aG5IKck',
 		],
		[
			'name' => 'Mensa Geomatikum',
			'id' => 540,
			'opening_hours' => 'Mo - Fr 11.00 - 15.00 Uhr',
			'address' => 'Bundesstraße 55, 20146 Hamburg',
			'place_id' => 'ChIJW2D0n0ePsUcRfSt4PX1JU2U',
		],
		[
			'name' => 'Mensa HCU',
			'id' => 430,
			'opening_hours' => 'Mo - Do 11.00 - 15.00 Uhr | Fr 11.00 - 14.30 Uhr',
			'address' => 'Überseeallee 16, 20457 Hamburg',
			'place_id' => 'ChIJO2NEWvmOsUcRIHEIV6xabH0',
		],
		[
			'name' => 'Mensa Harburg',
			'id' => 570,
			'opening_hours' => 'Mo - Fr 7.45 - 18.00 Uhr',
			'address' => 'Denickestraße 22, 21073 Hamburg',
			'place_id' => 'ChIJ4UA3_qyRsUcRhQiUGc2NJcE',
		],
		[
			'name' => 'Mensa Stellingen',
			'id' => 580,
			'opening_hours' => 'Mo - Do 8.00 - 15.00 Uhr | Fr 8.00 - 14.30 Uhr',
			'address' => 'Vogt-Kölln-Str. 30, 22527 Hamburg',
			'place_id' => '', // not found on Google Maps
		],
		[
			'name' => 'Mensa Studierendenhaus',
			'id' => 310,
			'opening_hours' => 'Mo - Fr 11.00 - 18.00 Uhr',
			'address' => 'Von-Melle-Park 2, 20146 Hamburg',
			'place_id' => 'ChIJiw0tJC2PsUcRGVAtJLDm8xo',
		],
		[
			'name' => 'Mensa Überseering',
			'id' => 380,
			'opening_hours' => 'Mo - Do 11.00 - 16.30 Uhr | Fr 11.00 - 15.30 Uhr',
			'address' => 'Überseering 35, 22297 Hamburg',
			'place_id' => '', // not found on Google Maps
		],
	]
];
