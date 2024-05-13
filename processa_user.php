<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try{
        $mysqli = new mysqli("localhost", "root", "", "gestao_3b");
        $nome = $_POST['nomeCompleto'];
        $login = $_POST['login'];
        $telefone = $_POST['telefone'];
        if(filter_var($_POST['nivel'],FILTER_VALIDATE_INT)){
            $nivel = $_POST['nivel'];
        }
        $senha = $_POST['senha'];
        $nome = htmlentities(htmlspecialchars($nome));
        $login = htmlentities(htmlspecialchars($login));
        $telefone = htmlentities(htmlspecialchars($telefone));
        $senha = htmlentities(htmlspecialchars($senha));
        $senha = md5($senha);
        $dataAlteracao = date('Y-m-d H:i:s');
        $stmt = $mysqli->prepare("insert into USUARIOS (nomeCompleto, login, senha, telefone, nivel, dataAlteracao)
        values (?,?,?,?,?,?)");

        if(!$stmt){
            throw new Exception("Preparação da declaração falhou: ".$mysqli->error);
        }
        $stmt->bind_param('ssssis', $nome, $login, $senha, $telefone, $nivel, $dataAlteracao);
        $stmt->execute();
        $stmt = $stmt->get_result();
        if(!$result){
            echo "Dados cadastrados com sucesso!";
        }else{
            echo "Erro ao conectar".mysqli_errno()." - ".mysqli_error();
        }
        $stmt->close();
    }catch(mysqli_sql_exception $e){
        echo "Erro de MYSql: ".$e->getMessage();
    }catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }finally{
        if(isset($mysqli)){
            $mysqli->close();
        }
    }
?>