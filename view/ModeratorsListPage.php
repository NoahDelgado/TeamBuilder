<div class="container">
    <ul class="list-group">
        <?php foreach ($members as $member) : ?>
            <li class="list-group-item">
                <?= $member->name ?>
            </li>
        <?php endforeach ?>
    </ul>
</div>