<?php

namespace Tests\Feature\Http\Controllers;

use App\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function canCreateCustomer()
    {
        // prepara
        $customer = factory(Customer::class)->make();

        // executa
        $this->post('/customers', $customer->toArray());

        // verifica
        $this->assertDatabaseHas('customers', $customer->toArray());
    }

    /**
     * @test
     */
    public function cannotCreateCustomerDuplicatedEmail()
    {
        // prepara
        factory(Customer::class)->create([
            'email' => $email = $this->faker->safeEmail,
        ]);
        $customer = factory(Customer::class)->make([
            'email' => $email
        ]);

        // executa
        $response = $this->post('/customers', $customer->toArray());

        // verifica
        $response->assertSessionHasErrors('email');
    }
}
