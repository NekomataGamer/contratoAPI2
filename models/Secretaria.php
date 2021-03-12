<?php
class Secretaria extends Model{
    public function isLogged(){
        if(isset($_SESSION['secretaria']) && !empty($_SESSION['secretaria'])){
            return true;
        }else{
            return false;
        }
    }

    public function login($email, $pass){
        $sql = "SELECT id FROM admin WHERE email = :email AND pass = :pass";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':pass', md5($pass));
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $_SESSION['secretaria'] = $data['id'];
            return true;
        }else{
            return false;
        }
    }

    public function logout(){
        unset($_SESSION['secretaria']);
        header('Location: '.BASE_URL.'secretaria');
    }

    public function cadastrarCurso($nome_curso, $abrev, $area, $curso_nos_documentos, $cod_inep, $cod_modalidade_inep, $cod_polo_de_ed_dist_inep, $grade_unica, $grade_unica_excecao, $educacao_a_distancia, $coordenador_curso, $coordenador_estagio, $titulo, $titulacao, $eixo_tecnologico, $area_conhecimento, $area_concentracao, $habilitacao, $autorizacao, $reconhecimento, $renovacao_reconhecimento, $amparo_legal, $perfil_profissional, $observacao, $prefixo_curso, $mostrar_faltas, $separar_garga_horaria_pratica, $separar_carga_horaria_dispensa, $mostrar_ano_semestre, $mostrar_titulo_periodo, $subistituir_dispensa, $subistituir_pendente, $nome_ch, $abrev_ch, $nome_ch_anual, $abrev_ch_anual, $curso_equival, $observacao_historico, $periodo_letivo, $desbloquear_prof){
        $sql = "INSERT INTO cursos SET id_coordenador = :id_coordenador, nome_curso = :nome_curso, abrev = :abrev, area = :area, curso_no_doc = :curso_no_doc, cod_inep = :cod_inep, cod_mod_inep = :cod_mod_inep, cod_polo_ed_dist = :cod_polo_ed_dist, grade_unica = :grade_unica, grade_unica_excecao = :grade_unica_excecao, educacao_distancia = :educacao_distancia, titulo = :titulo, titulacao = :titulacao, eixo_tecnologico = :eixo_tecnologico, area_conhecimento = :area_conhecimento, area_concentracao = :area_concentracao, habilitacao = :habilitacao, autorizacao = :autorizacao, reconhecimento = :reconhecimento, renovacao_conhecimento = :renovacao_conhecimento, amparo_legal = :amparo_legal, perfil_profissional = :perfil_profissional, observacao = :observacao, prefixo_curso = :prefixo_curso, mostrar_faltas = :mostrar_faltas, separar_carg_hor_pratica = :separar_carg_hor_pratica, separar_carg_hor_dispensa = :separar_carg_hor_dispensa, mostrar_ano_semestre = :mostrar_ano_semestre, mostrar_titulo_periodo = :mostrar_titulo_periodo, substituir_dispensa_aproveitamento = :substituir_dispensa_aproveitamento, substituir_pendente_acursar = :substituir_pendente_acursar, nome_ch = :nome_ch, abrev_ch = :abrev_ch, nome_ch_anual = :nome_ch_anual, abrev_ch_anual = :abrev_ch_anual, id_curso_equivalencia = :id_curso_equivalencia, observacao_historico = :observacao_historico, periodo_letivo_encerrado = :periodo_letivo_encerrado, desbloq_prof_ano_let_1 = :desbloq_prof_ano_let_1, id_inst = :id_inst";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_coordenador', $coordenador_curso);
        $sql->bindValue(':nome_curso', $nome_curso);
        $sql->bindValue(':abrev', $abrev);
        $sql->bindValue(':area', $area);
        $sql->bindValue(':curso_no_doc', $curso_nos_documentos);
        $sql->bindValue(':cod_inep', $cod_inep);
        $sql->bindValue(':cod_mod_inep', $cod_modalidade_inep);
        $sql->bindValue(':cod_polo_ed_dist', $cod_polo_de_ed_dist_inep);
        $sql->bindValue(':grade_unica', $grade_unica);
        $sql->bindValue(':grade_unica_excecao', $grade_unica_excecao);
        $sql->bindValue(':educacao_distancia', $educacao_a_distancia);
        $sql->bindValue(':titulo', $titulo);
        $sql->bindValue(':titulacao', $titulacao);
        $sql->bindValue(':eixo_tecnologico', $eixo_tecnologico);
        $sql->bindValue(':area_conhecimento', $area_conhecimento);
        $sql->bindValue(':area_concentracao', $area_concentracao);
        $sql->bindValue(':habilitacao', $habilitacao);
        $sql->bindValue(':autorizacao', $autorizacao);
        $sql->bindValue(':reconhecimento', $reconhecimento);
        $sql->bindValue(':renovacao_conhecimento', $renovacao_reconhecimento);
        $sql->bindValue(':amparo_legal', $amparo_legal);
        $sql->bindValue(':perfil_profissional', $perfil_profissional);
        $sql->bindValue(':observacao', $observacao);
        $sql->bindValue(':prefixo_curso', $prefixo_curso);
        $sql->bindValue(':mostrar_faltas', $mostrar_faltas);
        $sql->bindValue(':separar_carg_hor_pratica', $separar_garga_horaria_pratica);
        $sql->bindValue(':separar_carg_hor_dispensa', $separar_carga_horaria_dispensa);
        $sql->bindValue(':mostrar_ano_semestre', $mostrar_ano_semestre);
        $sql->bindValue(':mostrar_titulo_periodo', $mostrar_titulo_periodo);
        $sql->bindValue(':substituir_dispensa_aproveitamento', $subistituir_dispensa);
        $sql->bindValue(':substituir_pendente_acursar', $subistituir_pendente);
        $sql->bindValue(':nome_ch', $nome_ch);
        $sql->bindValue(':abrev_ch', $abrev_ch);
        $sql->bindValue(':nome_ch_anual', $nome_ch_anual);
        $sql->bindValue(':abrev_ch_anual', $abrev_ch_anual);
        $sql->bindValue(':id_curso_equivalencia', $curso_equival);
        $sql->bindValue(':observacao_historico', $observacao_historico);
        $sql->bindValue(':periodo_letivo_encerrado', $periodo_letivo);
        $sql->bindValue(':desbloq_prof_ano_let_1', $desbloquear_prof);
        $sql->bindValue(':id_inst', $_SESSION['secretaria']);
        $sql->execute();

        $idCurso = $this->db->lastInsertId();

        header('Location: '.BASE_URL.'secretaria/editarCurso/'.$idCurso.'?success=true'); 
    }

    public function getCursoInfo($idCurso){
        $array = array();

        $sql = "SELECT * FROM cursos WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $idCurso);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getFromTable($table){
        $array = array();

        $sql = "SELECT * FROM $table";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getFromTableWhere($table, $where){
        $array = array();

        $sql = "SELECT * FROM $table WHERE $where";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getPeriodos($id_curso){
        $array = array();

        $sql = "SELECT * FROM periodos WHERE  id_curso = $id_curso ORDER BY sequencia ASC";
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();

            for($q=0;$q<count($array);$q++){
                $array[$q]['curso'] = $this->getFromTableWhere('cursos', 'id ='.$id_curso);
            }
        }

        return $array;
    }

    public function editarCurso($nome_curso, $abrev, $area, $curso_nos_documentos, $cod_inep, $cod_modalidade_inep, $cod_polo_de_ed_dist_inep, $grade_unica, $grade_unica_excecao, $educacao_a_distancia, $coordenador_curso, $coordenador_estagio, $titulo, $titulacao, $eixo_tecnologico, $area_conhecimento, $area_concentracao, $habilitacao, $autorizacao, $reconhecimento, $renovacao_reconhecimento, $amparo_legal, $perfil_profissional, $observacao, $prefixo_curso, $mostrar_faltas, $separar_garga_horaria_pratica, $separar_carga_horaria_dispensa, $mostrar_ano_semestre, $mostrar_titulo_periodo, $subistituir_dispensa, $subistituir_pendente, $nome_ch, $abrev_ch, $nome_ch_anual, $abrev_ch_anual, $curso_equival, $observacao_historico, $periodo_letivo, $desbloquear_prof, $id){
        $sql = "UPDATE cursos SET id_coordenador = :id_coordenador, nome_curso = :nome_curso, abrev = :abrev, area = :area, curso_no_doc = :curso_no_doc, cod_inep = :cod_inep, cod_mod_inep = :cod_mod_inep, cod_polo_ed_dist = :cod_polo_ed_dist, grade_unica = :grade_unica, grade_unica_excecao = :grade_unica_excecao, educacao_distancia = :educacao_distancia, titulo = :titulo, titulacao = :titulacao, eixo_tecnologico = :eixo_tecnologico, area_conhecimento = :area_conhecimento, area_concentracao = :area_concentracao, habilitacao = :habilitacao, autorizacao = :autorizacao, reconhecimento = :reconhecimento, renovacao_conhecimento = :renovacao_conhecimento, amparo_legal = :amparo_legal, perfil_profissional = :perfil_profissional, observacao = :observacao, prefixo_curso = :prefixo_curso, mostrar_faltas = :mostrar_faltas, separar_carg_hor_pratica = :separar_carg_hor_pratica, separar_carg_hor_dispensa = :separar_carg_hor_dispensa, mostrar_ano_semestre = :mostrar_ano_semestre, mostrar_titulo_periodo = :mostrar_titulo_periodo, substituir_dispensa_aproveitamento = :substituir_dispensa_aproveitamento, substituir_pendente_acursar = :substituir_pendente_acursar, nome_ch = :nome_ch, abrev_ch = :abrev_ch, nome_ch_anual = :nome_ch_anual, abrev_ch_anual = :abrev_ch_anual, id_curso_equivalencia = :id_curso_equivalencia, observacao_historico = :observacao_historico, periodo_letivo_encerrado = :periodo_letivo_encerrado, desbloq_prof_ano_let_1 = :desbloq_prof_ano_let_1 WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_coordenador', $coordenador_curso);
        $sql->bindValue(':nome_curso', $nome_curso);
        $sql->bindValue(':abrev', $abrev);
        $sql->bindValue(':area', $area);
        $sql->bindValue(':curso_no_doc', $curso_nos_documentos);
        $sql->bindValue(':cod_inep', $cod_inep);
        $sql->bindValue(':cod_mod_inep', $cod_modalidade_inep);
        $sql->bindValue(':cod_polo_ed_dist', $cod_polo_de_ed_dist_inep);
        $sql->bindValue(':grade_unica', $grade_unica);
        $sql->bindValue(':grade_unica_excecao', $grade_unica_excecao);
        $sql->bindValue(':educacao_distancia', $educacao_a_distancia);
        $sql->bindValue(':titulo', $titulo);
        $sql->bindValue(':titulacao', $titulacao);
        $sql->bindValue(':eixo_tecnologico', $eixo_tecnologico);
        $sql->bindValue(':area_conhecimento', $area_conhecimento);
        $sql->bindValue(':area_concentracao', $area_concentracao);
        $sql->bindValue(':habilitacao', $habilitacao);
        $sql->bindValue(':autorizacao', $autorizacao);
        $sql->bindValue(':reconhecimento', $reconhecimento);
        $sql->bindValue(':renovacao_conhecimento', $renovacao_reconhecimento);
        $sql->bindValue(':amparo_legal', $amparo_legal);
        $sql->bindValue(':perfil_profissional', $perfil_profissional);
        $sql->bindValue(':observacao', $observacao);
        $sql->bindValue(':prefixo_curso', $prefixo_curso);
        $sql->bindValue(':mostrar_faltas', $mostrar_faltas);
        $sql->bindValue(':separar_carg_hor_pratica', $separar_garga_horaria_pratica);
        $sql->bindValue(':separar_carg_hor_dispensa', $separar_carga_horaria_dispensa);
        $sql->bindValue(':mostrar_ano_semestre', $mostrar_ano_semestre);
        $sql->bindValue(':mostrar_titulo_periodo', $mostrar_titulo_periodo);
        $sql->bindValue(':substituir_dispensa_aproveitamento', $subistituir_dispensa);
        $sql->bindValue(':substituir_pendente_acursar', $subistituir_pendente);
        $sql->bindValue(':nome_ch', $nome_ch);
        $sql->bindValue(':abrev_ch', $abrev_ch);
        $sql->bindValue(':nome_ch_anual', $nome_ch_anual);
        $sql->bindValue(':abrev_ch_anual', $abrev_ch_anual);
        $sql->bindValue(':id_curso_equivalencia', $curso_equival);
        $sql->bindValue(':observacao_historico', $observacao_historico);
        $sql->bindValue(':periodo_letivo_encerrado', $periodo_letivo);
        $sql->bindValue(':desbloq_prof_ano_let_1', $desbloquear_prof);
        $sql->bindValue(':id', $id);
        $sql->execute();

        return true;
    }
}