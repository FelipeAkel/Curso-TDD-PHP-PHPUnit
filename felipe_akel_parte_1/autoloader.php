<?php
    // autoload = carregador automático
    spl_autoload_register(function ($nomeClass) {
        include $nomeClass . '.php';
    });
?>