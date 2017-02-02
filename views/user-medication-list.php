<?php
    require_once('../controllers/UserController.php');
    require_once('../controllers/MedicineController.php');
    require_once('../controllers/ActivePrincipleController.php');
    if(empty($_GET['id'])){
        header('Location:../views/user-list.php');
    }
    else{
        $user = UserController::selectUser($_GET['id']);
        $medicineList = UserController::fetchUserMedicines($user->id);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../includes/layouts/head.inc'; ?>
        <title>Listar Usuários</title>
    </head>
    <body>
        <label>Todos os medicamentos de <?php echo $user->name ?>:</label>
        <?php foreach ($medicineList as $medicine) : ?>
            <div>
                <?php
                    $generic = $medicine->generic == 1 ? 'Genérico' : 'Marca Original';
                    $activePrinciple = ActivePrincipleController::selectActivePrinciple($medicine->active_principle_id);
                    echo $medicine->id.' - '.$medicine->name.' - '.$activePrinciple->name.' - '.$generic;
                ?>
            </div>
        <?php endforeach ?>
    </body>
</html>