<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Aplikasi Penyimpanan Pesan </title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>

  <style>
    body {
      background-color: gray;
    }
  </style>

  <nav class="navbar navbar-expand-lg navbar-light bg-gray">
    <a class="navbar-brand mx-auto" href="#">Tempat Saran</a>
  </nav>

  <div class="container">
    <div class="row flex-column align-items-center">
      <div class="col-lg-6">
        <form id="post-form" method="POST" enctype="multipart/form-data" action="./src/Main.php">
          <div class="form-group">
            <label for="inputIsiMasukan">Tuliskan Saran Anda</label>
            <textarea name="isiMasukan" type="text" class="form-control" id="inputIsiMasukan" aria-describedby="textHelp" placeholder="Masukkan Saran"></textarea>
            <?php
            if (isset($_GET['e'])) {
              echo '<small id="emailHelp" class="form-text text-danger">' . $_GET['e'] . '</small>';
            }
            ?>
          </div>
          <button name="post-form" type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>

      <?php
      $host = 'localhost';
      $username = 'root';
      $password = '';
      $dbname = 'pbo_masukkan';

      $con = mysqli_connect($host, $username, $password, $dbname);

      $query = "SELECT * FROM isiMasukkan ORDER BY id DESC";
      $allComments = mysqli_query($con, $query);

      foreach ($allComments as $comment) {
        echo '<div class="col-lg-6 mt-2">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text">' . $comment['isiMasukan'] . '</p>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-' . $comment['id'] . '">
                        Edit
                      </button>
                    
                      <div class="modal fade" id="modal-' . $comment['id'] . '" tabindex="-1" role="dialog" aria-labelledby="modal-' . $comment['id'] . '" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Edit Komentar</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form id="edit-form" method="POST" action="./src/Main.php" enctype="multipart/form-data">
                                <label for="edit-isiMasukan">Komentar Baru</label>
                                <textarea name="isiMasukan" type="text" class="form-control" id="edit-masukan" aria-describedby="textHelp" placeholder="Masukkan Komentar">' . $comment['isiMasukan'] . '</textarea>
                                <button name="form-isiMasukan" value="' . $comment['id'] . '" class="btn btn-primary mt-2">Edit</button>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <form class="d-inline" id="delete-form" method="POST" action="./src/Main.php" enctype="multipart/form-data">
                        <button name="isiMasukan-id" value="' . $comment['id'] . '" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>';
      }

      ?>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


</body>

</html>