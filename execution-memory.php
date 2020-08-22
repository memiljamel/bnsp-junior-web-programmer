<?php

// from http://php.net/manual/en/function.filesize.php
function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 
    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 
    $bytes /= pow(1024, $pow); 
   
    return round($bytes, $precision) . ' ' . $units[$pow]; 
}

$start = microtime(true);
phpinfo();

return printf("Total time: %s\r\nMemory Used (current): %s\r\nMemory Used (max): %s", round(microtime(true) - $start, 4), formatBytes(memory_get_usage()), formatBytes(memory_get_peak_usage()));