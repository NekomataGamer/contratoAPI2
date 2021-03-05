<?php
class secretariaController extends Controller{
    public $needLogin;

    public function needLogin($need = false){
        $s = new Secretaria();

        if($need == true){
            if(!$s->isLogged()){
                header('Location: '.BASE_URL.'secretaria/login');
                
            }
        }
    }

    public function login(){
        $dados = array();
        $this->needLogin();
        $dados['title'] = "Login";

        $s = new Secretaria();
        if($s->isLogged()){
            header('Location: '.BASE_URL.'secretaria'); 
        }else{
            if(isset($_POST['email']) && !empty($_POST['email'])){
                $email = addslashes($_POST['email']);
                $pass = $_POST['pass'];

                if($s->login($email, $pass)){
                    header('Location: '.BASE_URL.'secretaria');
                }else{
                    $dados['error'] = true;
                }
            }

            $this->loadView('login', $dados, 'secretaria');
        }
    }

    public function logout(){
        $s = new Secretaria();
        $s->logout();
    }

    public function index(){
        $dados = array();

        $dados['title'] = "Dashboard";
        $this->needLogin(true);

        $this->loadTemplate('index', $dados, 'secretaria');
    }
}