<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <form action="<?php URLROOT ?>/todo/update" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?=$data["info"]->email?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">voornaam</label>
            <input type="text" class="form-control" id="exampleInputPassword1"name="voornaam" value="<?=$data["info"]->voornaam?>"  required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">achternaam</label>
            <input type="text" class="form-control" id="exampleInputPassword1"name="achternaam" value="<?=$data["info"]->achternaam?>"required>
        </div>
        <input type="hidden" value="<?=$data["info"]->email?>" name="oldemail">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>