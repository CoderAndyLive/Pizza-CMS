<?php
use App\Http\Controllers\PizzaController;
use App\Models\Pizza;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $new_id = Pizza::max('id') + 1; // Generate a new ID based on the maximum existing ID
    $pizzas = Pizza::all(); // Fetch all pizzas from the database
    return view('pizza.index', compact('new_id', 'pizzas'));
})->name('pizza.index'); // Add the name 'pizza.index' to this route

Route::get('/createPizza', [PizzaController::class, 'create'])->name('createPizza'); // Display the form
Route::post('/createPizza', [PizzaController::class, 'store'])->name('storePizza'); // Handle form submission
Route::get('/pizza/{id}/delete', [PizzaController::class, 'confirmDelete'])->name('pizza.confirmDelete'); // Display delete confirmation
Route::delete('/pizza/{id}', [PizzaController::class, 'destroy'])->name('pizza.destroy'); // Handle delete request
Route::get('/zutaten', [PizzaController::class, 'zutaten'])->name('zutaten');
Route::get('/pizza/update/{id}', [PizzaController::class, 'edit'])->name('editPizza');
Route::put('/pizza/update/{id}', [PizzaController::class, 'update'])->name('updatePizza');
Route::put('/pizza/update/{id}', [PizzaController::class, 'update'])->name('updatePizza');
Route::delete('/pizza/{id}', [PizzaController::class, 'destroy'])->name('pizza.destroy');
