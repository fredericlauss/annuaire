
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view\css\style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
</head>
<body style="background-color: hsl(0, 0%, 94%);">
    <main>
    <div class="section">
        <div class="wrapper">
            <h2>Annuaire NWS - JPO</h2>
            <div class="mt-3 mb-3">
                <a class="btn btn-outline-success" href="http://localhost/annuaire/">accueil</a>
            </div>
            <?php require_once( __DIR__ . './formCreatJpo.php') ?>
            <?php require_once( __DIR__ . './tableJpo.php') ?>
        </div>
    </div>
    </main>
    <script src="view\js\script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

