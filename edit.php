<?php
include_once("templates/header.php");
?>

<main>
    <div class="container">
        <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title">Editar Contato</h1>
        <form action="config/process.php" method="POST">
            <div class="form-group" id="edit-form">
                <div class="mb-3">
                    <label class="form-label" for="name">Nome</label>
                    <input class="form-control" type="text" name="name" value="<?= $contact["name"] ?>" placeholder="Preencha o nome do contato" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="phone">Telefone</label>
                    <input class="form-control" type="text" name="phone" value="<?= $contact["phone"] ?>" placeholder="Número de Telefone" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="observation">Observações</label>
                    <textarea class="form-control" name="observations" placeholder="Observações sobre o contato" required><?= $contact["observations"] ?></textarea>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="type" value="update">
                    <input type="hidden" name="id" value="<?= $contact["id"] ?>">
                    <button type="submit" class="btn btn-primary mb-3">Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php
include_once("templates/footer.php");
?>