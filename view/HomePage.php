<div class="container">
    <h1>Teambuilder</h1>
    <p>Utilisateur connecté: <?= $_SESSION['userLog']->name ?></p>
</div>


<div class="container">
    <a href="?controller=membersteamlist&task=index">Liste des membres</a>
    <p>
        <a href="?controller=moderatorslist&task=index">Liste des Modérateur</a>
    </p>
    <p>
        <a href="?controller=addteam&task=index">Crée une équipe</a>
    </p>
</div>