<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Login Administrator</title>

  <!-- Favicon -->
  <link href="../assets/img/brand/favicon1.png" rel="icon" type="image/png">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css" rel="stylesheet">

  <!-- Docs CSS -->
  <link type="text/css" href="../assets/css/docs.min.css" rel="stylesheet">
  <script type="text/javascript" src="../assets/vendor/jquery/jquery.min.js"></script>

  <script type="text/javascript">
  $(function(){
     $('.alert').hide();
     $('.login-form').submit(function(){
        $('.alert').hide();
        if($('input[name=username]').val() == ""){
           $('.alert').fadeIn().html('Kotak input <b>Username</b> masih kosong!');
        }else if($('input[name=password]').val() == ""){
           $('.alert').fadeIn().html('Kotak input <b>Password</b> masih kosong!');
        }else{
           $.ajax({
              type : "POST",
              url : "login_cek.php",
              data : $(this).serialize(),
              success : function(data){
                 if(data == "ok") window.location = "index.php";
                 else $('.alert').fadeIn().html(data);
              }
           });
        }
        return false;
     });
  });
  </script>
</head>
<body>

  <main>
    <section class="section section-shaped section-lg">
      <div class="shape shape-style-1 bg-gradient-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="container pt-lg-md">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0">
              <div class="card-body px-lg-5 py-lg-4">
                <div class="text-center text-muted mb-5">
                  <img src="../images/amikom.png" width="30%" class="img-responsive" alt="Logo AMIKOM"/>
                </div>
                <div class="alert alert-danger" role="alert"></div>
                <form class="login-form" accept-charset="UTF-8" role="form">
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" type="text" name="username" placeholder="Username" autofocus>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Password" name="password" type="password">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Core -->
  <script src="../assets/vendor/popper/popper.min.js"></script>
  <script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>

  <!-- Theme JS -->
  <script src="../assets/js/argon.js"></script>
  </body>
</html>
