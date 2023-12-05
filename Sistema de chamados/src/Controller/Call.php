<?php

namespace QI\SistemaDeChamados\Controller;

use Exception;
use QI\SistemaDeChamados\Model\{Call, Equipment, User};
use QI\SistemaDeChamados\Model\Repository\CallRepository;

require_once dirname(dirname(__DIR__)) . "/vendor/autoload.php";

session_start();
switch ($_GET["operation"]) {
    case "insert":
        insert();
        break;
    case "findAll":
        findAll();
        break;
    case "delete":
        delete();
        break;
    default:
        $_SESSION["msg_warning"] = "Operação inválida!!!";
        header("location:../View/message.php");
        exit;
}

function insert()
{
    if (empty($_POST)) {
        $_SESSION["msg_error"] = "Ops. Houve um erro inesperado!!!";
        header("../View/message.php");
        exit;
    }
    $user = new User($_POST["user_email"]);
    $user->name = $_POST["user_name"];
    $user->id = 1;

    $equipment = new Equipment(
        $_POST["floor"],
        $_POST["room"]
    );
    $equipment->id = $_POST["pc_number"];

    $call = new Call(
        $user,
        $equipment,
        $_POST["description"],
        $_POST["classification"]
    );

    // TODO Validar os dados do POST
    $errors = array();
    if (!empty($errors)) {
        // TODO MOSTRAR OS ERROS NA TELA DE MENSAGEM
    }
    try {
        $call_repository = new CallRepository();
        $result = $call_repository->insert($call);
        if ($result) {
            $_SESSION["msg_success"] = "Chamado registrado com sucesso!!!";
        } else {
            $_SESSION["msg_warning"] = "Lamento, não foi possível registrar o chamado!!!";
        }
    } catch (Exception $e) {
        $_SESSION["msg_error"] = "Ops, houve um erro inesperado em nossa base de dados!!!";

        $log = $e->getFile() . " - " . $e->getLine() . " - " . $e->getMessage();
        Logger::writeLog($log);
    } finally {
        header("location:../View/message.php");
        exit;
    }
}

function findAll()
{
    $call_repository = new CallRepository();
    $_SESSION["list-of-calls"] = $call_repository->findAll();
    header("location:../View/list-of-calls.php");
}

function delete(){
    $id = $_GET["code"];
    if(empty($id)){
        $_SESSION["msg_error"] = "O código do chamado é inválido!!!";
        header("location:../View/message.php");
        exit;
    }
    try{
        $call_repository = new CallRepository();
        $result = $call_repository->delete($id);
        if($result){
            $_SESSION["msg_success"] = "Chamado removido com sucesso!!!";
        }else{
            $_SESSION["msg_warning"] = "Lamento, não foi possível remover o chamado";
        }
    }catch(Exception $e){
        $_SESSION["msg_error"] = "Ops. Houve um erro inesperado em nossa base de dados!!!";
        $log = $e->getFile() . " - " . $e->getLine() . " - " . $e->getMessage();
        Logger::writeLog($log);
    }finally{
        header("location:../View/message.php");
    }
}
