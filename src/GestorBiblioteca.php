<?php

namespace Deg540\DockerPHPBoilerplate;

class GestorBiblioteca
{
    private $libros = [];

    public function gestionarBiblioteca(string $instruccion) : ?string
    {
        $partes = explode(" ", $instruccion);
        $instruccionPrincipal = $partes[0];
        $titulo = strtolower($partes[1]) ?? "";
        $cantidad = $partes[2] ?? 1;
        if ($instruccionPrincipal == "prestar"){
            if (!isset($this->libros[$titulo])){
                $this->libros[$titulo] = $cantidad;
                return $titulo." x".$cantidad;
            }
            else{
                $cantidadAntigua = $this->libros[$titulo];
                $nuevaCantidad = $cantidadAntigua + $cantidad;
                return $titulo." x".$nuevaCantidad;
            }
        }

        return null;
    }
}