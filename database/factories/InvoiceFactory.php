<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'reference'=> "Reference ".$this->faker->numberBetween(1, 105),
            'user_id' => 2, // Assurez-vous que les utilisateurs existent
            'status_id' => 1, // $this->faker->numberBetween(1, 5), // Assurez-vous que les statuts existent
            'date_invoice' => $this->faker->dateTimeThisYear(),
            'amount' => $this->faker->numberBetween(1000, 50000),
        ];
    }
}
