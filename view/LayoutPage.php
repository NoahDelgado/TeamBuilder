<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Teambuilder</title>
</head>

<body>
    <header class="heading">
        <section class="container">
            <div>
                Version: Début Examen - Noah
            </div>
        </section>
    </header>
    <div class="container">
        <h1>Teambuilder</h1>
        <p>Utilisateur connecté:
            <a href="?controller=userprofil&task=index"> <?= $_SESSION['userLog']->name ?></a>
        </p>
    </div>
    <?= $pageContent ?>
</body>

</html>