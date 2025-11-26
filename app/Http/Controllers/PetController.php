<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::with('owner')->paginate(10);
        return view('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role_id', 3)->where('is_active', true)->get(); // Solo clientes activos
        return view('pets.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|in:perro,gato,ave,roedor,reptil,otro',
            'breed' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0|max:50',
            'medical_history' => 'nullable|string',
            'owner_id' => 'required|exists:users,id',
        ]);

        Pet::create([
            'name' => $request->name,
            'species' => $request->species,
            'breed' => $request->breed,
            'age' => $request->age,
            'medical_history' => $request->medical_history,
            'owner_id' => $request->owner_id,
            'is_active' => true,
        ]);

        return redirect()->route('pets.index')
            ->with('success', 'Mascota registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        $users = User::where('role_id', 3)->where('is_active', true)->get(); // Solo clientes activos
        return view('pets.edit', compact('pet', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|in:perro,gato,ave,roedor,reptil,otro',
            'breed' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0|max:50',
            'medical_history' => 'nullable|string',
            'owner_id' => 'required|exists:users,id',
            'is_active' => 'required|boolean',
        ]);

        $pet->update($request->all());

        return redirect()->route('pets.index')
            ->with('success', 'Mascota actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pets.index')
            ->with('success', 'Mascota eliminada exitosamente.');
    }

    /**
     * Display pets for the authenticated client.
     */
    public function myPets()
    {
        $pets = Pet::where('owner_id', auth()->id())->get();
        return view('pets.my-pets', compact('pets'));
    }

    /**
     * Display specific pet for the authenticated client.
     */
    public function showMyPet(Pet $pet)
    {
        // Verificar que la mascota pertenezca al usuario autenticado
        if ($pet->owner_id !== auth()->id()) {
            abort(403, 'No tienes permisos para ver esta mascota.');
        }

        return view('pets.show', compact('pet'));
    }
}