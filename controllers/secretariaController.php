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

    public function verCursos(){
        $dados = array();
        $this->needLogin(true);
        $s = new Secretaria();

        $dados['title'] = 'Lista de Cursos';
        $dados['btnAction'] = array(
            'link' => BASE_URL.'secretaria/adicionarCurso',
            'title' => 'Adicionar Curso'
        );

        $dados['cursos'] = $s->getFromTable('cursos');

        $this->loadTemplate('listar_curso', $dados, 'secretaria');
    }

    public function adicionarCurso(){
        $dados = array();
        $this->needLogin(true);
        $s = new Secretaria();

        $dados['title'] = 'Adicionar Curso';

        if(isset($_POST['nome_curso']) && !empty($_POST['nome_curso'])){
            $nome_curso = addslashes($_POST['nome_curso']);
            $abrev = addslashes($_POST['abrev']);
            $area = addslashes($_POST['area']);
            $curso_nos_documentos = addslashes($_POST['cursos_nos_documentos']);
            $cod_inep = addslashes($_POST['cod_inep']);
            $cod_modalidade_inep = addslashes($_POST['cod_modalidade_inep']);
            $cod_polo_de_ed_dist_inep = addslashes($_POST['cod_polo_de_ed_dist_inep']);
            $grade_unica = addslashes($_POST['grade_unica']);
            $grade_unica_excecao = addslashes($_POST['grade_unica_excecao']);
            $educacao_a_distancia = addslashes($_POST['educacao_a_distancia']);
            $coordenador_curso = addslashes($_POST['coordenador_curso']);
            $coordenador_estagio = addslashes($_POST['coordenador_estagio']);
            $titulo = addslashes($_POST['titulo']);
            $titulacao = addslashes($_POST['titulacao']);
            $eixo_tecnologico = addslashes($_POST['eixo_tecnologico']);
            $area_conhecimento = addslashes($_POST['area_conhecimento']);
            $area_concentracao = addslashes($_POST['area_concentracao']);
            $habilitacao = addslashes($_POST['habilitacao']);
            $autorizacao = addslashes($_POST['autorizacao']);
            $reconhecimento = addslashes($_POST['reconhecimento']);
            $renovacao_conhecimento = addslashes($_POST['renovacao_reconhecimento']);
            $amparo_legal = addslashes($_POST['amparo_legal']);
            $perfil_profissional = addslashes($_POST['perfil_profissional']);
            $observacao = addslashes($_POST['observacao']);
            $prefixo_curso = addslashes($_POST['prefixo_curso']);
            $mostrar_faltas = addslashes($_POST['mostrar_faltas']);
            $separar_garga_horaria_pratica = addslashes($_POST['separar_carga_horaria_pratica']);
            $separar_carga_horaria_dispensa = addslashes($_POST['separar_carga_horaria_dispensa']);
            $mostrar_ano_semestre = addslashes($_POST['mostrar_ano_semestre']);
            $mostrar_titulo_periodo = addslashes($_POST['mostrar_titulo_periodo']);
            $subistituir_dispensa = addslashes($_POST['subistituir_dispensa']);
            $subistituir_pendente = addslashes($_POST['subistituir_pendente']);
            $nome_ch = addslashes($_POST['nome_ch']);
            $abrev_ch = addslashes($_POST['abrev_ch']);
            $nome_ch_anual = addslashes($_POST['nome_ch_anual']);
            $abrev_ch_anual = addslashes($_POST['abrev_ch_anual']);
            $curso_equival = addslashes($_POST['curso_equival']);
            $observacao_historico = addslashes($_POST['observacao_historico']);
            $periodo_letivo = addslashes($_POST['periodo_letivo1']);
            $desbloquear_prof = addslashes($_POST['desbloquear_professores']);

            // $keys = array_keys($_POST);

            $s->cadastrarCurso($nome_curso, $abrev, $area, $curso_nos_documentos, $cod_inep, $cod_modalidade_inep, $cod_polo_de_ed_dist_inep, $grade_unica, $grade_unica_excecao, $educacao_a_distancia, $coordenador_curso, $coordenador_estagio, $titulo, $titulacao, $eixo_tecnologico, $area_conhecimento, $area_concentracao, $habilitacao, $autorizacao, $reconhecimento, $renovacao_conhecimento, $amparo_legal, $perfil_profissional, $observacao, $prefixo_curso, $mostrar_faltas, $separar_garga_horaria_pratica, $separar_carga_horaria_dispensa, $mostrar_ano_semestre, $mostrar_titulo_periodo, $subistituir_dispensa, $subistituir_pendente, $nome_ch, $abrev_ch, $nome_ch_anual, $abrev_ch_anual, $curso_equival, $observacao_historico, $periodo_letivo, $desbloquear_prof);
        }

        $dados['coordenadores'] = $s->getFromTable('coordenadores');
        $dados['cursos'] = $s->getFromTable('cursos');
        
        $this->loadTemplate('cadastrar_curso', $dados, 'secretaria');
    }

    public function editarCurso($id_curso){
        $dados = array();
        $this->needLogin(true);
        $s = new Secretaria();

        $dados['title'] = 'Editar Curso';

        if(isset($_POST['nome_curso']) && !empty($_POST['nome_curso'])){
            $nome_curso = addslashes($_POST['nome_curso']);
            $abrev = addslashes($_POST['abrev']);
            $area = addslashes($_POST['area']);
            $curso_nos_documentos = addslashes($_POST['cursos_nos_documentos']);
            $cod_inep = addslashes($_POST['cod_inep']);
            $cod_modalidade_inep = addslashes($_POST['cod_modalidade_inep']);
            $cod_polo_de_ed_dist_inep = addslashes($_POST['cod_polo_de_ed_dist_inep']);
            $grade_unica = addslashes($_POST['grade_unica']);
            $grade_unica_excecao = addslashes($_POST['grade_unica_excecao']);
            $educacao_a_distancia = addslashes($_POST['educacao_a_distancia']);
            $coordenador_curso = addslashes($_POST['coordenador_curso']);
            $coordenador_estagio = addslashes($_POST['coordenador_estagio']);
            $titulo = addslashes($_POST['titulo']);
            $titulacao = addslashes($_POST['titulacao']);
            $eixo_tecnologico = addslashes($_POST['eixo_tecnologico']);
            $area_conhecimento = addslashes($_POST['area_conhecimento']);
            $area_concentracao = addslashes($_POST['area_concentracao']);
            $habilitacao = addslashes($_POST['habilitacao']);
            $autorizacao = addslashes($_POST['autorizacao']);
            $reconhecimento = addslashes($_POST['reconhecimento']);
            $renovacao_conhecimento = addslashes($_POST['renovacao_reconhecimento']);
            $amparo_legal = addslashes($_POST['amparo_legal']);
            $perfil_profissional = addslashes($_POST['perfil_profissional']);
            $observacao = addslashes($_POST['observacao']);
            $prefixo_curso = addslashes($_POST['prefixo_curso']);
            $mostrar_faltas = addslashes($_POST['mostrar_faltas']);
            $separar_garga_horaria_pratica = addslashes($_POST['separar_carga_horaria_pratica']);
            $separar_carga_horaria_dispensa = addslashes($_POST['separar_carga_horaria_dispensa']);
            $mostrar_ano_semestre = addslashes($_POST['mostrar_ano_semestre']);
            $mostrar_titulo_periodo = addslashes($_POST['mostrar_titulo_periodo']);
            $subistituir_dispensa = addslashes($_POST['subistituir_dispensa']);
            $subistituir_pendente = addslashes($_POST['subistituir_pendente']);
            $nome_ch = addslashes($_POST['nome_ch']);
            $abrev_ch = addslashes($_POST['abrev_ch']);
            $nome_ch_anual = addslashes($_POST['nome_ch_anual']);
            $abrev_ch_anual = addslashes($_POST['abrev_ch_anual']);
            $curso_equival = addslashes($_POST['curso_equival']);
            $observacao_historico = addslashes($_POST['observacao_historico']);
            $periodo_letivo = addslashes($_POST['periodo_letivo1']);
            $desbloquear_prof = addslashes($_POST['desbloquear_professores']);

            if($s->editarCurso($nome_curso, $abrev, $area, $curso_nos_documentos, $cod_inep, $cod_modalidade_inep, $cod_polo_de_ed_dist_inep, $grade_unica, $grade_unica_excecao, $educacao_a_distancia, $coordenador_curso, $coordenador_estagio, $titulo, $titulacao, $eixo_tecnologico, $area_conhecimento, $area_concentracao, $habilitacao, $autorizacao, $reconhecimento, $renovacao_conhecimento, $amparo_legal, $perfil_profissional, $observacao, $prefixo_curso, $mostrar_faltas, $separar_garga_horaria_pratica, $separar_carga_horaria_dispensa, $mostrar_ano_semestre, $mostrar_titulo_periodo, $subistituir_dispensa, $subistituir_pendente, $nome_ch, $abrev_ch, $nome_ch_anual, $abrev_ch_anual, $curso_equival, $observacao_historico, $periodo_letivo, $desbloquear_prof, $id_curso)){
                $dados['success'] = true;
            }
        }

        $dados['btnModal'] = array(
            'title' => 'Adicionar Período',
            'id' => 'addPeriodo'
        );

        $dados['btnSecondary'] = array(
            'title' => 'Listar Períodos',
            'id' => 'listPeriodo'
        );

        $dados['cursoInfo'] = $s->getCursoInfo($id_curso);
        $dados['coordenadores'] = $s->getFromTable('coordenadores');
        $dados['cursos'] = $s->getFromTable('cursos');
        $dados['periodos'] = $s->getPeriodos($id_curso);
        
        $this->loadTemplate('editar_curso', $dados, 'secretaria');
    }

    public function matriculas(){
        $dados = array();
        $this->needLogin(true);
        $s = new Secretaria();

        $dados['btnAction'] = array(
            'title' => 'Matricular Aluno',
            'link' => 'matricularAluno/'
        );

        $dados['title'] = 'Listar Matriculas';
        $dados['matriculas'] = array();
        

        $this->loadTemplate('listar_matriculas', $dados, 'secretaria');
    }

    public function matricularAluno(){
        $dados = array();
        $this->needLogin(true);
        $s = new Secretaria();

        $dados['title'] = 'Editar Curso';


        
        $dados['cursos'] = $s->getFromTable('cursos');

        $this->loadTemplate('matricular_aluno', $dados, 'secretaria');
    }
}