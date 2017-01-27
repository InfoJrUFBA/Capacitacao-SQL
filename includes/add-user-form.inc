<form action="../controllers/UserController.php" enctype="multipart/form-data" method="POST">
    <label>E-mail:</label>
    <input type="email" name="email" placeholder="Digite seu e-mail" required>
    <label>Nome:</label>
    <input type="text" name="name" placeholder="Digite seu nome" required>
    <label>Idade:</label>
    <input type="number" name="age" placeholder="Digite sua idade" required>
    <label>Seguro:</label><br>
    <input type="radio" name="insurance" value=1>Tem seguro<br>
    <input type="radio" name="insurance" value=0>Não tem seguro
    <button name="action" value="create">Enviar</button>
</form>