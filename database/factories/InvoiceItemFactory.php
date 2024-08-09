<?php

namespace Database\Factories;

use App\Models\InvoiceItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceItem>
 */
class InvoiceItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = InvoiceItem::class;

    public function definition()
    {
        return [
            'invoice_id' => \App\Models\Invoice::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->numberBetween(100, 5000),
            'item' => $this->faker->word(),
            'description' => $this->faker->sentence(),
        ];
    }
}
