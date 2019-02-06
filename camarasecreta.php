<?php
    session_start();
    echo '
        <html>
            <head>
                <style>
                    body{
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <form action="camarasecreta.php" method="POST">
                Introduce la longitud del número:  <br>  <br>
                <input type="text" name="longit"> <br> <br>
                <input type="submit" name="botLong" value="Establecer">
            </body>
        <html>
    ';

    If(isset($_POST["botLong"])){
        $longit=$_POST["longit"];
        $arrayNum=array();
        /*echo $longit;*/
    
        For ($i=1;$i<($longit+1);$i++){
            $randomi=rand(1,5);
            $arrayNum[]=$randomi;
            
        }
        Echo '<br> <br>';    
        /*For ($i=0;$i<count($arrayNum);$i++){ /* Escribe el número para comprobar cuál es mientras programo (BORRAR PARA EL USUARIO) 
            echo $arrayNum[$i];
        }*/
        echo ' <br> <br> El número ha sido creado, adivine en la siguiente casilla:';
        $_SESSION["arrayNum"]=$arrayNum;
    }

        echo'
        <br> <br> <br> <br>
        Número creado, introduzca que número cree que es:
        <br> <br>
        <form action="camarasecreta.php" method="POST">
        <input type="text" name="numAdiv">
        <br> <br>
        <input type="submit" name="botAdiv" value="Comprobar">
        </form>
        ';
    
        If(isset($_POST["botAdiv"])){
            $arrayNum=$_SESSION["arrayNum"];
            $numAdiv=$_POST["numAdiv"];
            $arrayNumAdiv=str_split($numAdiv);
            For ($i=0;$i<count($arrayNumAdiv);$i++){
                If ($arrayNum[$i]==$arrayNumAdiv[$i]){
                    echo $arrayNumAdiv[$i],'&nbsp';
                }else{
                    echo '_ &nbsp';
                }
            }
            For ($j=0;$j<count($arrayNumAdiv);$j++){
                If ($arrayNum[$j]>$arrayNumAdiv[$j]){
                    echo ' <br> <br> El dígito en la posición ',$j+1,' es mayor que el introducido. <br> Ha sugerido el número: (',$arrayNumAdiv[$j],')';
                }
                If ($arrayNum[$j]<$arrayNumAdiv[$j]){
                    echo ' <br> <br> El dígito en la posición ',$j+1,' es menor que el introducido. <br> Ha sugerido el número: (',$arrayNumAdiv[$j],')';
                }
            }
            $_SESSION["arrayNum"]=$arrayNum;
        }

?>