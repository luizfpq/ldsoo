<?php

shell_exec( ‘cd /var/www/html/ldsoo && git pull >> temp ’ );
readfile('temp');
echo file_get)contents('temp');

?>
