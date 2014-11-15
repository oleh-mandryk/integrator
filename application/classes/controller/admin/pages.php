<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Сторінки
 */
class Controller_Admin_Pages extends Controller_Admin {

    public function before() {
        parent::before();

        // Вивід в шаблон
        $this->template->page_title = 'Сторінки';
        $this->template->title = 'Сторінки';
    }

    public function action_index() {
        
        $count = ORM::factory('page')->count_all();
        
        $pagination = Pagination::factory(array(
            'total_items' => $count,
            'items_per_page' => 20))
            
            ->route_params( array(
                'controller' => Request::current()->controller(),
                'action' => Request::current()->action(),
            ));
        
        $pages = ORM::factory('page')
            ->order_by('id','desc')
            ->limit($pagination->items_per_page)
            ->offset($pagination->offset)
            ->find_all();
        
        $info_ok = $this->session->get('message_admin');        
        
        $content = View::factory('admin/pages/pages_index_view', array(
            'pages' => $pages,
            'pagination' => $pagination,
            'info_ok' => $info_ok,
        ));
        
        $this->session->delete('message_admin');

        // Вивід в шаблон
        $this->template->block_main = $content;
    }

    public function action_edit() {
        
        $id = (int) $this->request->param('id');
        $pages = ORM::factory('page', $id);

        if(!$pages->loaded()){
            $this->request->redirect('admin/pages');
        }
        $data = $pages->as_array();

        // Редагування
        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, array('alias', 'description', 'keywords', 'title', 'content', 'publish_id'));
            $pages->values($data);

            try {
                $pages->save();
                
                $ses_ok = Kohana::message('message', 'edit');
                $this->session->set('message_admin', $ses_ok); //Записуємо сесію
                
                $this->request->redirect('admin/pages');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
        }

        $content = View::factory('admin/pages/pages_edit_view')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data);

        // Вивід в шаблон
        $this->template->page_title .= ' :: Редагування';
        $this->template->title .= ' :: Редагування';
        $this->template->block_main = $content;
    }
}