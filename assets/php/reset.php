<?php
$files = glob(__DIR__ . '/threeJs/*');
foreach ($files as $file) {
    if (is_file($file)) {
        unlink($file);
    }
}
