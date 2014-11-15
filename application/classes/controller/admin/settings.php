<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Налаштування
 */
class Controller_Admin_Settings extends Controller_Admin {

    public function before() {
        parent::before();

        // Вивід в шаблон
        $this->template->page_title = 'Налаштування';
        $this->template->title = 'Налаштування';
    }

    public function action_index() {
    
        $settings = ORM::factory('setting')->find_all();
        
        $info_ok = $this->session->get('message_admin');
        
        $content = View::factory('admin/settings/settings_index_view', array(
            'settings' => $settings,
            'info_ok' => $info_ok,
        ));
        
        $this->session->delete('message_admin');

        // Вивід в шаблон
        $this->template->block_main = $content;
    }

    public function action_edit() {
        
        $id = (int) $this->request->param('id');
        $settings = ORM::factory('setting', $id);

        if(!$settings->loaded()){
            $this->request->redirect('admin/settings');
        }

        $data = $settings->as_array();

        // Редагування
        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, array('value'));
            $settings->values($data);

            try {
                $settings->save();
                
                $ses_ok = Kohana::message('message', 'edit');
                $this->session->set('message_admin', $ses_ok); //Записуємо сесію
                
                $this->request->redirect('admin/settings');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
        }

        $content = View::factory('admin/settings/settings_edit_view')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data);

        // Вивід в шаблон
        $this->template->page_title .= ' :: Редагування';
        $this->template->title .= ' :: Редагування';
        $this->template->block_main = $content;
    }
}