<?php

namespace Deg540\DockerPHPBoilerplate;

class GestorBiblioteca
{

    public function gestionarBiblioteca(string $instruccion)
    {
        $partes = explode(" ", $instruccion);
        $cantidad = $partes[2] ?? 1;
        return $partes[1]." x".$cantidad;
    }
}