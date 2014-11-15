<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Віджет "Цікаво знати"
 */
class Controller_Widgets_Photorand extends Controller_Widgets {
   
    public $template = 'widgets/photorand_view';

    public function action_index() {
        // Отримуємо всі id фотографій з бази даних
        $input = ORM::factory('photogallery')
            ->where('publish_id', '=', 1)
            ->find_all()
            ->as_array();
        
        if($input != null):
        // Вибираємо одне випадкове значення з масиву
        $rand_keys = array_rand($input, 1);
        $id_ok = $input[$rand_keys];
        
        // Отримуємо цікаво знати з бази даних, яке відповідає згенерованому id
        $one_photorand = ORM::factory('photogallery')
            ->where('publish_id', '=', 1)
            ->where('id', '=', $id_ok)
            ->find_all();
            $this->template->one_photorand = $one_photorand;
        endif;
    }
}