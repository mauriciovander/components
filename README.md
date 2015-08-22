# TestComponents #

The intention of this repository is to 
test composer package management and 
set up a basic library structure for 
new projects

--- 

## Instalation ##

1. clone this repository with 

  <code>git clone https://github.com/mauriciovander/testpackage.git</code>

2. cd into testpackage
3. install dependencies

  <code>composer install</code>
  
4. run index.php as a server or create a virtualhost in your Apache/Nginx server 

pointing the DocumentRoot to the _public_ folder

  <code>php -S 127.0.0.1:8888 public/index.php</code>
  
5. open http://localhost on a browser
6. check console logs to confirm monolog is working properly
7. run tests to confirm phpunit is working properly

 <code>phpunit tests</code>

---

### Start writing your own code ###

If new namespaces are to be used (besides TestComponents),
be sure to link Namespace to path in composer.json PSR-4 
section for proper autoloading

run <code>composer dump-autoload</code> to regenerate PSR4 autoloader

enjoy...
