<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>
        <?php if ($title != ''): ?>
        <?= ($title) ?> - 
        <?php else: ?>My Homepage for 
       <?php endif; ?>
        Auction</title>

</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><h3>TheBidz</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

        <!-- Check if user is logged in and change code and web page information if yes -->
        <?php if ($logged_in == false): ?>
            
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="test">Auction</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://localhost:81/teamProject/Registration">Register</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="login" method="post">
            <input class="form-control mr-sm-2" type="text" placeholder="Username" name="login_username">
            <input class="form-control mr-sm-2" type="email" placeholder="Email" name="login_email">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log-In</button>
        </form>
            

            <?php else: ?>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="test">Auction</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:81/teamProject/Registration">Profile</a>
                    </li>
                </ul>
                <p class="nav-item nav-link text-light text-right"> Welcome <?= ($show_name) ?> </p>
                <form class="form-inline my-2 my-lg-0" action="logout" method="post">

                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log-Out</button>
                </form>
            
        <?php endif; ?>
        <!-- End of checking if user is logged in -->
    </div>
</nav>

<?php if ($error_login): ?>
    <div class="alert alert-danger text-right" role="alert"><?= ($error_login) ?></div>
<?php endif; ?>