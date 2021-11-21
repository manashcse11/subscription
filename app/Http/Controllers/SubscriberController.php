<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SubscriberController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_id' => 'required',
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('subscribers')->where('website_id', $request->website_id)->where('email', $request->email)],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 422);
        }
        $subscriber = Subscriber::create($request->input());
        return response()->json($subscriber, 200);
    }

}
