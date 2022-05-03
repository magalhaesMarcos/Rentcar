<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/img/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <h1 class="mb-3 bread">Se connecter</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-user-circle"></span>
                            </div>
                            <p><span>Vous n'avez pas de compte ? </span><a href="index.php?uc=register&action=show">Créer un nouveau compte ici !</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 block-9 mb-md-5">
                <form method="POST" action="index.php?uc=register&action=validate" class="bg-light p-5 contact-form">
                    <div class="form-group">
                        <label>date de naissance: </label>
                        <input name="dateNaissance" type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>email: </label>
                        <input name="email" type="email" class="form-control" placeholder="exemple@exemple.com">
                    </div>
                    <div class="form-group">
                        <label>mot de passe: </label>
                        <input name="motDePasse" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>nom: </label>
                        <input name="nom" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>prenom: </label>
                        <input name="prenom" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>téléphone: </label>
                        <input name="noTel" type="text" class="form-control" placeholder="0781231212">
                    </div>
                    <div class="form-group">
                        <label>permis de conduire: </label>
                        <input name="permis" type="text" class="form-control" placeholder="123.123.123">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="connexion" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>