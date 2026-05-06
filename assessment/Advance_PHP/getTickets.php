<?php

$file = "../data/tickets.json";

$tickets = json_decode(file_get_contents($file), true);

// Filter type (Open / Closed)
$type = $_GET['type'] ?? 'Open';

$filtered = [];

foreach($tickets as $t){
    if($t['status'] == $type){
        $filtered[] = $t;
    }
}

echo json_encode($filtered);