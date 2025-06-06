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
                return $this->printLibros();
            }
            $this->libros[$titulo] += $cantidad;
            return $this->printLibros();

        }
        else if ($instruccionPrincipal == "devolver"){
            if (!isset($this->libros[$titulo])){
                return "El libro indicado no está en préstamo";
            }
            unset($this->libros[$titulo]);
        }

        return null;
    }

    public function printLibros():string
    {
        ksort($this->libros);
        $itemsInList ="";
        foreach ($this->libros as $libro => $cantidad){
            $itemsInList .= $libro." x".$cantidad;
            $lastKey = array_key_last($this->libros);
            if ($lastKey !== $libro){
                $itemsInList .= ", ";
            }
        }
        return $itemsInList;
    }


}