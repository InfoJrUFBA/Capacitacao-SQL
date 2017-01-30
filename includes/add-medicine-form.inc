<?php
    require_once('../controllers/ActivePrincipleController.php');
    if(empty($_GET['active_principle_id'])){
        header('Location:../views/medicine-list.php');
    }
    else{
        $activePrinciple = ActivePrincipleController::selectActivePrinciple($_GET['active_principle_id']);
    }
?>
<form action="../controllers/MedicineController.php?active_principle_id=<?php echo $activePrinciple->id ?>" enctype="multipart/form-data" method="POST">
    <h3>Novo Medicamento com <?php echo $activePrinciple->name ?> como princípio ativo:</h3>
    <label>Nome:</label><br>
    <input type="text" name="name" placeholder="Digite seu nome" required><br>
    <label>Marca:</label><br>
    <input type="radio" name="generic" value=1>Genérico<br>
    <input type="radio" name="generic" value=0>Marca Original<br>
    <button name="action" value="create">Enviar</button>
</form>