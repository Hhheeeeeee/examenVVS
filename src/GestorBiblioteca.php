<?php

namespace Deg540\DockerPHPBoilerplate;

class GestorBiblioteca
{
    private $libros = [];

    public function gestionarBiblioteca(string $instruccion) : ?string
    {
        $partes = explode(" ", $instruccion);
        $instruccionPrincipal = $partes[0];

        if (count($partes) > 3) {
            $cantidad = is_numeric(array_key_last($partes)) ? (int)$partes[array_key_last($partes)] : 1;
            $titulo = "";
            for ($i = 1; $i < count($partes)-1; $i++) {
                $titulo .= " ". strtolower($partes[$i]);
            }
            $titulo = trim($titulo);
        }
        else {
            $titulo = isset($partes[1])? strtolower($partes[1]) : "";
            $cantidad = isset($partes[2])? (int)$partes[2] : 1;
        }


        if ($instruccionPrincipal == "prestar"){
            return $this->prestarLibro($titulo, $cantidad);

        }
        else if ($instruccionPrincipal == "devolver"){
            return $this->devolverLibro($titulo);
        }
        else{
            $this->libros = [];
            return $this->printLibros();
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

    public function devolverLibro(string $titulo): string
    {
        if (!isset($this->libros[$titulo])) {
            return "El libro indicado no está en préstamo";
        }
        unset($this->libros[$titulo]);
        return $this->printLibros();
    }

    public function prestarLibro(string $titulo, int|string $cantidad): string
    {
        if (!isset($this->libros[$titulo])) {
            $this->libros[$titulo] = $cantidad;
            return $this->printLibros();
        }
        $this->libros[$titulo] += $cantidad;
        return $this->printLibros();
    }


}