<?php
    require_once('../controllers/UserController.php');
    if(empty($_GET['id'])){
        header('Location:../views/user-list.php');
    }
    else{
        $user = UserController::selectUser($_GET['id']);
    }
?>
<form action="../controllers/UserController.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data" method="POST">
    <label>E-mail:</label>
    <input type="email" name="email" placeholder="Digite seu e-mail" value="<?php echo $user->email; ?>" required>
    <label>Nome:</label>
    <input type="text" name="name" placeholder="Digite seu nome" value="<?php echo $user->name; ?>" required>
    <label>Nome:</label>
    <input type="number" name="age" placeholder="Digite seu nome" value="<?php echo $user->age; ?>" required>
    <label>insurance:</label><br>
    <input type="radio" name="insurance" value=1 <?php if(isset($user) && $user->insurance==1) echo "checked"; ?>>Tem seguro<br>
    <input type="radio" name="insurance" value=0 <?php if(isset($user) && $user->insurance==2) echo "checked"; ?>>Não tem seguro<br>
    <button name="action" value="update">Enviar</button>
</form>