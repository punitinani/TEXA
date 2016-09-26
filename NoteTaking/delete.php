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
                xmlhttp.open("GET", 'search.inc.php?id=' + document.getElementById("searchbox").value, true);
                xmlhttp.send();
            }


            function show() {


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
                        document.getElementById("choiceList").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", 'search.inc.php?id=' + document.getElementById("searchbox").value, true);
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

        <br>


        <div  class="col-sm-7 col-lg-offset-4"  >

            <input    list="choiceList"  contextmenu="hello()"  id="searchbox" type="text" class="form-group form-control" 
                     placeholder="Search title, keyword "   name="search" onkeypress="show();"     />

            <datalist    id="choiceList"  >  





            </datalist>
        </div>
        <div   id="punit" class="col-sm-7 col-lg-offset-4"  >




        </div>






        <br> <br>

    </body>
</html>
