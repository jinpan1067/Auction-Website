<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Hello, world!</title>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><h3>TheBidz</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/phpAuctionGit/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Auction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Username">
                <input class="form-control mr-sm-2" type="email" placeholder="Email">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log-In</button>
            </form>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Title-Auction info</h2>
            </div>
            <div class="col" style="text-align:end;margin-top:20px;margin-right: 40px;">
                <input type="checkbox" id="ended" name="ended" value="ended">
                <label for="ended"> Ended Auctions Only</label>
            </div>
        </div>
    </div>
    <div class="auctionItem">
        <table class="table table-borderless">
            <?php foreach (($data?:[]) as $key=>$item): ?>
            <tdbody>
                <tr>
                    <td colspan="4" style="text-align: left;">
                        <h5>Sold by <a href="auction/<?= ($item['user_id']) ?>"><?= ($item['user_id']) ?></a></h5>
                        <p>Name/discription</p>
                    </td>
                    <td> <!--Put status there too? Just to make it easier?-->
                        <p id="status">ENDED</p> <!--Available for expired items only-->
                    </td> 
                </tr>
                <tr>
                    <td>
                        <p id="endTime">endTime</p> 
                        <p id="winnerName">winnerName</p> <!--Available for expired items only-->
                    </td>

                    <td>
                        <p id="startBid">startBid</p>
                        <p id="winnerBid">winnerBid</p> <!--Available for expired items only-->
                    </td>

                    <td>
                        <p id="totalBids">totalBids</p> <!--Logged in users only-->
                        </td>
                    <td>
                        <p id="currentBid">currentBid</p> <!--Logged in users only-->
                    </td>      
                </tr>
                </tdbody>
            <?php endforeach; ?>

    </table>
    </div>
    
    
</body>
</html>