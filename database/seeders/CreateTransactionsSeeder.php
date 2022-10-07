<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class CreateTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $trans = [

            [
                'user_id' => 1,
                'currency_id' => 1,
                'trader_id' => 2,
                'amount' => 1000,
                'price' => 200000,
                'method' => 'BUY',
                'status' => 'SUCCESS'
            ],
            [
                'user_id' => 2,
                'currency_id' => 1,
                'amount' => 1000,
                'price' => 200000,
                'method' => 'SELL',
                'status' => 'PENDING'

            ],


        ];
        foreach ($trans as $key => $value) {
            Transaction::create($value);
        }
    }
}
