<?php echo $this->render('header.html',NULL,get_defined_vars(),0); ?>

<body >

    <h1>Create an item ?</h1>
  
  
  
    <?php if ($error): ?>
      <div class="alert alert-danger" role="alert"><?= ($error) ?></div>
    <?php endif; ?>
  
  <form method="POST" >
    
      
  
      <div class="form-group col-md-6">
        <label for="inputName">Item Name:</label>
        <input type="text" class="form-control"  id="inputName" name ="name">
      </div>
    
      <div class="form-group col-md-6">
        <label for="inputDescription">Description:</label>
        <textarea  class="form-control" cols="20" rows="5" id="inputDescription" name ="description"></textarea>
      </div>
  
  
    <div class="form-group col-md-6">
      <label for="inputPrice">Starting Price</label>
      <input type="text" class="form-control" id="inputPrice" name ="startingbid">
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputEndDate">End date</label>
      <input type="datetime-local" class="form-control" id="inputEndDate" name ="bidenddate">
    </div>
    
    <div class="form-group col-md-6">  
      <?php foreach (($userData?:[]) as $item): ?><?php endforeach; ?>
      <input type="hidden" class="form-control" id="inputUserId" name="user_id" value ="<?= ($item['user_id']) ?>">
    </div>
  
    <input type="submit" class="btn btn-secondary mt-2" value="Submit">
  </form>
      
  </body>

  <?php echo $this->render('footer.html',NULL,get_defined_vars(),0); ?>