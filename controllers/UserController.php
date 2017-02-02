<?php
    require_once('../models/Users.php');
    require_once('../models/UserNeedsMedicine.php');
    class UserController {

        public static function create(){
            if ($_POST['email'] != '' && $_POST['name'] != '' &&  $_POST['age'] != ''  &&  $_POST['insurance'] != '') {
                $user = new User($_REQUEST);
                try {
                    $user->create();
                    $_SESSION['msg'] = 'Usuário criado com sucesso!';
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'Erro ao criar usuário!';
                }
            }
            header('Location:../views/user-list.php');
        }

        public static function update(){
            if ($_POST['email'] != '' && $_POST['name'] != '' &&  $_POST['age'] != ''  &&  $_POST['insurance'] != '') {
                $user = new User($_REQUEST);
                try {
                    $user->update();
                    $_SESSION['msg'] = 'Usuário editado com sucesso!';
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'Erro ao editar usuário!';
                }
            }
            header('Location:../views/user-list.php');
        }

        public static function delete(){
            $user = new User($_REQUEST);
            if (!empty($user->id)) {
                try {
                    $user->delete();
                    $_SESSION['msg'] = 'Usuário deletado com sucesso!';
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'Erro ao deletar usuário!';
                }
            }
            header('Location:../views/user-list.php');
        }

        public static function selectUser($id) {
            if (!empty($id)) {
                try {
                    $user = User::readUser($id);
                    $_SESSION['msg'] = "Sucesso ao ler um usuário.";
                    return $user;
                }
                catch (pdoexception $e) {
                    $_SESSION['msg'] = "Falha ao ler um usuário.";
                }
            }
        }

        public static function getUser($email) {
            if (!empty($email)) {
                try {
                    $user = User::getUser($email);
                    $_SESSION['msg'] = "Sucesso ao ler um usuário.";
                    return $user;
                }
                catch (pdoexception $e) {
                    $_SESSION['msg'] = "Falha ao ler um usuário.";
                }
            }
        }

        public static function selectAllUsers() {
            try {
                $users = User::readAllUsers();
                $_SESSION['msg'] = "Todos os usuários foram lidos com sucesso";
                return $users;
            }
            catch (pdoexception $e) {
                $_SESSION['msg'] = "Falha ao ler todos os usuários";
            }
        }

        public static function fetchUserMedicines($id){
            try{
                $medicines = UserNeedsMedicine::fetchUserMedicines($id);
                $_SESSION['msg'] = "Todos os usuários foram lidos com sucesso";
                return $medicines;
            }
            catch (pdoexception $e) {
                $_SESSION['msg'] = "Falha ao ler todos os usuários";
            }
        }

        public static function getUserMedicines($id){
            try{
                $medicines = UserNeedsMedicine::getUserMedicines($id);
                $_SESSION['msg'] = "Todos os usuários foram lidos com sucesso";
                return $medicines;
            }
            catch (pdoexception $e) {
                $_SESSION['msg'] = "Falha ao ler todos os usuários";
            }
        }

        public static function deleteNeedForMedicine($medicines_id){
            if (!empty($medicines_id)) {
                try {
                    $medicine = new Medicine($_REQUEST);
                    $medicine->delete();
                    $_SESSION['msg'] = 'Usuário deletado com sucesso!';
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'Erro ao deletar usuário!';
                }
            }
            header('Location:../views/user-list.php');
        }

        
        public static function countMedicinesUsedBy($id) {
            if (!empty($id)) {
                try {
                    $number = User::countMedicinesUsedBy($id);
                    $_SESSION['msg'] = "Sucesso ao ler um usuário.";
                    return $number;
                }
                catch (pdoexception $e) {
                    $_SESSION['msg'] = "Falha ao ler um usuário.";
                }
            }
        }
    }
    $postActions = array('create', 'update', 'delete', 'deleteNeedForMedicine');
    if (isset($_POST['action']) && in_array($_POST['action'], $postActions)) {
        $action = $_POST['action'];
        UserController::$action();
    }