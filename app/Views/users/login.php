<div class="container">
  
         <?= \Config\Services::validation()->listErrors(); ?>
          <?php if (isset($success_message)) { ?> 
            <div class="alert alert-success"><?= $success_message ?></div>
          <?php } ?>
          <?php if (isset($error_message)) { ?> 
            <div class="alert alert-danger"><?= $error_message ?></div>
          <?php } ?>
          <div class="jumbotron">
              <div class="row">
              <div class="col-lg-4">
                <div class="my-login-form-container">
                  <form action="login" method="POST" enctype="multipart/form-data" >
                  <div class="form-group">
                        <label for="username">Username</label>
                        <input required type="text" class="form-control" id="username" name="username">
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input required type="password" class="form-control" id="password" name="password">
                  </div>
                     <button type="submit" class="btn btn-primary">Login</button> | <a href="<?= base_url().'myevents/public/users/signup' ?>">Sign up </a>
                  </form>
                </div>
              </div>
              <div class="col-lg-1"></div>
              <div class="col-lg-7">
                <h1>My Event Manager</h1>
                <p class="lead">Manage your events in an efficient way...</p>
                <p><a href="<?= base_url().'myevents/public/users/signup' ?>">Sign up</a> now it's free and simple. </p>
              </div>
            </div>
          </div>
<style type="text/css">
  .my-login-form-container {
    background: #bdc3c7;
    /*height: 300px;*/
    width: 100%;
    display: block;
    border-radius: 15px;
    padding: 15px;
  }
</style>
</div>