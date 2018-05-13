<?php
/**
 * Controller for Google integration prototype.
 *
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */
class GoogleController extends Controller {
    
    /**
     * @var GoogleModel Default model for this controller. 
     */
    protected $model;
    
    /**
     * Default action for this controller.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function action_index() {
        
        $this->outputHeader_unlogged();
        
        $model = new GoogleModel();

        $calendarId = 'primary';
        $optParams = [
            'maxResults' => 10,
            'orderBy' => 'startTime',
            'singleEvents' => TRUE,
            'timeMin' => date('c'),
        ];
        
        $results = $model->calendarService->events->listEvents($calendarId, $optParams);
        $items = $results->getItems();
        
        require DIR_VIEW . 'google' . DS . 'index.php';
        
        $this->outputFooter();
    }
}
