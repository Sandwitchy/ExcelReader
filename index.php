<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<form method='post' action='#'  enctype="multipart/form-data">
  <input type='file' name='filecsv'>
  <input type='submit' value='envoyer' name='upload'>
</form>
<?php
  if (isset($_POST['upload']))
  {
    $file = $_FILES['filecsv']['tmp_name'];
    //vérification file not null
    if ($file == NULL) {
      echo $_FILES['filecsv']['error'];
      die('error : file is NULL');
    }
    else {
      $handle = fopen($file, "r");
        ?>
        <table>
        <?php
        //affichage
        while(($filesop = fgetcsv($handle, 1000, ":")) !== false)
          {
            $it = count($filesop);
            echo "<tr style='border: 1px solid black;'>";
            for ($i=0; $i < $it; $i++) {
              echo "<td>".$filesop[$i]."</td>";
            }
            echo "</tr>";
          }
          echo "</table>";
    }


  }
 ?>
