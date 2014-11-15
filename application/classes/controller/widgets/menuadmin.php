<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Меню частини адміністратора"
 */
class Controller_Widgets_Menuadmin extends Controller_Widgets {

    public $template = 'widgets/menuadmin_view';    // Шаблон віджета
    
    public function action_index() {
        
        $select = Request::initial()->controller();
        
        $menu = array(
            'Головна' => array('main'),
            'Сторінки' => array('pages'),
            'Акції' => array('stocks'),
            'Фотогалерея' => array('photogallery', 'menuphotogallery'),
            'Профіль' => array('account'),
            'Налаштування' => array('settings'),
            'Вихід' => array('logout'),
        );

        // Вывод в шаблон
        $this->template->menu = $menu;
        $this->template->select = $select;
    }
}