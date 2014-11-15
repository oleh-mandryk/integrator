<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Фотогалерея
 */
class Controller_Index_Photogallery extends Controller_Index {
    
    public function action_index() {
    
    $count = ORM::factory('photogallery')
        ->where('publish_id','=',1)
        ->count_all();
    
    $pagination = Pagination::factory(array(
        'total_items' => $count,
        'items_per_page' => 20));
        
        $photo = ORM::factory('photogallery')
            ->where('publish_id','=',1)
            ->order_by('date','desc')
            ->limit($pagination->items_per_page)
            ->offset($pagination->offset)
            ->find_all();
            
        $content = View::factory('index/photogallery/photogallery_show_view', array(
            'photo' => $photo,
            'pagination' => $pagination,
        ));
            
        // Виводимо в шаблон
        $this->template->title = 'Фотогалерея';
        $this->template->page_title = 'Фотогалерея';
        $this->template->block_content = array($content);
        
    }
}