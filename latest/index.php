<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="application/json; charset=utf-8">
    <title>Document</title>
</head>
<body>    
    <pre id="Test">

    </pre>

    <script type="text/javascript">
        function ajaxFunction(){
            var xhttp = new XMLHttpRequest();        
            function stateck() {
                if(xhttp.readyState == 4){
                //  var response = JSON.parse(xhttp.responseText);
                 document.getElementById("Test").innerHTML=JSON.stringify(JSON.parse(xhttp.responseText),null,5);  
                }
            }
            xhttp.onreadystatechange = stateck;
            xhttp.open("GET", "/latest/get.php", true);
            xhttp.send(null);
        }
        setInterval(function() {
            ajaxFunction();
        }, 100);  
    </script>
</body>
</html>