<?php
  include('header.php');
 ?>
 <body>
  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top"></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="add_book.php">add_Book</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->
  <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>


 <!--/ Intro Skew Star /---------------------------------------------------------------------------->
  


    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4">Library</h2>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->
  
   <div class="row">

          <?php
           
            $query = $conn->query('SELECT * FROM book');
            $books = $query->fetchAll();
          ?>

          <?php foreach ($books as $book) { ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                  <img class="card-img-top" src="upload/img/<?php echo $book['cover']; ?>" alt="<?= $book['name']; ?>">
                  <div class="movie-cover" style="background-image: url(upload/img/<?php echo $book['cover']; ?>)"></div>
                </a>
                <div class="card-body">
                  <h4 class="card-title">
                  </h4>
                  <h5>
                    <?php
                      $date = (new DateTime($book['release_date']))->format('Y'); // 12 April 2019
                      // On traduit les mois en français
                      $date = str_replace(
                        ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'],
                        $date
                      );
                      
                     ?><p>relase date : <?php echo $date; ?></p>
                  </h5>
                  <p class="card-text"><?= $book['price']; ?></p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">
                    <?php
                      // Je génére un nombre d'étoiles aléatoires
                      $stars = rand(0, 5);
                      // J'affiche mes 5 étoiles
                      for ($i = 1; $i <= 5; $i++) {
                        // J'affiche les étoiles pleines si l'itération est inférieure
                        // au nombre aléatoire $stars
                        if ($i <= $stars) {
                          echo '★ ';
                        } else {
                          echo '☆ ';
                        }
                      }
                    ?>
                  </small>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
        <!-- /.row -->

  <!--/ Section Blog-Single End /-->

  
<?php 
    include('footer.php');
 ?>