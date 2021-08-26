<!-- pan 10:59 -->
<?php echo $this->render('header.html',NULL,get_defined_vars(),0); ?>
<body >
<h1>History about your items</h1>

<table class="table">
    <thead class="thead-light">
      <tr>
        <th>Name</th>
        <th>Desciption</th>
        <th>Starting Price</th>
        <th>End Date</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (($userData?:[]) as $item): ?>
        <tr>
          <td><?= ($item['name']) ?></td>
          <td><?= ($item['description']) ?></td>
          <td><?= ($item['startingbid']) ?></td>
          <td><?= ($item['bidenddate']) ?></td>
          <td><a href="delete/<?= ($item['id']) ?>" class="btn btn-danger btn-sm" role="button">Remove</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>



  <h1>history about your bids</h1>

  <table class="table">
    <thead class="thead-light">
      <tr>
        <th>items id</th>
        <th>Bid amount</th>
        <th>Bid date</th>
        
      </tr>
    </thead>
    <tbody>
      <?php foreach (($bidsData?:[]) as $bidItem): ?>
        <tr>
          <td><?= ($bidItem['item_id']) ?></td>
          <td><?= ($bidItem['bidamount']) ?></td>
          <td><?= ($bidItem['biddatetime']) ?></td>
          
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>





</body>
  <?php echo $this->render('footer.html',NULL,get_defined_vars(),0); ?>
