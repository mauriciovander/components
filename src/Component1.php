<?php 

namespace TestComponents;

class Component1 
{
  public function __construct()
  {
    $log = new Monolog\Logger(__NAMESPACE__.' '.__CLASS__);
  }  
}
