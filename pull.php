<?php

// Use in the “Post-Receive URLs” section of your GitHub repo.

if ( $_POST['payload'] ) {
shell_exec( ‘cd /var/www/html/ldsoo && git reset –hard HEAD && git pull >> temp ’ );
readfile('temp');
echo file_get)contents('temp');
}

?>
