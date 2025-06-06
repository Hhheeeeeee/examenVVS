<?php

namespace Deg540\DockerPHPBoilerplate;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    private Example $shoppingList;

    protected function setUp(): void
    {
        parent::setUp();
        $this->shoppingList = new Example();
    }
}

