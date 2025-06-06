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
    public function instruccionPrestarConLibroNoRegistradoDevuelveLibroConCantidad()
    {
        $result = $this->gestor->gestionarBiblioteca("prestar dune");
        $this->assertEquals("dune x1",$result);
    }

    /**
     * @test
     */
    public function instruccionPrestarConLibroExistenteDevuelveLibroConNuevaCantidad()
    {
        $result = $this->gestor->gestionarBiblioteca("prestar dune");
        $result = $this->gestor->gestionarBiblioteca("prestar Dune 2");
        $this->assertEquals("dune x3",$result);
    }

    /**
     * @test
     */
    public function instruccionDevolverConTituloNoRegistradoDevuelveMensaje()
    {
        $result = $this->gestor->gestionarBiblioteca("devolver dune");
        $this->assertEquals("El libro indicado no está en préstamo",$result);
    }

    /**
     * @test
     */
    public function instruccionDevolverConTituloRegistradoDevuelveListaSinLibro()
    {
        $result = $this->gestor->gestionarBiblioteca("prestar dune");
        $result = $this->gestor->gestionarBiblioteca("devolver dune");
        $this->assertEquals("",$result);
    }

    /**
     * @test
     */
    public function instruccionVaciarDevuelveListaSinLibro()
    {
        $this->gestor->gestionarBiblioteca("prestar dune");
        $this->gestor->gestionarBiblioteca("devolver 1984");
        $result = $this->gestor->gestionarBiblioteca("vaciar");
        $this->assertEmpty($result);
    }

    /**
     * @test
     */
    public function instruccionPrestarConMultiplesLibrosDevuelveLibrosConEjemplaresOrdenados()
    {
        $this->gestor->gestionarBiblioteca("prestar fundacion 2");
        $result = $this->gestor->gestionarBiblioteca("prestar dune 3");
        $this->assertEquals("dune x3, fundacion x2",$result);
    }

    /**
     * @test
     */
    public function instruccionPrestarConTituloDeLibroConEspaciosDevuelveLibro()
    {
        $result = $this->gestor->gestionarBiblioteca("prestar Cien Años de Soledad 2");
        $this->assertEquals("cien años de soledad x2",$result);
    }

    /**
     * @test
     */
    public function instruccionDevolverConLibroConVariosEjemplaresDevuelveLibroConNuevaCantidad()
    {
        $this->gestor->gestionarBiblioteca("prestar fundacion 4");
        $result = $this->gestor->gestionarBiblioteca("devolver fundacion");
        $this->assertEquals("fundacion x3",$result);
    }


}

