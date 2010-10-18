This project is for a PHP script that will add any IP address that accesses it
to a blacklist file.  This blacklist file can then be accessed by any other
script on the server to determine which IPs should be delivered false content.

Intended requirements for using this script:
- access to execute PHP
- access to read and write files from within PHP
- robots.txt file access

Installation:
  1. Copy the sandtrap directory and banip.php to the root directory for your
     domain

  2. If you already have a robots.txt file the root directory for your domain,
     modify it to include the rules in the inccluded robots.txt file. Otherwise
     copy the included robots.txt file to the root directory for your domain.

  4. Add the following code to the top of all PHP files that you want to be
     blocked (modify this code to point to the correct path for sandtrap.php):
        require_once("sandtrap/sandtrap.php");

  5. To increase the likelihood of malicious robots finding the banip.php file
     and accessing it, add the following HTML snippet near the top of your PHP
     pages:
        <a href="/banip.php" style="display: none;">Click to ban your IP</a>
