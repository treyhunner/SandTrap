<?php
    $blacklist = file("blacklist.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (in_array($_SERVER['REMOTE_ADDR'], $blacklist)) {
        echo "Your IP address ({$_SERVER['REMOTE_ADDR']}) has been banned from accessing this website.";
        exit(1);
    }
?>
