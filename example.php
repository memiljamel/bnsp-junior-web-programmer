<?php

$arrays = [
    ["Satu"],
    ["Dua"],
    ["Tiga"]
];

foreach($arrays as $array) {
    echo $array[0] . "<br>";
}

echo "<hr>";

echo $arrays[1][0];

echo "<hr>";

$arrs = ["Satu", "Dua", "Tiga"];

sort($arrs);

for($i = 0; $i < count($arrs); $i++) {
    echo $arrs[$i] . "<br>";
}