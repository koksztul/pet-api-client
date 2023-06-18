<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetRequest;
use App\Services\PetService;
use Illuminate\Support\Facades\Http;

class PetController extends Controller
{
    public function __construct(
        protected PetService $petService
    ) {}

    public function show()
    {
        return view('show');
    }
    public function create()
    {
        return view('create');
    }

    public function edit()
    {
        return view('edit');
    }

    public function store(StorePetRequest $request)
    {
        $data = $this->petService->prepareData($request->all());
        $response = Http::post(config('app.pet_api_url'), $data);

        if ($response->status() !== 200) {
            return redirect()->route('pet.create')
                ->with('failed', 'Pet not created')
                ->with('data', $response->json());
        }

        return redirect()->route('pet.create')
            ->with('success', 'Pet created successfully')
            ->with('data', $response->json());
    }

    public function update(StorePetRequest $request, int $id)
    {
        $data = $this->petService->prepareData($request->all(), $id);
        $response = Http::put(config('app.pet_api_url'), $data);
        if ($response->status() !== 200) {
            return redirect()->route('pet.edit')
                ->with('failed', 'Pet not updated')
                ->with('data', $response->json());
        }
        return redirect()->route('pet.edit')
            ->with('success', 'Pet updated successfully')
            ->with('data', $response->json());
    }

    public function getPetDataById(int $id)
    {
        $response = Http::get(config('app.pet_api_url') . "/{$id}");

        if ($response->status() !== 200) {
            return redirect()->route('pet.edit')
                ->with('failed', 'Pet not found')
                ->with('data', $response->json());
        }

        return response()->json($response->json());
    }

}
