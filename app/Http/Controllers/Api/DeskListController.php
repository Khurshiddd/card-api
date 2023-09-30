<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskList\StoreRequest;
use App\Http\Requests\DeskList\UpdateRequest;
use App\Http\Resources\DeskListResource;
use App\Models\DeskList;
use Illuminate\Http\Request;

class DeskListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $request->validate([
            'desk_id' => 'required|integer|exists:desks,id'
        ]);
        return DeskListResource::collection(
            DeskList::orderBy('created_at', 'desc')
                ->where('desk_id', $request->desk_id)
                ->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        DeskList::create($request->validated());
        return $this->success('success desk list created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, DeskList $deskList)
    {
        $deskList->update($request->validated());
        return $this->success();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeskList $deskList)
    {
        try {
            $deskList->delete();
            return $this->success('successfully delete desk');
        }catch (Exception $e){
            return $this->error("can not delete desk");
        }
    }
}
