<?php require_once('../controllers/UserController.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../includes/layouts/head.inc'; ?>
        <title>Listar Usuários</title>
    </head>
    <body>
        <?php $users = UserController::selectAllUsers() ?>
        <label>Todos os usuários:</label>
        <?php foreach ($users as $user) : ?>
            <div>
                <?php $insurance = $user->insurance == 1 ? 'Tem seguro' : 'Não tem seguro';
                echo $user->id.' - '.$user->name.' - '.$user->email.' - '.$user->age.' - '.$insurance;
                 ?>
                <a href="update-user.php?id=<?php echo $user->id ?>"><button>Editar</button></a>
                <form action="../controllers/UserController.php?id=<?php echo $user->id; ?>" enctype="multipart/form-data" method="POST">
                    <button name="action" value="delete">Deletar</button>
                </form>
            </div>
        <?php endforeach ?>
        <a href="add-user.php">
            <button>Adicionar Usuário</button>
        </a>
    </body>
</html>