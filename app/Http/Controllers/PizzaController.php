<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function create()
    {
        return view('pizza.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'PizzaName' => 'required|string|max:255',
            'Preis' => 'required|numeric',
            'Zutaten' => 'required|string',
            'Beschreibung' => 'required|string',
        ]);

        // Create a new pizza entry
        Pizza::create([
            'PizzaName' => $request->PizzaName,
            'Preis' => $request->Preis,
            'Zutaten' => $request->Zutaten,
            'Beschreibung' => $request->Beschreibung,
        ]);

        // Redirect to the home page or another page
        return redirect('/')->with('success', 'Pizza added successfully!');
    }

    public function confirmDelete($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('delete', compact('pizza'));
    }

    public function edit($id)
    {
        $pizza = Pizza::find($id);
        $pizzas = Pizza::all(); // Fetch all pizzas
        return view('pizza.updatePizza', compact('pizza', 'pizzas'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'PizzaName' => 'required|string|max:255',
            'Preis' => 'required|numeric',
            'Zutaten' => 'required|string',
            'Beschreibung' => 'required|string',
        ]);

        // Find the pizza and update its details
        $pizza = Pizza::find($id);
        $pizza->PizzaName = $request->input('PizzaName');
        $pizza->Preis = $request->input('Preis');
        $pizza->Zutaten = $request->input('Zutaten');
        $pizza->Beschreibung = $request->input('Beschreibung');
        $pizza->save();

        // Return JSON response
        return response()->json(['success' => 'Pizza updated successfully!']);
    }

    public function zutaten()
{
    $zutaten = Pizza::select('Zutaten')->distinct()->get();
    return view('pizza.zutaten', compact('zutaten'));
}

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        return redirect('/');
    }
}
