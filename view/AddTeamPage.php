<div class="container">
    <h1>Teambuilder</h1>
    <p>Utilisateur connecté: <?= $_SESSION['userLog']->name ?></p>
</div>


<div class="container">
    <form action="/?controller=addteam&task=AddTeam" accept-charset="UTF-8" method="post">

        <div class="field">
            <label for="Nom">Nom</label>
            <input type="text" name="name" id="Nom" />
        </div>
        <div class="actions">
            <input type="submit" name="commit" />
        </div>
    </form>
</div>