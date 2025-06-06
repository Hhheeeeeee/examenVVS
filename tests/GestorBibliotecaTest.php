<?php

namespace Deg540\DockerPHPBoilerplate;

use PHPUnit\Framework\TestCase;

class GestorBibliotecaTest extends TestCase
{
    private GestorBiblioteca $gestor;

    protected function setUp(): void
    {
        parent::setUp();
        $this->gestor = new GestorBiblioteca();
    }

    /**
     * @test
     */
    public function instruccionPrestarConTituloDevuelveLibroPrestado()
    {
        $result = $this->gestor->gestionarBiblioteca("prestar dune");
        $this->assertEquals("dune x1",$result);
    }

    /**
     * @test
     */
    public function instruccionPrestarConTituloExistenteDevuelveLibroPrestadoConNuevaCantidad()
    {
        $result = $this->gestor->gestionarBiblioteca("prestar dune");
        $result = $this->gestor->gestionarBiblioteca("prestar Dune 2");
        $this->assertEquals("dune x3",$result);
    }


}

