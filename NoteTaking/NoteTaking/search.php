<!DOCTYPE html>

<html>
    <head>
        <meta charset="windows-1252">
        <title><?php include_once 'title.php'; ?></title>

        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />


        <script>
            function searchfunction()
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("punit").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", 'result.inc.php?id=' + document.getElementById("searchbox").value, true);
                xmlhttp.send();
            }
        </script>


    </head>
    <body>


        <?php
        include_once 'nav.inc.php';
        echo "<br>" . "<br>";
        ?>

        <script  type="text/javascript">

            document.getElementById("<?php echo $file; ?>").style.background = 'white';

        </script>


        <?php
        ?>
        <br>

        <div  class="col-sm-7 col-lg-offset-4" >
            <input   id="searchbox" type="text" class="form-group form-control" placeholder="Search title, keyword , favourite "   onkeyup="searchfunction();" />
            <input type="submit"  id="searchbtn" class=" btn btn-primary col-sm-offset-1 "  name="Search"     onclick="searchfunction()" value="Search">
        </div>


        <center>


        <div   id="punit"   style="width:50% ">




        </div>

            </center>
        <br> <br>








    </body>
</html>
