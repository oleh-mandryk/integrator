<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Личный кабинет
 */
class Controller_Admin_Account extends Controller_Admin {
    
    public function action_index() {
        
        $auth = Auth::instance();
        
        if (isset($_POST['submit'])) {
            
            $oldpass = Arr::get($_POST, 'password_current');
            
            $users = ORM::factory('user');
            
            if ((!$auth->check_password($oldpass))and(!empty($oldpass))) {
                $errors = array(Kohana::message('auth/user', 'password_current'));
            }
            else {
                try {
                    $users->where('id', '=', $this->user->id)
                        ->find()
                        ->update_user($_POST, array(
                            'password',
                            'first_name',
                            'email',
                        ));
                        
                        $ses_ok = Kohana::message('message', 'profile');
                        $this->session->set('message_profile', $ses_ok); //Записуємо сесію

                        $this->request->redirect('admin/account');
                    }
                    catch (ORM_Validation_Exception $e) {
                        $errors = $e->errors('auth');
                    }
            }
        }
        
        $info_ok = $this->session->get('message_profile'); 
        
        $content = View::factory('admin/account/account_profile_view')
            ->bind('user', $this->user)
            ->bind('errors', $errors)
            ->bind('info_ok', $info_ok);
                        
        $this->session->delete('message_profile');

        // Выводим в шаблон
        $this->template->title = 'Редагування профілю';
        $this->template->page_title = 'Редагування профілю';
        $this->template->block_main = $content;
    }
}