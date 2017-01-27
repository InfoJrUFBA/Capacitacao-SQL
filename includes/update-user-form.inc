<?php
    require_once('../controllers/UsersController.php');
    if(empty($_GET['id'])){
        header('Location:../views/user-list.php');
    }
    else{
        $user = UserController::selectUser($_GET['id']);
    }
?>
<form action="../controllers/UsersController.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data" method="POST">
    <label>E-mail:</label>
    <input type="email" name="email" placeholder="Digite seu e-mail" value="<?php echo $user->email; ?>" required>
    <label>Nome:</label>
    <input type="text" name="name" placeholder="Digite seu nome" value="<?php echo $user->name; ?>" required>
    <label>Level:</label><br>
    <input type="radio" name="level" value=1 <?php if(isset($user) && $user->level==1) echo "checked"; ?>>1<br>
    <input type="radio" name="level" value=2 <?php if(isset($user) && $user->level==2) echo "checked"; ?>>2<br>
    <button name="action" value="update">Enviar</button>
</form>