<?php

include __DIR__ . "/stream.php";
stream_wrapper_register("dropbox", "\DropBox\Stream");
fopen('dropbox://test.txt', "r+");