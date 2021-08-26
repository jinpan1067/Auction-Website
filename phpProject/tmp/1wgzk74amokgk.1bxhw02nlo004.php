<?php echo $this->render('header.html',NULL,get_defined_vars(),0); ?>
 
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Item Information</h2>
            </div>
            <div class="col" style="text-align:end;margin-top:20px;margin-right: 40px;">
                <input type="checkbox" id="ended" name="ended" value="ended">
                <label for="ended"> Ended Auctions Only</label>
            </div>
        </div>
    </div>
    <div class="auctionItem bg-light">
        <?php foreach (($query?:[]) as $item): ?>
            <table class="table table-bordered">
 
                <tdbody>
                    <tr>
                        <td colspan="5"><strong><?= ($item['name']) ?></strong></td>
                    </tr>
                    <?php foreach (($user?:[]) as $key=>$uItem): ?>
                        <tr>
                            <?php if ($item['user_id']== $uItem['id']): ?>
                                <td colspan="5">Sold by <?= ($uItem['firstname']) ?> <?= ($uItem['lastname']) ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="5"><?= ($item['description']) ?></td>
                    </tr>
 
                    <tr>
                        <td><?= ($item['bidenddate']) ?></td>
                        <td><?= ($item['startingbid']) ?></td>
                        <td>totalBids</td>
                        <!--Logged in users only-->
                        <td>currentBid</td>
                        <th>
                            <form class="form-inline">
                                <label class="sr-only" for="inlineFormInputBids">Bids</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputBids"
                                    name="newBid">
                                <button type="submit" class="btn btn-primary mb-2">Add a Bid</button>
                            </form>
                        </th>
                        <!--Logged in users only-->
                    <tr>
                        <td>winnerName</td>
                        <!--Available for expired items only-->
                        <td>winnerBid</td>
                        <!--Available for expired items only-->
                    </tr>
                </tdbody>
            </table>
            <table class="table table-bordered">
 
                <tdbody>
                    <tr>
                        <th scope="col">Bidder Id</th>
                        <!-- <th scope="col">Bidder Name</th> -->
                        <th scope="col">Bid Date and Time</th>
                        <th scope="col">Bid Amount</th>
                    </tr>
                    <?php foreach (($bid?:[]) as $b): ?>
                        <tr>
 
                            <td><?= ($b['bidder_id']) ?></td>
                            <!-- <?php if ($b['bidder_id']==$uItem['id']): ?>
                                <td><?= ($user['id']) ?></td>
                            <?php endif; ?> -->
                            <td><?= ($b['biddatetime']) ?></td>
                            <td><?= ($b['bidamount']) ?></td>
 
                        </tr>
                    <?php endforeach; ?>
                </tdbody>
            </table>
            <!-- Dont forget to fix the repeat in final document -->
        <?php endforeach; ?>
    </div>
 
 
</body>
<?php echo $this->render('footer.html',NULL,get_defined_vars(),0); ?>