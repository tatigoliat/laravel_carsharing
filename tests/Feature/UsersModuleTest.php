<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /** @test*/

    function it_loads_the_users_list_page()
    {
        //$this->assertTrue(true);
        $this->get('/usuarios')
        	->assertStatus(200)
        	->assertSee('Usuarios')
        	->assertSee('Joel')
        	->assertSee('Alicia');
    }

    /** @test*/
    function it_loads_the_users_details_page()
    {
    	$this->get("/usuarios/4")
    	->assertStatus(200)
    	->assertSee("Mostrando detalles del Usuario: 4");
    }
    
    /** @test*/
    function it_loads_the_users_new_page()
    {
        //$this->assertTrue(true);
        $this->get('/usuarios/nuevo')
        	->assertStatus(200)
        	->assertSee('Crear nuevo usuario');
    }

}
