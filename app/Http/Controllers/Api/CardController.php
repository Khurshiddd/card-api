<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Card\StoreRequest;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeRequest $request)
    {
        Card::create($request->validated());

        return $this->success();
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        return $this->response(new CardResource($card));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Card $card)
    {
        $card->update($request->validated());
        return $this->success('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return $this->success('card deleted');
    }
}
