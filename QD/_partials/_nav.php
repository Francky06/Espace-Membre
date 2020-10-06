        <nav class="navbar navbar-expand-md navbar-dark fixed-top">
          <a class="navbar-brand" href="index.php">Quantic-Design</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav">

              <?php if(isset($_SESSION['id_user']) && isset($_SESSION['pseudo'])) { ?>
            
               <li class="nav-item">
                <a class="nav-link" href="?page=profil">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=deconnexion">Déconnexion</a>
              </li>

              <?php  } else { ?>
                
              <li class="nav-item">
                <a class="nav-link" href="?page=register">S'inscrire</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=login">Se connecter</a>
              </li>

              <?php } ?>
              
            </ul>
          </div>
        </nav>

        