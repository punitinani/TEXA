<!DOCTYPE html>

<html>
    <head>
        <meta charset="windows-1252">
        <title>Dashboard</title>

        <link rel="stylesheet" href="/NoteTaking/css/style.css" />
        <link rel="stylesheet" href="/NoteTaking/css/bootstrap.css" />


      





    </head>
    <body onload="onLoading()">

        <br>
        <br><br>


        <?php
        include_once 'nav.inc.php';
        ?>
        <script type='text/javascript'>
            document.getElementById('dashboard').style.background = 'white';
        </script>

        <br>
        <br> <ul class=" col-sm-2 ">
            <p><a href="<?php echo htmlentities("shaw/" . base64_encode("ShowAllPunit")); ?>/" class="list-group-item" style="background:  #E7E7E7 ;  list-style-type: none; font-family:Century Gothic   ; font-size: 1.2em;"> Show all </a></p>

        </ul>
        <ul class=" col-sm-2 "  id="list"  >


            <?php
            require_once 'core.inc.php';

            if (isset($_GET['showAll'])) {

                $show = base64_decode($_GET['showAll']);

                if ($show === "ShowAllPunit") {


                    showAll();
                } else {
                    showLimitTen();
                }
            } else {
                showLimitTen();
            }
            ?>
        </ul>




        <div class="col-lg-offset-3">
            <textarea name="matter" id="textareamatter" readonly="">  Please select any file</textarea>
        </div>
        
        
          <script>

          function   onLoading () {
                
              //document.writeln("Hello");
              
              // setTimeout (10000); 
              
              
          }
        </script>
    </body>
    
</html>


