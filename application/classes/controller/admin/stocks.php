<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Stocks extends Controller_Admin {

    public function before() {
        parent::before();

        // Вивід в шаблон
        $this->template->page_title = 'Акції';
        $this->template->title = 'Акції';
    }

    public function action_index() {
        
        $count = ORM::factory('stock')->count_all();
        
        $pagination = Pagination::factory(array(
            'total_items' => $count,
            'items_per_page' => 20))
        
         ->route_params( array(
        'controller' => Request::current()->controller(),
        'action' => Request::current()->action(),
      ));
        
        $stock = ORM::factory('stock')
            ->order_by('id','desc')
            ->limit($pagination->items_per_page)
            ->offset($pagination->offset)
            ->find_all();

        $info_ok = $this->session->get('message_admin');
        
        $content = View::factory('admin/stock/stock_index_view', array(
            'stock' => $stock,
            'pagination' => $pagination,
            'info_ok' => $info_ok,
        ));
        
        $this->session->delete('message_admin');
        
        // Вивід в шаблон
        $this->template->block_main = $content;
    }

    public function action_add() {

        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, array('content', 'publish_id'));
            $stock = ORM::factory('stock');
            $stock->values($data);

            try {
                $stock->save();
                
                $ses_ok = Kohana::message('message', 'add');
                $this->session->set('message_admin', $ses_ok); //Записуємо сесію
                
                $this->request->redirect('admin/stocks');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
        }
        
            $content = View::factory('admin/stock/stock_add_view')
                ->bind('errors', $errors)
                ->bind('data', $data);
        
        // Вивід в шаблон
        $this->template->page_title .= ' :: Додавання';
        $this->template->title .= ' :: Додавання';
        $this->template->block_main = $content;
    }

    public function action_edit() {
        
        $id = (int) $this->request->param('id');
        $stock = ORM::factory('stock', $id);

        if(!$stock->loaded()){
            $this->request->redirect('admin/stocks');
        }

        $data = $stock->as_array();

        // Редагування
        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, array('content', 'publish_id'));
            $stock->values($data);

            try {
                $stock->save();
                
                $ses_ok = Kohana::message('message', 'edit');
                $this->session->set('message_admin', $ses_ok); //Записуємо сесію
                
                $this->request->redirect('admin/stocks');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
        }

        $content = View::factory('admin/stock/stock_edit_view')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data);

        // Вивід в шаблон
        $this->template->page_title .= ' :: Редагування';
        $this->template->title .= ' :: Редагування';
        $this->template->block_main = $content;
    }

    public function action_delete() {
        $id = (int) $this->request->param('id');
        $stock = ORM::factory('stock', $id);
        
        if(!$stock->loaded()){
            $this->request->redirect('admin/stocks');
        }
        
        $stock->delete();
        
        $ses_ok = Kohana::message('message', 'delete');
        $this->session->set('message_admin', $ses_ok); //Записуємо сесію
        
        $this->request->redirect('admin/stocks');
    }
}