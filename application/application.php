<?php
/**
 * Main application class.
 * 
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */
class Application {
    
    /**
     * @var string The method (of the above controller), often also named "action".
     */
    private $action = null;
    /**
     * @var string The controller name.
     */
    private $controller = null;
    /** 
     * @var array Contains parameters from url.
     */
    private $parameters = [];
    
    /**
     * Analyze the URL elements and calls the according controller/method or the fallback.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function __construct() {
        //Get data from url.
        $this->splitUrl();
        //Check if such controller exist.
        if (file_exists('./application/controller/' . $this->controller . '.php')) {
            //Load this file.
            require './application/controller/' . $this->controller . '.php';
            //Workaround for dynamicly create object from string.
            $controller_name = $this->controller;
            //Create this controller object.
            $this->controller = new $controller_name();
            //Check for method: does such a method exist in the controller?
            if (method_exists($this->controller, $this->action)) {
                //Call the method and pass the arguments to it.
                $this->controller->{$this->action}($this->parameters);
            } else {
                //Default/fallback: call the index() method of a selected controller.
                $this->controller->index();
            }
        } else {
            //Invalid URL, so simply show home/index
            require './application/controller/home.php';
            $home = new Home();
            $home->index();
        }
    }
    
    /**
     * Gets url from $_GET and split it to the parts.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    private function splitUrl() {
        //Get url from $_URL.
        $url = filter_input(INPUT_GET, 'url');
        
        if (isset($url)) {
            //Split URL.
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            //Put URL parts into according properties.
            $this->controller = isset($url[0]) ? $url[0] : null;
            $this->action = isset($url[1]) ? $url[1] : null;
            //Clear previous parameters.
            $this->parameters = [];
            $urlCount = count($url);
            //Check if sent parameters for action.
            if ($urlCount > 1) {
                for ($i = 2; $i < $urlCount; $i++) {
                    $this->parameters[] = $url[$i];
                }
            }
        }
    }
}
