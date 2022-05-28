<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>login</title>
    
</head>
<body>
    
<div class="container" style="margin-top:100px; background">

    <form action="logback.php" method="POST">
            <div class="form-group">
                <h1 class="display-4">Login</h1>
            </div>
            <div class="form-group">
                <input style="width:50%" type="text" required class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input style="width:50%" type="password" required class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="login" name="button">
            </div>
    </form>               
             
</div>
</body>
</html>