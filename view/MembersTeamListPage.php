<div class="container">
    <h1>Teambuilder</h1>
    <p>Utilisateur connecté: <?= $_SESSION['userLog']->name ?></p>
</div>


<div class="container">
    <ul class="list-group">
        <?php foreach ($members as $member) : ?>
            <li class="list-group-item">
                <?= $member->name ?>
                <?php foreach ($member->team() as $team) : ?>
                    <div justify-content-between>
                        <small> <?= $team->name ?></small>
                    </div>
                <?php endforeach ?>
            </li>
        <?php endforeach ?>
    </ul>
</div>