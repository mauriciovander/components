<?php

namespace TestComponents;

class Base_Component {

    public function __construct() {
        $this->log(get_cdalled_class() . ' ' . __METHOD__);
    }

    public function __destruct() {
        $this->log(get_called_class() . ' ' . __METHOD__);
    }

    protected function log($message) {
        $log = new \Monolog\Logger(__NAMESPACE__);
        $log->info($message);
    }

}
