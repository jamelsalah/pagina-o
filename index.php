<?php
include "functions.php";

$NumReg=obterNumeroReg();
if(isset($_GET['pag'])){
    $inicio=$_GET['pag'];
}else{
    $inicio=1;
}
$limite=1;
$Total_reg=TotalReg();
$Total_pag=$Total_reg/$NumReg;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pagination</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body style="display:flex;justify-content:center;align-items:center;">

<div>

</div>
    
<?php
echo "<div class='posts'>";
repetirListagem($inicio,$limite,$NumReg);
echo "</div>";


echo "<div class='AntProx'>";
if(isset($_GET['pag'])){
    if($_GET['pag']>1){
        $inicio-=1;
        echo "<div>";
        echo "<a href='index.php?pag=". $inicio . "'>anterior</a>";
        echo "</div>";
    }
}
if(isset($_GET['pag'])){
    if($_GET['pag']<$Total_pag){
        $pag=$_GET['pag']+1;
        echo "<div>";
        echo "<a href='index.php?pag=". $pag . "'>proximo</a> ";
        echo "</div>";
    }

}else{
    echo "<div>";
    echo "<a href='index.php?pag=". 2 . "'>proximo</a> ";
    echo "</div>";
}
echo "</div>";
?>
<div>
    <div>
            <a>postagem</a>
            <form method="post" action="index_post_action.php">
                <input type="text" name="post" placeholder="post" maxlength="400" >
                <input type="submit" value="enviar" > 
            </form>
    </div>

    <div >
            <p style="margin-bottom:0px;">numero de registros por pagina :</p>
            <form method="post" action="index_numero_action.php">
                <input type="number" placeholder="numero" name="numero">
                <input type="submit" value="enviar">
            </form>
    </div>
</div>
    
</body>
</html>