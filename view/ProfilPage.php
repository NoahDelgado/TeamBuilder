<div class="container">
    <p>Nom : <?= $member->name ?></p>
    <p>Status : <?= $member->statu()->name ?></p>
    <p>Role : <?= $member->role()->name ?></p>

</div>
<?php
if ($moderateTeam == null && $memberTeam == null) {
?>
    <h1>Inscrit dans aucune équipe </h1>
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