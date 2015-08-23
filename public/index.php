<?php

/*
 * main file. 
 * cd into project base path and 
 * run using php -S 127.0.0.1:8888 public/inidex.php
 */

include __DIR__ . '/../vendor/autoload.php';

$whoops = new \Whoops\Run;
// for dev:
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


/*
 * play with traits and observers
 */
interface ObserverInterface {

    public function update();
}

trait ObserverTrait {

    private $observers = [];

    public function pushObserver(ObserverInterface $observer) {
        $this->observers[] = $observer;
    }

    public function updateObservers() {
        array_walk($this->observers, function(ObserverInterface $observer) {
            $observer->update();
        });
    }

}

class Main {
  use ObserverTrait;
  
  public function run() {
    new \TestComponents\Component1();
  }
  
}

class Observer1 implements ObserverInterface {

    public function update() {
        echo '<p>' . __CLASS__ . '</p>';
    }

}

$app = new Main();
$app->pushObserver(new Observer1());
$app->updateObservers();
$app->run();


