<?php

namespace tests\Feature\controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_response()
    {
        $response = $this->post('/tweet/create')
                                ->with('tweet','test');

        $response->assertSeeText('test');
    }
}
