<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CreateCurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $currencies = [
            [
                'name' => 'XRP',
                'rate' => '50',
            ],
            [
                'name' => 'DOGE',
                'rate' => '1',
            ],
            [
                'name' => 'ETH',
                'rate' => '200',
            ],
            [
                'name' => 'ONE',
                'rate' => '100',
            ],
        ];
        foreach ($currencies as $key => $value) {
            Currency::create($value);
        }
    }
}
