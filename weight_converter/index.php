<?php require 'include/calcul.class.php';
      require 'include/db.php';
      require 'include/query.class.php';
      error_reporting(E_ALL ^ E_NOTICE);
      $calcul = new calcul($_POST['from'], $_POST['to'], $_POST['submit'], $_POST['units']);
      $query = new query($pdo, $_POST['units'], $_POST['from'], $_POST['to'], $_POST['submit'], $_POST['delete']);
      $query->insert(); // Adaugi in baza de date
      $query->delete(); // Stergi din baza de date
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Unit Converter</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="d-flex justify-content-center align-items-center container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
     <?php 
      if (isset($_GET['info']) && $_GET['info'] == 'error') {
        print '<h6 style="text-align:center;" class="alert alert-danger">A aparut o eroare, va rugam sa aveti grija la introducerea datelor !</h6>';
      }
     ?>
      <input class="form-control" type="text" name="units" id="unit" placeholder="Units"></br>
      <span>From:</span><br>
         <select class="custom-select" name="from" id="from" readonly="readonly">
             <option selected>Choose...</option>
             <option type="text" value="grame">grame</option>
             <option type="text" value="kilograme">kilograme</option>
             <option type="text" value="minute">minute</option>
             <option type="text" value="ore">ore</option>
             <option type="text" value="metri">metri</option>
             <option type="text" value="kilometri">km</option>
         </select></br>
         <span>To:</span></br>
         <select class="custom-select" name="to" id="to">
             <option selected>Choose...</option>
         </select></br></br>
         <button class="btn btn-primary" type="submit" name='submit'>Convert</button>
         <button class="btn btn-primary" name='delete'>Delete History</button></br></br>
         <input style="width:500px; text-align:center;" class="form-control" type="text" readonly="readonly" value="<?php echo $calcul->calcule(); ?>">
    </form>
  </div>
     <hr style="border: 2px solid blue;" />
     <div class="history">
       <h3 style="text-align:center; color:white;">History</h3></br>
       <?php $query->select();
             print $query->setHistory();
        ?>
     </div>
  </div>
  <script src="js/javascript.js"></script>
  <footer>
  	<p>Copyright by AGC.</p>
  </footer>
</body>
</html>