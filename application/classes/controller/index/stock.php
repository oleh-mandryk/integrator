<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Акції
 */
class Controller_Index_Stock extends Controller_Index {
    
    public function action_index() {
        
        $all_stocks = ORM::factory('stock')
            ->where('publish_id', '=', 1)
            ->order_by('id','desc')
            ->find_all();

        $content = View::factory('index/stock/stock_index_view', array(
            'all_stocks' => $all_stocks,
        ));
        
        // Виводимо в шаблон
        $this->template->title = 'Акції';
        $this->template->page_title = 'Акції';
        $this->template->block_content = array($content);
    }
}