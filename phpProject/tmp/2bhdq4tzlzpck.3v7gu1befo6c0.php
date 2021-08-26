
<?php echo $this->render('header.html',NULL,get_defined_vars(),0); ?>

<body >

    <h1>Let's create your account</h1>
  
  
  
    <?php if ($error): ?>
      <div class="alert alert-danger" role="alert"><?= ($error) ?></div>
    <?php endif; ?>
  
  <form method="POST" action ="RegisterUser">
    
      
  
      <div class="form-group col-md-6">
        <label for="inputPassword4">User Name:</label>
        <input type="text" class="form-control"   name ="username">
      </div>
    
      <div class="form-group col-md-6">
        <label for="inputPassword4">first Name:</label>
        <input type="text" class="form-control"   name ="firstname">
      </div>
  
      <div class="form-group col-md-6">
        <label for="inputPassword4">last Name:</label>
        <input type="text" class="form-control"  name ="lastname">
      </div>
  
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name ="email">
    </div>
  
    <input type="submit" class="btn btn-secondary mt-2" value="Submit">
  </form>
      
  </body>
  <?php echo $this->render('footer.html',NULL,get_defined_vars(),0); ?>