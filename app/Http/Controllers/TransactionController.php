<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{

    public function insertTransaction(Request $request)
    {
        $status = 'Insert Transaction Fail.';
        $validate = Validator::make($request->all(), [
            'user_id' => ['required', function ($attribute, $value, $fail) {
                $result = User::where('id', $value)->get();
                if (!isset($result)) {
                    $fail('The ' . $attribute . ' is invalid.');
                }
            }],
            'currency_id' => ['required', function ($attribute, $value, $fail) {
                $result = Currency::where('id', $value)->get();
                if (!isset($result)) {
                    $fail('The ' . $attribute . ' is invalid.');
                }
            }],
            'amount' => 'required|numeric',
            'price' => 'required|numeric',
            'method' => ['required', function ($attribute, $value, $fail) {
                if ($value != 'SELL' && $value != 'BUY') {
                    $fail('The ' . $attribute . ' is invalid.');
                }
            }]

        ]);

        if ($validate->fails()) {
            $status = 'Insert Transaction invalid';
        } else {
            $check = $this->createTransaction($request->all());
            if (isset($check)) {
                $status = 'Insert Transaction success';
            }
        }

        return response()->json(['status' => $status]);
    }

    public function createTransaction(array $request)
    {
        return Transaction::create([
            'user_id' => $request['user_id'],
            'currency_id' => $request['currency_id'],
            'amount' => $request['amount'],
            'price' => $request['price'],
            'method' => $request['method'],
            'status' => 'PENDING'


        ]);
    }

    public function submit(Request $request)
    {
        $status = 'Insert submit Fail.';
        $validate = Validator::make($request->all(), [
            'transaction_id' => ['required', function ($attribute, $value, $fail) {
                $result = Transaction::where('id', $value)->get();
                if (!isset($result)) {
                    $fail('The ' . $attribute . ' is invalid.');
                }
            }],
            'user_id' => ['required', function ($attribute, $value, $fail) {
                $result = User::where('id', $value)->get();
                if (!isset($result)) {
                    $fail('The ' . $attribute . ' is invalid.');
                }
            }]
        ]);

        if ($validate->fails()) {
            $status = 'Insert submit invalid';
        } else {
            $check = $this->updateTransaction($request->all());
            if (isset($check)) {
                $status = 'Insert submit success';
            }
        }
        return response()->json(['status' => $status]);
    }

    public function updateTransaction(array $request)
    {
        return Transaction::where('id', $request['transaction_id'])->update(['trader_id' => $request['user_id'], 'status' => 'SUCCESS']);
    }
}
