<?php

namespace Tests\Unit;

use App\Http\Controllers\AuthController;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_register_success()
    {
         Event::shouldReceive('dispatch')->once();
         Hash::shouldReceive('make')->andReturn('hashed-password'); 

        $request = RegisterRequest::create('/api/register', 'POST', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password1',
            'role' => 'user'
        ]);

        $controller = new AuthController();
        $response = $controller->register($request);

        $this->assertEquals(201, $response->status());
        $this->assertTrue($response->getData()->status);
        $this->assertEquals('register successfoly', $response->getData()->message);
    }

    public function test_example(): void
    {
        $this->assertTrue(true);
    }
}
