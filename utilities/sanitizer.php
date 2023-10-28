<?php
error_reporting(E_ALL);
function sanitizer($evil_string){
    $safe_string = strip_tags($evil_string);

    return $safe_string;
   
    echo sanitizer($safe_string);
}

?>