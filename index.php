<?php
$appear="beforeSubmit";
$none = "d-none";
  if(isset($_POST['submit'])){
  $none = "";
  $appear = "appear";
  $disappear = "disappear";
  $street= filter_var ( $_POST['street'], FILTER_SANITIZE_STRING);
  $number = filter_var ( $_POST['number'], FILTER_SANITIZE_NUMBER_INT);
  $postal = filter_var ( $_POST['postal'], FILTER_SANITIZE_NUMBER_INT);
  $city = filter_var ( $_POST['city'], FILTER_SANITIZE_STRING);
  $type = filter_var ( $_POST['type'], FILTER_SANITIZE_STRING);
  $surface = filter_var ( $_POST['surface'], FILTER_SANITIZE_NUMBER_INT);
  $bedroom = filter_var ( $_POST['bedroom'], FILTER_SANITIZE_NUMBER_INT);
  $status = filter_var ( $_POST['status'], FILTER_SANITIZE_NUMBER_INT);
  $garden = filter_var ( $_POST['garden'], FILTER_SANITIZE_NUMBER_INT);
  $terrace = filter_var ( $_POST['terrace'], FILTER_SANITIZE_NUMBER_INT);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Immo Eliza">
    <meta name="keywords" content="HTML, CSS, PHP, Python">
    <meta name="author" content="Mathieu, Vincent, Yannick, Jonathan">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Immo ELiza</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="assets/js/script.js"></script>
</head>

<body>
  <header>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/images/immoEliza.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Formulaire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  </header>

    <section class="container-fluid <?php echo $disappear ?>" id="formSection">
      <div class="row">
        <div class="col-12 col-md-8 offset-md-2 mainForm">
          <form method="post">
            <h2>Formulaire</h2>
            <div class="form-row">
              <div class="form-group col-9">
                <label for="street">Rue</label>
                <input type="text" class="form-control" name="street" />
              </div>
              <div class="form-group col-3">
                <label for="number">Numéro</label>
                <input type="number" class="form-control" name="number" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-3">
                <label for="postal">Code postal</label>
                <input type="number" class="form-control" name="postal" />
              </div>
              <div class="form-group col-9 mt-auto">
                <label for="city">Ville</label>
                <input type="text" class="form-control" name="city" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-4  mt-auto">
                <label for="surface">Surface habitable</label>
                <input type="number" class="form-control" name="surface" />
              </div>
              <div class="form-group col-4  mt-auto">
                <label for="bedroom">Nombre de chambre(s)</label>
                <input type="number" class="form-control" name="bedroom" />
              </div>
              <div class="form-group col-4  mt-auto">
                <label for="status">Etat du bien</label>
                <select class="form-control" name="status">
                  <option value="1">Neuf</option>
                  <option value="0">Ancien</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-4 offset-2">
                <label for="garden">Jardin</label>
                <select class="form-control" name="garden">
                  <option value="1">oui</option>
                  <option value="0">non</option>
                </select>
              </div>
              <div class="form-group col-4">
                <label for="terrace">Terrasse</label>
                <select class="form-control" name="terrace">
                  <option value="1">oui</option>
                  <option value="0">non</option>
                </select>
              </div>
            </div>

            <div class="form-row d-flex flex-column">
              <label class="form-check-label"> Type de bien</label>
              <div class="d-flex">
                <div class="form-check typeCard p-0">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="type"
                    value="1"
                    id="house"
                  />
                  <label for="house">
                    <img
                      class="typeImg"
                      src="assets/images/home.svg"
                      alt="house"
                    />
                    <p>Maison</p>
                  </label>
                </div>
                <div class="form-check typeCard">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="type"
                    value="0"
                    id="apartment"
                  />
                  <label for="apartment">
                    <img
                      class="typeImg"
                      src="assets/images/apart.svg"
                      alt="apartment"
                    />
                    <p>Appartement</p>
                  </label>
                </div>
              </div>
            </div>
            <button type="submit" class="submitButton" name="submit" id="submitButton">
              Submit
            </button>
          </form>

        </div>
      </div>
    </section>

    <section class="container-fluid <?php echo "$none "; echo $appear; ?>" id="afterSubmit">
      <div class="row">
        <div class="col col-md-8 offset-md-2 info">
          <div class="d-flex justify-content-around">
            <div>
              <h3>Votre bien</h3>
              <ul>
                <li>Type :  <?php if($type){echo "Maison";}else{echo "Appartement";} ?></li>
                <li>Adresse : <?php echo "$number $street, $postal $city" ?></li>
                <li>Nombre de chambre : <?php echo $bedroom ?></li>
              </ul>
            </div>
              <ul class='mt-auto'>
                <li>Surface habitable: <?php echo $surface?> m²</li>
                <li>Etat du bien : <?php if($status){echo "neuf";}else{echo "ancien";} ?></li>
                <li>Jardin : <?php if($garden){echo "oui";}else{echo "non";} ?></li>
              </ul>
              <ul class='mt-auto'>
                <li>Terrasse: <?php if($terrace){echo "oui";}else{echo "non";}?></li>
              </ul>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-4 offset-2">
          <p class="mb-0">
            Prix estimé :
            <?php ?>
          </p>
        </div>
        <div class="col col-md-8 offset-md-2">
          <img class="houseTemp" src="assets/images/temp3d.jpg" alt="3d" />
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="page-footer font-small bg-light pt-4">
        <!-- Footer Links -->
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-lg-6 mt-md-0 mt-3">
                    <!-- Content -->
                    <h5 class="text-uppercase">Footer Content</h5>
                    <p>Here you can use rows and columns to organize your footer content.</p>
                </div>
                <hr class="w-100 d-lg-none">
                <div class="col-lg-6 mb-md-0">
                    <!-- Contact -->
                    <h5 class="text-uppercase">Contact</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <hr class="w-100 d-lg-none">
            </div>
        </div>
        <!-- Footer Links -->
        <!-- Copyright -->
        <div class="footer-copyright text-center pb-3">© 2020 Copyright:
            <a href="#"> immoeliza.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- JS, Popper.js, and jQuery -->
    <script src="assets/node_modules/jquery/dist/jquery.slim.js"></script>
    <script src="assets/node_modules/@popperjs/core/dist/umd/popper.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.js"></script>
  </body>
</html>
