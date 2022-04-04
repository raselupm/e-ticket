<?php

function eticket_stations() {
    return [
        [
            'name' => 'Dhaka',
            'address' => 'Dhaka',
            'lat' => 90.34434,
            'lon' => 92.32434,
        ],
        [
            'name' => 'Dhaka Bimanbondor',
            'address' => 'Dhaka Bimanbondor',
            'lat' => 90.34334,
            'lon' => 92.432434,
        ],
        [
            'name' => 'Khulna',
            'address' => 'Khulna',
            'lat' => 90.3542334,
            'lon' => 92.3432634,
        ]
    ];
}

function eticket_trains() {
    return [
        [
            'name' => 'Suborno Express',
            'date' => '2022-01-06',
            'home_station_id' => 1,
            'start_time' => '06:00'
        ],
        [
            'name' => 'Chitra Express',
            'date' => '2022-01-06',
            'home_station_id' => 1,
            'start_time' => '11:00'
        ]
    ];
}

function eticket_bogis() {
    return ['KA', 'KHA'];
}

function type_number_by_name() {
    return [
        0 => 'Shovon',
        1 => 'Shovon Chair'
    ];
}
