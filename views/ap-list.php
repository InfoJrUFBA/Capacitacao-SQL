<?php require_once('../controllers/ActivePrincipleController.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../includes/layouts/head.inc'; ?>
        <title>Listar Princípios Ativos</title>
    </head>
    <body>
        <?php $activePrinciples = ActivePrincipleController::selectAllActivePrinciples() ?>
        <label>Todos os princípios ativos:</label>
        <?php foreach ($activePrinciples as $activePrinciple) : ?>
            <div>
                <?php
                    $numberOfMedicines = ActivePrincipleController::countMedicinesUsing($activePrinciple->id);
                    echo $activePrinciple->id.' - '.$activePrinciple->name.' - '.$numberOfMedicines->medicinesFromID.' Medicamentos usam este princípio ativo';
                ?><br>
                <a href="update-ap.php?id=<?php echo $activePrinciple->id ?>"><button>Editar</button></a>
                <form action="../controllers/ActivePrincipleController.php?id=<?php echo $activePrinciple->id; ?>" enctype="multipart/form-data" method="POST">
                    <button name="action" value="delete">Deletar</button>
                </form>
                <a href="add-medicine.php?active_principle_id=<?php echo $activePrinciple->id ?>"">
                    <button>Adicionar Medicamento com este Princípio Ativo</button>
                </a>
            </div>
        <?php endforeach ?><br>
        <a href="add-ap.php">
            <button><h3>Adicionar Princípio Ativo</h3></button>
        </a>
    </body>
</html>