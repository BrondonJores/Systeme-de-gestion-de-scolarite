<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN ProfEtud</title>
    <link rel="stylesheet" href="css/styleT.css">
    <link href="assert/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
        <div class="logobox">
            <p class="logo">ProfEtud</p>
        </div>
        <div class="container">
            
            <div class="signin-signup">
                <form action="connexion.php" class="sign-in-form" method="post">
                    <h2 class="title"> Se connecter</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nom ..." name="nom_con" id="nom_con">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mot de passe ..." name="pass_con" id="pass_con">
                    </div>

                    <input type="submit" value="Se connecter" class="btn">
                    <p class="social-text"> Ou se connecter via les réseaux sociaux</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </form>

                <form action="inscription.php" class="sign-up-form" method="post">
                    <h2 class="title"> S'inscrire</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nom ..." name="nom_ins" id="nom_ins">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Matricule/UI ..." name="mat_ins" id="mat_ins">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email ..." name="email_ins" id="email_ins">
                    </div>

                    <div class="input-field" id="passT">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mot de passe ..." name="pass_ins" id="pass1">
                    </div>

                    <div class="input-field" id="passC">
                        <i class="fas fa-key"></i>
                        <input type="password" placeholder="Confirmation ..." name="conf_ins" id="conf">
                    </div>

                    <input type="submit" value="S'inscrire" class="btn">
                    <p class="social-text"> Ou s'inscrire via les réseaux sociaux</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </form>
                
            </div>
            <div class="panels-container">
                <div class="panel right-panel">
                    <div class="content">
                        <h3>Nouveau dans la famille?</h3>
                        <p>Vous disposerez ici, dans <span>ProfEtud</span> des outils nécessaires pour un suivie particulier, unique et spécifique aux éxigences et préoccupations rencontrées dans le milieu éducatif en géneral et universitaire en particulier </p>
                    </div>
                    <img src="./images/3.png" alt="" class="image">
                    <div class="content">
                        <p>Déja un membre de la famille? Connectez-vous !</p>
                        <button class="btn" id="sign-up-btn">Se connecter</button>
                    </div>
                </div>

                <div class="panel left-panel">
                    <div class="content">
                        <h3> Etudiant ou enseignant?</h3>
                        <p>Réference 2024 des plateformes éducatives et de soutien favorisant une meilleure connexion entre vous (étudiant) et l'administration (enseignant) et ainsi conduire a un cohésion et une intégration réussi dans le monde académique</p>
                    </div>
                    <img src="./images/2.png" alt="" class="image">
                    <div class="content">
                        <p>Qu'attendez vous? rejoignez-nous !</p>
                        <button class="btn" id="sign-in-btn">S'inscrire</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="signaturebox">
            <p class="signature">Copiright &copy; <span>ProfEtud</span> Groupe 8</p>
        </div>

        <script src="js/scriptT.js"></script>
</body>
</html>