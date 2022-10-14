<?php

namespace GPapakitsos\LaravelTraits\Tests;

use GPapakitsos\LaravelTraits\Tests\Models\Country;
use GPapakitsos\LaravelTraits\Tests\Models\User;
use GPapakitsos\LaravelTraits\Tests\Models\UserLogin;
use Orchestra\Testbench\TestCase;

class FeatureTestCase extends TestCase
{
    public $route_prefix;
    public $country;
    public $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        User::factory()->has(UserLogin::factory()->count(rand(1, 5)))->count(49)->create();
        $this->country = Country::factory()->create();
        $this->user = User::factory()->has(UserLogin::factory()->count(rand(10, 20)))->create([
            'name' => 'George Papakitsos',
            'email' => 'papakitsos_george@yahoo.gr',
            'country_id' => $this->country->id,
            'created_at' => '1981-04-23 10:00:00',
            'updated_at' => null,
        ]);
    }

    protected function defineEnvironment($app)
    {
        $app->config->set('database.default', 'testbench');
        $app->config->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app->config->set('laraveltraits.TimestampsAccessor.format', 'd/m/Y H:i:s');
    }
}
