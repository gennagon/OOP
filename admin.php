<?php

foreach (glob("*.user") as $filename){
    echo basename($filename, ".user");
    echo "<br>";
}

?>