<?php

function usuarioAutenticado()
{
    if (!usuarioFallido()) {
        header('Location:login.php');
        exit();
    }
}

function usuarioFallido()
{
    return isset($_SESSION['usuario']);
}


session_start();
usuarioAutenticado();
