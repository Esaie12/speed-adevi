<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crée 10 factures
        \App\Models\Invoice::factory()->count(10)->create()->each(function ($invoice) {
            // Chaque facture reçoit entre 1 et 5 items
            \App\Models\InvoiceItem::factory()->count(rand(1, 5))->create([
                'invoice_id' => $invoice->id,
            ]);
        });
    }
}
