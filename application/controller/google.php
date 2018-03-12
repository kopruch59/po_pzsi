<?php
/**
 * Controller for Google integration prototype.
 *
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */
class Google extends Controller {
    
    public function __construct() {
        
        require DIR_MODEL . 'google.php';
    }
    
    /**
     * Default action for this controller.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function action_index() {
        
        $this->outputHeader();
        
        $model = new GoogleModel();

        //Next 10 events on the user's calendar.
        $calendarId = 'primary';
        $optParams = [
            'maxResults' => 10,
            'orderBy' => 'startTime',
            'singleEvents' => TRUE,
            'timeMin' => date('c'),
        ];
        
        $results = $model->service->events->listEvents($calendarId, $optParams);
        $items = $results->getItems();
        
        require DIR_VIEW . 'google' . DS . 'index.php';
        
        $this->outputFooter();
    }
}
