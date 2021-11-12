<div class="container">
    <form action="?controller=userprofil&task=Validate" accept-charset="UTF-8" method="post">
        <p>Nom :</p>
        <input type="text" name="name" value="<?= $member->name ?>" />
        <p>Status : <?= $member->statu()->name ?></p>
        <p>Role : <?= $member->role()->name ?></p>

</div>
<?php
if ($moderateTeam == null && $memberTeam == null) {
?>
    <div class="container">
        <h1>Inscrit dans aucune équipe </h1>
    </div>
    <?php

} else {
    if ($moderateTeam != null) {
    ?>
        <div class="container">
            <h1>Capitaine de : </h1>
            <ul class="list-group">
                <?php foreach ($moderateTeam as $teams) : ?>
                    <li class="list-group-item">
                        <?= $teams->name ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php
    }
    if ($memberTeam != null) {
    ?>
        <div class="container">
            <h1>Membre de : </h1>
            <ul class="list-group">
                <?php foreach ($memberTeam as $teams) : ?>
                    <li class="list-group-item">
                        <?= $teams->name ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php
    }
    ?>
<?php
}
?>
<div class="container">
    <p></p>
    <form action="?controller=userprofil&task=Validate" accept-charset="UTF-8" method="post">
        <input type="hidden" name="id" value="<?= $member->id ?>" />
        <input type="submit" name "send" value="Valider">
    </form>
</div>