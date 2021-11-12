<div class="container">
    <ul class="list-group">
        <?php foreach ($members as $member) : ?>
            <li class="list-group-item">
                <form action="?controller=userprofil&task=moderator" accept-charset="UTF-8" method="post">
                    <input type="hidden" name="id" value="<?= $member->id ?>" />
                    <input type="submit" name "send" value="<?= $member->name ?>">
                </form>
                <?php foreach ($member->team() as $team) : ?>
                    <div justify-content-between>
                        <small> <?= $team->name ?></small>
                    </div>
                <?php endforeach ?>
            </li>
        <?php endforeach ?>
    </ul>
</div>