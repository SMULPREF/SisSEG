<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once 'head.php'?>
 
  <title>SisSEG - Sistema de Segurança e Controle de Acessos</title>
</head>

<body>
  <!-- Section: Design Block -->
  <section class="login-section">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <img src="sisseg.jpg" alt="SISSEG" class="my-5 display-5 fw-bold ls-tight">
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">

              <form action="ldap.php" method="post">

                <div class="form-outline mb-4 div-title-login">
                  <h2 class="title-login">Bem-Vindo</h2>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Login</label>
                  <input type="text" id="usuario" name="usuario" class="form-control" />
                </div>

                <div class="form-outline mb-4">

                  <label class="form-label" for="form3Example4">Senha</label>
                  <input type="password" id="senha" name="senha" class="form-control" />
                </div>

                <input type="submit" class="btn btn-primary btn-block mb-4" value="Login">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
</body>

</html>

<style>
  .div-title-login {
    text-align: center;
  }

  .title-login {
    font-size: 50px;
    margin-bottom: 30px;
    color: #4c76a1;
  }

  .login-section {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #ffffff;
    height: 100vh;
  }

  #radius-shape-1 {
    height: 220px;
    width: 220px;
    top: -60px;
    left: -130px;
    background: radial-gradient(#1300bb, #1f88ff);
    overflow: hidden;
  }

  #radius-shape-2 {
    border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
    bottom: -60px;
    right: -110px;
    width: 300px;
    height: 300px;
    background: radial-gradient(#1300bb, #1f88ff);
    overflow: hidden;
  }

  .bg-glass {
    background-color: hsla(0, 0%, 93%, 0.9) !important;
    backdrop-filter: saturate(200%) blur(25px);
  }

  .ls-tight {
    color: #1f88ff;
    font-size: 5rem;
  }

<<<<<<< HEAD
  </style>
=======
  .btn {
    width: 80px;
    height: 40px;
  }
</style>
>>>>>>> eec65d2437f6da723ba839feb3c38cdfb8dbda23
