<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Меню частини користувача"
 */
class Controller_Widgets_Menumain extends Controller_Widgets {

    public $template = 'widgets/menu_view';    // Шаблон віджета
    
    public function action_index() {
        
        $contr = Request::initial()->controller();
        
        switch ($contr)
        {
            
            case 'photogallery':
                $select = $contr;
            break;
            
            case 'stock':
                $select = $contr;
            break;
            
            default :
                $act = Request::initial()->action();
                if ($act == 'contact') {
                    $select = 'contact';
                }
                else {
                    $select = Request::initial()->param('page_alias');
                }
                
            break;
        }
        
        $menu = array(
            'Головна' => array(''),
            'Послуги' => array('services'),
            'Ціни' => array('cost'),
            'Акції' => array('stock'),
            'Фотогалерея' => array('photogallery'),
            'Контакти' => array('contact'),
        );

        // Вывод в шаблон
        $this->template->menu = $menu;
        $this->template->select = $select;
    }
}