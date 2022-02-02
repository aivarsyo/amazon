<?php
function parseFile($link){
$data = file_get_contents($link);
// Break lines
$lines = explode("\n", $data);
$keys = explode("\t", $lines[0]);
$out = [];
for($i = 1; $i < count($lines); $i++){
  $data = explode("\t", $lines[$i]);
  $item = [];
  for($j = 0; $j < count($data); $j++){
    $data[$j] = str_replace("\r", "", $data[$j]);
    $keys[$j] = str_replace("\r", "", $keys[$j]);
    $item[$keys[$j]]=$data[$j];
  }
  array_push($out, $item);
}
return $out;
}

$doc_1 = json_encode(parseFile('https://docs.google.com/spreadsheets/d/e/2PACX-1vQA3Azy07zSYRGQ0TwQeqfFRpg9rrBIr2jezmzQPVVevHMC4nfE7LlXxvAv-dB3V-fUfW65g0GW95WO/pub?output=tsv'));
$doc_2 = json_encode(parseFile('https://docs.google.com/spreadsheets/d/e/2PACX-1vTCDPj2fyL9KLftpAQ24t-daZa43Kg-jAyMns6QYdAa0_VluOIesJ8KVtOOO7s7tyae_DPEqbh9vcfF/pub?output=tsv'));

file_put_contents("shops/shop_1.txt", $doc_1);
file_put_contents("shops/shop_2.txt", $doc_2);
/* header('Content-Type: application/json');
echo json_encode($out); */