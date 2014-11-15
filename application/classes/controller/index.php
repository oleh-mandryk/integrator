<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Базовий клас головної сторінки користувача
 */
class Controller_Index extends Controller_Base {
    
    public $template = 'index/base_view'; // Базовий шаблон

    public function  before() {
        parent::before();
        
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        if (stripos($user_agent, 'MSIE 6.0') !== false && stripos($user_agent, 'MSIE 8.0') === false && stripos($user_agent, 'MSIE 7.0') === false) {
            if (!isset($HTTP_COOKIE_VARS["ie"])) {
                setcookie("ie", "yes", time()+60*60*24*360);
                $this->request->redirect('/ie6/ie6.html');
            }
        }
        
        // Віджети
        $menu_main = Widget::load('menumain');
        $photorand = Widget::load('photorand');
        $laststock = Widget::load('laststock');
        
        // Вывод в шаблон
        $this->template->styles[] = 'media/css/main.css';
        $this->template->styles[] = 'media/css/forms.css';
        $this->template->styles[] = 'media/css/tables.css';
        $this->template->styles[] = 'media/css/prettyPhoto.css';
        $this->template->styles[] = 'media/css/gallery.css';                
        
         
        $this->template->scripts[] = 'media/js/jquery-1.4.1.min.js';
        $this->template->scripts[] = 'media/js/run.js';
        $this->template->scripts[] = 'media/js/jquery-prettyPhoto.js';
        
        $this->template->block_menu_main = $menu_main;
        $this->template->block_banner = true;
        $this->template->block_sidebar = array($laststock, $photorand);        
    }
}