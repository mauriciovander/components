<?php

/*
 * main file. 
 * cd into project base path and 
 * run using php -S 127.0.0.1:8888 public/inidex.php
 */

error_reporting(E_ERROR);

include __DIR__ . '/../vendor/autoload.php';

$component1 = new \TestComponents\Component1();
