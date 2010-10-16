<?php
    define( "SANDTRAP_ENABLE_LOGGING", true );
    define( "SANDTRAP_LOG_FILE", "sandtrap_log.txt" );
    define( "SANDTRAP_BLACKLIST", "blacklist.txt" );

    function check_ip() {
        $blacklist = file( SANDTRAP_BLACKLIST, ( FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES ) );
        if ( in_array( $_SERVER['REMOTE_ADDR'], $blacklist ) ) {
            log_ip();
            show_banned_message();
            halt();
        }
    }

    function show_banned_message() {
        echo "Your IP address ({$_SERVER['REMOTE_ADDR']}) has been banned from accessing this website.";
    }

    function ban_ip() {
        // Add the IP address to the blacklist file
        $bfh = fopen( SANDTRAP_BLACKLIST, "at" );
        fwrite( $bfh, $_SERVER['REMOTE_ADDR'] . "\n" );
        fclose( $bfh );

        log_ip();
        show_banned_message();
        halt();
    }

    function log_ip() {
        if ( SANDTRAP_ENABLE_LOGGING ) {
                // Add access time, IP address, and user agent to the log file
                $logfh = fopen( SANDTRAP_LOG_FILE, "at" );
                fwrite( $logfh,
                    date("Y-m-d H:i:s T") . ";" .
                    $_SERVER['REMOTE_ADDR'] . ";" .
                    $_SERVER['HTTP_USER_AGENT'] ."\n"
                );
                fclose( $logfh );
        }
    }

    function halt() {
        exit(1);
    }

    check_ip();
?>
