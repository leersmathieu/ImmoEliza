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
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
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
    <div class="container-fluid">
        <header class="row">
            <div class="col-12"></div>
        </header>
    </div>
    <section class="container-fluid" id="formSection">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 mainForm">
                <form>
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

                    <div class="form-row d-flex flex-column">
                        <label class="form-check-label"> Type de bien</label>
                        <div class="d-flex">
                            <div class="form-check typeCard p-0">
                                <input class="form-check-input" type="radio" name="type" value="house" id="house" />
                                <label for="house">
                                    <img class="typeImg" src="assets/images/home.svg" alt="house" />
                                    <p>Maison</p>
                                </label>
                            </div>
                            <div class="form-check typeCard">
                                <input class="form-check-input" type="radio" name="type" value="apartment"
                                    id="apartment" />
                                <label for="apartment">
                                    <img class="typeImg" src="assets/images/apart.svg" alt="apartment" />
                                    <p>Appartement</p>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="submitButton" id="submitButton">
                        <!-- Change button to submit -->
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section class="container-fluid beforeSubmit" id="afterSubmit">
        <div class="row">
            <div class="col col-md-8 offset-md-2 info">
                <div class="d-flex justify-content-around">
                    <div>
                        <h3>Votre bien</h3>
                        <ul>
                            <li>
                                Type :
                                <? php ?>
                            </li>
                            <li>
                                Adresse :
                                <? php ?>
                            </li>
                            <li>...</li>
                        </ul>
                    </div>
                    <ul class="mt-auto">
                        <li>
                            Type :
                            <? php ?>
                        </li>
                        <li>
                            Adresse :
                            <? php ?>
                        </li>
                        <li>...</li>
                    </ul>
                    <ul class="mt-auto">
                        <li>
                            Type :
                            <? php ?>
                        </li>
                        <li>
                            Adresse :
                            <? php ?>
                        </li>
                        <li>...</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
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

    <!-- JS, Popper.js, and jQuery -->
    <script src="assets/node_modules/jquery/dist/jquery.slim.js"></script>
    <script src="assets/node_modules/@popperjs/core/dist/umd/popper.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>