<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Віджет "Статистика"
 */
class Controller_Widgets_Adminstat extends Controller_Widgets {

    public $template = 'widgets/adminstat_view'; // Шаблон виждета
    
    public function action_index() {
        $count['pages'] = ORM::factory('page')->count_all();
        //$count['i_wonder'] = ORM::factory('iwonder')->count_all();
        $count['photo'] = ORM::factory('photogallery')->count_all();
        
        // Вивід в шаблон
        $this->template->count = $count;
    }
}