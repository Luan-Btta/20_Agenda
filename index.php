<?php
include_once("templates/header.php");
?>

<main>
    <div class="container">
        <?php if(isset($printMsg) && $printMsg!= ''): ?>
            <p id="msg"><?= $printMsg ?></p>
        <?php endif ?>
        <h1 id="main-title">Minha Agenda</h1>
        <?php if(count($contacts) > 0): ?>
            <table class="table table-striped" id="contacts-table">
                <thead class="table bg-primary text-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contacts as $contact): ?>
                        <tr>
                            <td class="col-id" scope="row"><?= $contact['id'] ?></td>
                            <td scope="row"><?= $contact['name'] ?></td>
                            <td scope="row"><?= $contact['phone'] ?></td>
                            <td class="actions">
                                <a href="show.php?id=<?= $contact['id'] ?>"><i class="fas fa-eye check-icon"></i></a>
                                <a href="edit.php?id=<?= $contact['id'] ?>"><i class="fas fa-edit edit-icon"></i></a>
                                <form action="config/process.php" method="POST" class="form-delete">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $contact["id"] ?>">
                                    <button id="button-delete" type="submit" ><i class="fas fa-trash trash-icon"></i>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p id="empty-list-text">Ainda não há contatos em sua agenda, <a href="create.php">clique para adicionar</a></p>
        <?php endif ?>
    </div>
</main>

<?php
include_once("templates/footer.php");
?>