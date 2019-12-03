<?php

function listar($inicio,$limite){
    //conexão com o banco de dados//=======================================
    $conexao=mysqli_connect("localhost","root","","paginacao");
    //conexão com o banco de dados//======================================
    $inicio-=1;
    $query=mysqli_query($conexao,"SELECT * FROM posts LIMIT $inicio,$limite");
    if($query===FALSE){
        exit();
        echo "error";
    }else{
    while($posts=mysqli_fetch_assoc($query)){
        echo "<div class='post'>";
        echo $posts['post'].'<br>';
        echo "</div>";
    }
    }
}


function obterNumeroReg(){
        //conexão com o banco de dados//=======================================
        $conexao=mysqli_connect("localhost","root","","paginacao");
        //conexão com o banco de dados//======================================
        $query=mysqli_query($conexao,"SELECT * FROM numero WHERE id=1");
        $numero=mysqli_fetch_assoc($query);
        return $numero['numero'];
}

function repetirListagem($inicio,$limite,$NumReg){
    $inicio-=1;
    $inicio=$inicio*$NumReg;
    for($i= 1 ;$i<=$NumReg; $i++){
        $inicio++;
        listar($inicio,$limite);
    }
}
function TotalReg(){
            //conexão com o banco de dados//=======================================
            $conexao=mysqli_connect("localhost","root","","paginacao");
            //conexão com o banco de dados//======================================
            $query=mysqli_query($conexao,"SELECT * FROM posts");
            return mysqli_num_rows($query);
}   


function insert($post){
        //conexão com o banco de dados//=======================================
        $conexao=mysqli_connect("localhost","root","","paginacao");
        //conexão com o banco de dados//======================================
        $data=date();
        $insercao=mysqli_query($conexao,"INSERT INTO posts (post,date) VALUES ('$post','data')");
        if($insercao){
            header("location:index.php?post=1");
        }else{
            header("Location:index.php?post=0");
        }
}

function insertNum($num){
            //conexão com o banco de dados//=======================================
            $conexao=mysqli_connect("localhost","root","","paginacao");
            //conexão com o banco de dados//======================================
            $insercao=mysqli_query($conexao,"UPDATE  numero SET numero='$num' where id=1");
            if($insercao){
                header("Location:index.php?post=2");
            }else{
                header("Location:index.php?post=3");
            }
}
?>