<?php
include_once("templates/header.php");
?>

<main>
    <div class="container">
        <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title">Adicionar aos Contatos</h1>
        <form action="config/process.php" method="POST">
            <div class="form-group" id="create-form">
                <div class="mb-3">
                    <label class="form-label" for="name">Nome</label>
                    <input class="form-control" type="text" name="name" placeholder="Preencha o nome do contato" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="phone">Telefone</label>
                    <input class="form-control" type="text" name="phone" placeholder="Número de Telefone" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="observation">Observações</label>
                    <textarea class="form-control" name="observations" placeholder="Observações sobre o contato" required></textarea>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="type" value="create">
                    <button type="submit" class="btn btn-primary mb-3">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php
include_once("templates/footer.php");
?>