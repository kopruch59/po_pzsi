<?php
/**
 * This is the base controller class. 
 * All other normal controllers should extend this class.
 * 
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */
abstract class Controller {
    
    /**
     * Default action for each controller.
     */
    public abstract function index();
    
    /**
     * Loads the model with the given name.
     * 
     * @param string $model_name The name of the model.
     * @return object Model object.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function loadModel($model_name) {
        
        require 'application/models/' . strtolower($model_name) . '.php';
        return new $model_name();
    }
    
    /**
     * Loads footer view template.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    protected function loadFooterView() {
        //Default footer.
        require 'application/view/templates/footer.php';
    }
    
    /**
     * Loads header view template.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    protected function loadHeaderView() {
        //Default header.
        require 'application/view/templates/header.php';
    }
}
