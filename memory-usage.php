<?php

// prints initial memory in bytes
echo "Initial: " . memory_get_usage() . " bytes <br>";

// let's use up some memory
for ($i = 0; $i <= 100000; $i++) {
	$array []= md5($i);
}

// let's remove half of the array
for ($i = 0; $i <= 100000; $i++) {
	unset($array[$i]);
}

// prints final in bytes
echo "Final: " . memory_get_usage() . " bytes <br>";

// prints Peak in byte
echo "Peak: " . memory_get_peak_usage() . " bytes <br>";





/**
 * sort () - mengurutkan array dalam urutan menaik
 * rsort () - mengurutkan array dalam urutan menurun
 * asort () - mengurutkan array asosiatif dalam urutan naik, sesuai dengan nilainya
 * ksort () - mengurutkan array asosiatif dalam urutan naik, menurut kuncinya
 * arsort () - mengurutkan array asosiatif dalam urutan menurun, sesuai dengan nilainya
 * krsort () - mengurutkan array asosiatif dalam urutan menurun, menurut kuncinya
 */