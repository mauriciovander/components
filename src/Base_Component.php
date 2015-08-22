<?php

namespace TestComponents;

class Base_Component {

    public function __construct() {
        $this->log(__METHOD__);
    }

    public function __destruct() {
        $this->log(__METHOD__);
    }

    protected function log($message) {
        $tz = new \DateTimeZone('UTC');

        $log = new \Monolog\Logger(__NAMESPACE__);
        $log->setTimezone($tz);

        $error_handler = new \Monolog\Handler\ErrorLogHandler();
        $log->pushHandler($error_handler);

        // adds url,client ip,http_method,server and referrer to each log
        $web_processor = new \Monolog\Processor\WebProcessor();
        $log->pushProcessor($web_processor);

        // adds a unique identifier to each log
        // e.g. "uid":"0ce8d6d"                
        $uid_processor = new \Monolog\Processor\UidProcessor();
        $log->pushProcessor($uid_processor);

        $log->info(get_called_class() . ' ' . $message, $this->getContext());
    }

    private function getContext() {
        $context = [];
        if (!is_null(filter_input_array(INPUT_POST))) {
            $context['POST'] = filter_input_array(INPUT_POST);
        }
        if (!is_null(filter_input_array(INPUT_GET))) {
            $context['GET'] = filter_input_array(INPUT_GET);
        }
        if (!is_null(filter_input_array(INPUT_COOKIE))) {
            $context['COOKIE'] = filter_input_array(INPUT_COOKIE);
        }
        if (!is_null(filter_input_array(INPUT_SESSION))) {
            $context['SESSION'] = filter_input_array(INPUT_SESSION);
        }
        return $context;
    }

}
