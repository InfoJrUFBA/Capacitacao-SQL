<?php
    require_once('../controllers/MedicineController.php');
    require_once('../controllers/ActivePrincipleController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../includes/layouts/head.inc'; ?>
        <title>Listar Medicamentos</title>
    </head>
    <body>
        <?php $medicines = MedicineController::selectAllMedicines() ?>
        <label>Todos os medicamentos:</label>
        <?php foreach ($medicines as $medicine) : ?>
            <div>
                <?php $generic = $medicine->generic == 1 ? 'Genérico' : 'Marca Original';
                $activePrinciple = ActivePrincipleController::selectActivePrinciple($medicine->active_principle_id);
                echo $medicine->id.' - '.$medicine->name.' - '.$activePrinciple->name.' - '.$generic;
                 ?>
                <form action="../controllers/MedicineController.php?id=<?php echo $medicine->id; ?>" enctype="multipart/form-data" method="POST">
                    <button name="action" value="delete">Deletar</button>
                </form>
            </div>
        <?php endforeach ?>
    </body>
</html>