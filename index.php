<?php

require_once 'vendor/autoload.php';
require_once 'config.php';

use Database\DbProvider;

var_dump(DbProvider::get());