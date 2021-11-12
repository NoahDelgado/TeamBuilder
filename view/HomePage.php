<div class="container">
    <?php if ($_SESSION['userLog']->role_id == 2) {

    ?>
        <a href="?controller=membersteamlist&task=moderator">Liste des membres</a>
    <?php
    } else { ?>
        <a href="?controller=membersteamlist&task=index">Liste des membres</a>
    <?php } ?>
    <p>
        <a href="?controller=moderatorslist&task=index">Liste des Modérateur</a>
    </p>
    <p>
        <a href="?controller=addteam&task=index">Crée une équipe</a>
    </p>
</div>