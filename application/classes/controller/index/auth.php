<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Авторизація
 */
class Controller_Index_Auth extends Controller_Index {
    
    public function action_index() {
        $this->action_login();
    }
    
    //Функція для авторизації
    public function action_login() {
        if (Auth::instance()->logged_in()) {
            $this->request->redirect();
        }
        else {
            if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, array('username', 'password', 'remember'));
            $data = Security::xss_clean($data);
            $users = ORM::factory('user')->where('username','=',$data['username'])->find();
            
            $status = Auth::instance()->login($data['username'], $data['password'], (bool) $data['remember']);
            
            if ($status){
                if(Auth::instance()->logged_in('admin')) {
                    $this->request->redirect('admin');
                }
                
                $this->request->redirect();
            }
            else {
                $errors = array(Kohana::message('auth/user', 'no_user'));
            }
        }
        $content = View::factory('index/auth/auth_login_view')
                    ->bind('errors', $errors)
                    ->bind('data', $data);

        // Выводим в шаблон
        $this->template->title = 'Вхід';
        $this->template->page_title = 'Вхід';
        $this->template->block_content = array($content);
        }
    }

    public function action_logout() {
        Auth::instance()->logout();
        $this->request->redirect();
    }
}