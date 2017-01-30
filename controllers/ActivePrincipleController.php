<?php
    require_once('../models/ActivePrinciple.php');
    class ActivePrincipleController {

        public static function create(){
            if ($_POST['name'] != '') {
                $active = new ActivePrinciple($_REQUEST);
                try {
                    $active->create();
                    $_SESSION['msg'] = 'Usuário criado com sucesso!';
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'Erro ao criar usuário!';
                }
            }
            header('Location:../views/activeprinciple-list.php');
        }

        public static function update(){
            if ($_POST['name'] != '') {
                $active = new ActivePrinciple($_REQUEST);
                try {
                    $active->update();
                    $_SESSION['msg'] = 'Usuário editado com sucesso!';
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'Erro ao editar usuário!';
                }
            }
            header('Location:../views/activeprinciple-list.php');
        }

        public static function delete(){
            $active = new ActivePrinciple($_REQUEST);
            if (!empty($active->id)) {
                try {
                    $active->delete();
                    $_SESSION['msg'] = 'Usuário deletado com sucesso!';
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'Erro ao deletar usuário!';
                }
            }
            header('Location:../views/activeprinciple-list.php');
        }

        public static function selectActivePrinciple($id) {
            if (!empty($id)) {
                try {
                    $active = ActivePrinciple::readActivePrinciple($id);
                    $_SESSION['msg'] = "Sucesso ao ler um usuário.";
                    return $active;
                }
                catch (pdoexception $e) {
                    $_SESSION['msg'] = "Falha ao ler um usuário.";
                }
            }
        }

        public static function getActivePrinciple($id) {
            if (!empty($id)) {
                try {
                    $active = ActivePrinciple::getActivePrinciple($id);
                    $_SESSION['msg'] = "Sucesso ao ler um usuário.";
                    return $active;
                }
                catch (pdoexception $e) {
                    $_SESSION['msg'] = "Falha ao ler um usuário.";
                }
            }
        }

        public static function selectAllActivePrinciples() {
            try {
                $actives = ActivePrinciple::readAllActivePrinciples();
                $_SESSION['msg'] = "Todos os usuários foram lidos com sucesso";
                return $actives;
            }
            catch (pdoexception $e) {
                $_SESSION['msg'] = "Falha ao ler todos os usuários";
            }
        }

    }
    $postActions = array('create', 'update', 'delete');
    if (isset($_POST['action']) && in_array($_POST['action'], $postActions)) {
        $action = $_POST['action'];
        ActivePrincipleController::$action();
    }