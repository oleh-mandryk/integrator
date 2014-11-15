<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Базовий контроллер
 */
class Controller_Base extends Controller_Template {
    
    protected $user;
    protected $auth;
    protected $session;
    
    public function before() {
        parent::before();
        
        I18n::lang('ua');
        Cookie::$salt = 'm28o09m87rudky';
        Session::$default = 'native';
        
        $site_name = ORM::factory('setting',1);
        $this->auth = Auth::instance();
        $this->user = $this->auth->get_user();
        $this->session = Session::instance();
        
        //Вивід в шаблон
        $this->template->site_name = $site_name->value;
        $this->template->page_title = null;
        $this->template->title = null;
        $this->template->description = null;
        $this->template->keywords = null;

        //Підключаємо стилі і скрипти
        $this->template->styles = array();
        $this->template->scripts = array();

        //Підключаємо блоки
        $this->template->block_banner = null;
        $this->template->block_main = null;
        $this->template->block_content = null;
        $this->template->block_sidebar = null;
    }
}