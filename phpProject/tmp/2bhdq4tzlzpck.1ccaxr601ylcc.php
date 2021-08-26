<?php echo $this->render('header.html',NULL,get_defined_vars(),0); ?>

<body>
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
    <div class="auctionItem bg-light">
        <table class="table table-bordered">
            <?php foreach (($data?:[]) as $item): ?>
                <tdbody>
                    <tr>
                        <td colspan="5"><strong><a href="items/<?= ($item['id']) ?>"><?= ($item['name']) ?></a></strong></td>
                    </tr>
                    <tr>
                        <?php foreach (($user?:[]) as $key=>$hein): ?>
                            <?php if ($item['user_id']== $hein['id']): ?>
                                <td colspan="5"><a href="items/<?= ($item['id']) ?>">Sold by <?= ($hein['firstname']) ?> <?= ($hein['lastname']) ?></a></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td colspan="5"><a href="items/<?= ($item['id']) ?>"><?= ($item['description']) ?></a></td>
                    </tr>

                    <tr>
                        <td><?= ($item['bidenddate']) ?></td>
                        <td><?= ($item['startingbid']) ?></td>
                        <td>totalBids</td>
                        <!--Logged in users only-->
                        <td>currentBid</td>
                        <!--Logged in users only-->
                    <tr>
                        <td>winnerName</td>
                        <!--Available for expired items only-->
                        <td>winnerBid</td>
                        <!--Available for expired items only-->
                    </tr>
                </tdbody>
            <?php endforeach; ?>
        </table>

    </div>


</body>
<?php echo $this->render('footer.html',NULL,get_defined_vars(),0); ?>