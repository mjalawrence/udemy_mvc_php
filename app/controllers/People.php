<?php

class People
{
    public function __construct() {
    echo 'People loaded';
    }

    public function yarp($narp) {
        echo 'yarp';
        echo $narp;
    }
}

///public/index.php?url=People/yarp/narp