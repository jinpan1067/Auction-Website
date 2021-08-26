<?php echo $this->render('header.html',NULL,get_defined_vars(),0); ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Title-Auction info</h2>
            </div>
            <div class="col" style="text-align:end;margin-top:20px;margin-right: 40px;">
                <!-- <input type="checkbox" id="ended" name="ended" value="ended">
                <label for="ended"> Ended Auctions Only</label> -->

                <a href="ended_true">Show ended only</a> <br>
                <a href="ended_false">Show all items</a>
            </div>
        </div>
    </div>
    

    <div class="auctionItem bg-light">

        <?php if (empty($endedItems)): ?>
            



        <table class="table table-bordered">
            <?php foreach (($data?:[]) as $item): ?>
                <tdbody>
                    <tr>
                        <td colspan="5"><strong><a href="items/<?= ($item['id']) ?>"><?= ($item['name']) ?></a></strong></td>
                    </tr>
                    <tr>
                        <?php foreach (($user?:[]) as $key=>$hein): ?>
                            <?php if ($item['user_id']== $hein['id']): ?>
                                <td colspan="5">Sold by <?= ($hein['firstname']) ?> <?= ($hein['lastname']) ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td colspan="5"><?= ($item['description']) ?></td>
                    </tr>

                    <tr>
                        <td><?= ($item['bidenddate']) ?></td>
                        <td><?= ($item['startingbid']) ?></td>
                        <td>Total Bids:</td>
                        <!--Logged in users only-->
                        <td>Current Bid:</td>
                        <!--Logged in users only-->
                    <tr>
                        <td>Winner:</td>
                        <!--Available for expired items only-->
                        <td>Winner Bid:</td>
                        <!--Available for expired items only-->
                      
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                    </tr>
                </tdbody>
            <?php endforeach; ?>
        </table>
      
  

     <?php else: ?>
        <table class="table table-bordered">
            <?php foreach (($endedItems?:[]) as $item): ?>
                <tdbody>
                    <tr>
                        <td colspan="5"><strong><a href="items/<?= ($item['id']) ?>"><?= ($item['name']) ?></a></strong></td>
                    </tr>
                    <tr>
                        <?php foreach (($user?:[]) as $key=>$hein): ?>
                            <?php if ($item['user_id']== $hein['id']): ?>
                                <td colspan="5">Sold by <?= ($hein['firstname']) ?> <?= ($hein['lastname']) ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td colspan="5"><?= ($item['description']) ?></td>
                    </tr>

                    <tr>
                        <td><?= ($item['bidenddate']) ?></td>
                        <td><?= ($item['startingbid']) ?></td>
                        <td>Total Bids:</td>
                        <!--Logged in users only-->
                        <td>Current Bid:</td>
                        <!--Logged in users only-->
                    <tr>
                        <td>Winner: <?= ($item['uname']) ?></td>
                       <!--Available for expired items only-->
                        <td>Winner Bid: <?= ($item['maxBid']) ?></td>
                      
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                    </tr>
                </tdbody>
            <?php endforeach; ?>
        </table>
    
<?php endif; ?>
</div>
</body>
<?php echo $this->render('footer.html',NULL,get_defined_vars(),0); ?>