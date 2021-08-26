
<?php echo $this->render('header.html',NULL,get_defined_vars(),0); ?>


<body>
    <div class="container">
<h1>Welcome to the best auction ever!</h1>
<p class="lead">
    An online auction is a service in which auction users or participants sell or bid for products or services via the Internet.</br>
    Virtual auctions facilitate online activities between buyers and sellers in different locations or geographical areas. ...</br>
    An online auction is also known as a virtual auction.</br>
</p>
<h2>Recently added items</h2>

<!-- <div class="album py-5 bg-light">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
     <?php foreach (($data?:[]) as $item): ?>
      <div class="col">
        <div class="card shadow-sm">
         
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Picture</text></svg>

          <div class="card-body">
            <p class="card-text"><?= ($item['name']) ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                <button type="button" class="btn btn-sm btn-outline-secondary" style="color: red;">Bid</button>
              </div>
              <small class="text-muted"><?= ($item['bidenddate']) ?></small>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
</div> 
</div> -->

<table class="table">
    <thead class="thead-light">
      <tr>
        <th>Name</th>
        <th>Desciption</th>
        <th>Starting Price</th>
        <th>End Date</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (($data?:[]) as $item): ?>
        <tr>
          <td><?= ($item['name']) ?></td>
          <td><?= ($item['description']) ?></td>
          <td><?= ($item['startingbid']) ?></td>
          <td><?= ($item['bidenddate']) ?></td>
          
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</div>
</body>

<?php echo $this->render('footer.html',NULL,get_defined_vars(),0); ?>

