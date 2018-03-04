<?php
/**
 * This is the base controller class. 
 * All other "normal" controllers should extend this class.
 * 
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */
abstract class Controller {
    
    /**
     * Default action for each controller.
     */
    public abstract function actionIndex();
    
    /**
     * Loads the model with the given name.
     * 
     * @param string $modelName The name of the model.
     * @return object Model object.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function loadModel(string $modelName) {
        
        require_once DIR_MODEL . strtolower($modelName) . FILE_PHP;
        return new $modelName();
    }
    
    /**
     * Loads footer view template.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    protected function outputFooter() {
        //Default footer.
        require DIR_VIEW . 'templates' . DS . 'footer.php';
    }
    
    /**
     * Loads header view template.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    protected function outputHeader() {
        //Default header.
        require DIR_VIEW . 'templates' . DS . 'header.php';
    }
}
