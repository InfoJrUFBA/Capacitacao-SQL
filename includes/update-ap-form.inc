<?php
    require_once('../controllers/ActivePrincipleController.php');
    if(empty($_GET['id'])){
        header('Location:../views/ap-list.php');
    }
    else{
        $activePrinciple = ActivePrincipleController::selectActivePrinciple($_GET['id']);
    }
?>
<form action="../controllers/ActivePrincipleController.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data" method="POST">
    <label>Nome:</label>
    <input type="text" name="name" placeholder="Digite seu nome" value="<?php echo $activePrinciple->name; ?>" required>
    <button name="action" value="update">Enviar</button>
</form>