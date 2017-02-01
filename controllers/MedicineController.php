<?php
    require_once('../models/Medicines.php');
    class MedicineController {

        public static function create(){
            if ($_POST['name'] != '' &&  $_POST['generic'] != ''  &&  $_GET['active_principle_id'] != '') {
                $medicine = new Medicine($_REQUEST);
                try {
                    $medicine->create();
                    $_SESSION['msg'] = 'Usuário criado com sucesso!';
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'Erro ao criar usuário!';
                }
            }
            header('Location:../views/medicine-list.php');
        }

        public static function delete(){
            $medicine = new Medicine($_REQUEST);
            if (!empty($medicine->id)) {
                try {
                    $medicine->delete();
                    $_SESSION['msg'] = 'Usuário deletado com sucesso!';
                }
                catch(pdoexception $e) {
                    $_SESSION['msg'] = 'Erro ao deletar usuário!';
                }
            }
            header('Location:../views/medicine-list.php');
        }

        public static function selectMedicine($id) {
            if (!empty($id)) {
                try {
                    $medicine = Medicine::readMedicine($id);
                    $_SESSION['msg'] = "Sucesso ao ler um usuário.";
                    return $medicine;
                }
                catch (pdoexception $e) {
                    $_SESSION['msg'] = "Falha ao ler um usuário.";
                }
            }
        }

        public static function getMedicine($name) {
            if (!empty($name)) {
                try {
                    $medicine = Medicine::getMedicine($name);
                    $_SESSION['msg'] = "Sucesso ao ler um usuário.";
                    return $medicine;
                }
                catch (pdoexception $e) {
                    $_SESSION['msg'] = "Falha ao ler um usuário.";
                }
            }
        }

        public static function selectAllMedicines() {
            try {
                $medicines = Medicine::readAllMedicines();
                $_SESSION['msg'] = "Todos os usuários foram lidos com sucesso";
                return $medicines;
            }
            catch (pdoexception $e) {
                $_SESSION['msg'] = "Falha ao ler todos os usuários";
            }
        }

    }
    $postActions = array('create', 'delete');
    if (isset($_POST['action']) && in_array($_POST['action'], $postActions)) {
        $action = $_POST['action'];
        MedicineController::$action();
    }