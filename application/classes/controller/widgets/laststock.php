<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Віджет "Остання акція"
 */
class Controller_Widgets_Laststock extends Controller_Widgets {
   
    public $template = 'widgets/laststock_view';

    public function action_index() {
        
        // Отримуємо останню акцію з бази даних
        $laststock = ORM::factory('stock')
            ->where('publish_id', '=', 1)
            ->order_by('id','desc')
            ->find();
        
        $this->template->laststock = $laststock;
    }
}