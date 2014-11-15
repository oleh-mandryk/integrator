<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Головна сторінка
 */
class Controller_Index_Main extends Controller_Index {
    
    public function action_index() {
        $page = ORM::factory('page')
           ->where('alias', '=', 'index')
           ->find();
        
        if(!$page->loaded() || $page->publish_id == 0) {
            throw new HTTP_Exception_404('Сторінка не знайдена');
            return;
        }
        
        $content = View::factory('index/page/page_index_view', array(
            'page' => $page,
        ));
        
        // Вивід в шаблон
        $this->template->title = 'Головна';
        $this->template->page_title = $page->title;
        $this->template->description = $page->description;
        $this->template->keywords = $page->keywords;
        $this->template->block_sidebar = null;
        $this->template->block_main = $content;
    }
}