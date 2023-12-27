<?php

$chars = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'k', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

$names = require_once("nomes.php");

//function to save data to file
function save_names($file_path, $data){
    $file = fopen($file_path, "a");
    fwrite($file, $data . PHP_EOL);
    fclose($file);
}

// Check repeated names
function check_repeated_names($file_path){
    $tmp = [];
    $file = fopen($file_path, "r");
    while(!feof($file)){
        $line = fgets($file);
        if(in_array($line, $tmp)) continue;
        $tmp[] = $line;
    };
    fclose($file);

    sort($tmp);

    file_put_contents($file_path, $tmp);
}

//
foreach($names as $name){
    $tmp = str_split($name);

    // Names A to m
    if(in_array(strtoupper($tmp[0]), array_slice($chars, 0, 13))){
        //
        save_names("nomes_a_m.txt", $name);
    }else{
        save_names("nomes_n_z.txt", $name);
    }
}

check_repeated_names("nomes_a_m.txt");
check_repeated_names("nomes_n_z.txt");

echo "\n";

printf("Total de nomes: %d\n", count($names));

echo "FIM...";