<?php

function GetJson()
{
    $jsonString = file_get_contents('jsonFile.json');
    $data = json_decode($jsonString, true);
    return $data;
}
function WriteJson($data)
{
    file_put_contents('jsonFile.json', json_encode($data));
}

$data = GetJson();

$id = $_GET["id"];

foreach ($data as $key => $entry) {
   if($data[$key][0]['player1'] == (string)$id) {
       $table = $key;
       $player1 = $data[$key][0]['player1'];
       $player2 = $data[$key][0]['player2'];
       $time = $data[$key][0]['time'];
   }
}
echo '<p>' . $table . ' ' . $player1 . ' ' . $player2 . ' ' . $time . '</p>';