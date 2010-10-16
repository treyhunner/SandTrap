<?php
    require_once("sandtrap.php");

    // Ban the IP address
    $fh = fopen("blacklist.txt", "at");
    fwrite($fh, $_SERVER['REMOTE_ADDR']);
    fclose($fh);
?>
