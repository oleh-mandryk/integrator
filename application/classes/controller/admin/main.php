<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Головна сторінка
 */
class Controller_Admin_Main extends Controller_Admin {

    public function action_index() {
        $adminstat = Widget::load('adminstat');
        
        // Вивід в шаблон
        $this->template->title = 'Головна';
         $this->template->page_title = 'Загальна статистика:';
        
        $this->template->block_main = $adminstat;
    }
}