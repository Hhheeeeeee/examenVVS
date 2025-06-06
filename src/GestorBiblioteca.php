<?php

namespace Deg540\DockerPHPBoilerplate;

class GestorBiblioteca
{
    private $libros = [];

    public function gestionarBiblioteca(string $instruccion) : ?string
    {
        $partes = explode(" ", $instruccion);
        $instruccionPrincipal = $partes[0];
        $titulo = $partes[1] ?? "";
        $cantidad = $partes[2] ?? 1;
        if ($instruccionPrincipal == "prestar"){
            if (!isset($this->libros[$titulo])){
                $this->libros[$titulo] = $cantidad;
                return $partes[1]." x".$cantidad;

            }
        }

        return null;
    }
}