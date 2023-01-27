<?php
include_once("templates/header.php");
?>

<main>
    <div class="container">
        <?php include_once("templates/backbtn.html"); ?>
        <div class="container border border-dark bg-primary text-light shadow-lg rounded" id="view-contact-container">
            <h1 id="main-title"><?= $contact['name'] ?></h1> 
            <p class="fw-bold">Telefone:</p>
            <p><?= $contact['phone'] ?></p>
            <p class="fw-bold">Descrição:</p>
            <p><?= $contact['observations'] ?></p>
        </div>
    </div>
</main>

<?php
include_once("templates/footer.php");
?>