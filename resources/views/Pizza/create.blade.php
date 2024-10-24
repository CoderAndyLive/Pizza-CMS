<!-- resources/views/create.blade.php -->
<div class="add-pizza-form" id="addPizzaForm" style="display: none;">
    <form action="{{ route('storePizza') }}" method="post">
        @csrf
        <input type="hidden" name="updateID" value="0"> <!-- Provide a default value for updateID -->
        <table class="pizzas_seite_table">
            <tr>
                <td class="id-column">New</td>
                <td class="pizzaname-column"><input type="text" name="PizzaName" required></td>
                <td class="preis-column"><input type="number" name="Preis" step="0.01" required></td>
                <td class="zutaten-column"><input type="text" name="Zutaten" required></td>
                <td class="beschreibung-column"><textarea name="Beschreibung" required></textarea></td>
                <td colspan="2">
                    <button type="submit" class="button">Save</button>
                    <button type="button" class="button" onclick="toggleAddPizzaForm()">Cancel</button>
                </td>
            </tr>
        </table>
    </form>
</div>
