<!DOCTYPE html>
<html>
<head>
    <title>Pizza CMS - Pizzas</title>
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/113cf8dfd4.js" crossorigin="anonymous"></script>

    <style>
        /* Style for the pizza table */
        .pizzas_seite_table {
          width: auto; /* Allow table to expand */
          border-collapse: collapse;
          border-width: thick;
          margin-left: 250px; /* Push the table to the right by the sidebar width */
        }

        .pizzas_seite_table th, .pizzas_seite_table td {
          border: 3px solid black;
          padding: 8px;
          text-align: left;
          border-top: none; /* Remove top border for all cells */
          border-bottom: none; /* Remove bottom border for all cells initially */
        }

        /* Add bottom border to the first row (header) only */
        .pizzas_seite_table tr:first-child th {
          border-bottom: 3px solid black;
        }

        /* Remove left border from the first column */
        .pizzas_seite_table tr td:first-child,
        .pizzas_seite_table tr th:first-child {
          border-left: none;
        }

        /* Remove right border from the last column */
        .pizzas_seite_table tr td:last-child,
        .pizzas_seite_table tr th:last-child {
          border-right: none;
        }

        /* Column width definitions */
        .id-column { width: 10%; }
        .pizzaname-column { width: 20%; }
        .preis-column { width: 20%; }
        .zutaten-column { width: 20%; }
        .beschreibung-column { width: 50%; }

        /* Style for the add pizza button */
        .addpizza {
          background-color: #000000;
          border: none;
          color: white;
          padding: 8px 16px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 14px;
          margin: 4px 2px;
          cursor: pointer;
        }

        /* Style for the action buttons (edit, delete) */
        .button {
          background-color: #000000;
          border: none;
          color: white;
          padding: 8px 16px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 14px;
          margin: 4px 2px;
          cursor: pointer;
        }

        /* Container for the add pizza button */
        .button-container {
          display: flex;
          justify-content: flex-end;
          margin-bottom: 10px;
        }

        /* Style for the top bar */
        .top-bar {
          background-color: #000000;
          color: white;
          display: flex;
          align-items: center;
          padding: 10px;
          width: 100%;
          position: fixed; /* Keep the bar at the top */
          top: 0;         /* Position it at the very top */
          left: 0;        /* Position it at the left edge */
          z-index: 100;   /* Ensure it's on top of other elements */
        }

        .left-side {
          display: flex;
          align-items: center;
          width: 50%;
        }

        .menu-icon {
          font-size: 24px;
          cursor: pointer;
          margin-right: 10px;
        }

        .title {
          font-size: 18px;
        }

        .right-side {
          display: flex;
          justify-content: flex-end;
          align-items: center;
          width: 50%;
        }

        /* Add padding to the top of the content to avoid overlap */
        body {
          padding-top: 50px;
        }

        /* Style for the sidebar */
        .sidebar {
          height: 100%;
          width: 250px;  /* Adjust width as needed */
          position: fixed;
          z-index: 1;
          top: 24px;  /* Position below the top bar */
          left: 0;
          background-color: #ffffff;
          overflow-x: hidden;
          padding-top: 20px;
          border-right: 3px solid black; /* Add black border to the right */
          display: block; /* Ensure the sidebar is visible by default */
        }

        .sidebar a {
          padding: 6px 8px 6px 16px;
          text-decoration: none;
          font-size: 20px;
          color: #636363;
          display: block;
          text-align: center; /* Center the text */
        }

        .sidebar a:hover {
          color: #f1f1f1;
        }

        .main {
          margin-left: 250px;
          padding: 0px 10px;
        }

        /* Style for alternating row colors */
        .pizzas_seite_table tr:nth-child(even) {
          background-color: #f2f2f2;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Top bar with menu icon -->
    <div class="top-bar">
        <div class="left-side">
            <i class="fas fa-bars menu-icon" onclick="toggleSidebar()"></i>
        </div>
        <div class="right-side">
        </div>
    </div>
    <!-- Sidebar with navigation links -->
    <div class="sidebar" id="sidebar">
        <a href="{{ route('pizza.index') }}" style="background-color: rgb(0, 0, 0);"><i class="fas fa-pizza-slice"></i> Pizzas</a>
        <a href="{{ route('zutaten') }}"><i class="fas fa-seedling"></i> Zutaten</a>
    </div>
    <!-- Main content area -->
    <div class="content">
        <h2 style="text-align: center;">Editing Page</h2>
        <!-- Form to add a new pizza -->
        <form action="{{ route('storePizza') }}" method="post">
            @csrf
            <div class="button-container">
                <button type="button" class="addpizza" onclick="toggleAddPizzaForm()">+ Pizza</button>
            </div>
        </form>

        <!-- Table displaying pizzas -->
        <table class="pizzas_seite_table">
            <thead>
                <tr>
                    <th class="id-column">Id</th>
                    <th class="pizzaname-column">Name</th>
                    <th class="preis-column">Preis</th>
                    <th class="zutaten-column">Zutaten</th>
                    <th class="beschreibung-column">Beschreibung</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pizzas as $pizza)
                <tr id="pizza-row-{{ $pizza->id }}">
                    <td class="id-column">{{ $pizza->id }}</td>
                    <td class="pizzaname-column">
                        <span class="view-mode">{{ $pizza->PizzaName }}</span>
                        <input type="text" name="PizzaName" value="{{ $pizza->PizzaName }}" class="edit-mode hidden">
                    </td>
                    <td class="preis-column">
                        <span class="view-mode">{{ $pizza->Preis }}</span>
                        <input type="text" name="Preis" value="{{ $pizza->Preis }}" class="edit-mode hidden">
                    </td>
                    <td class="zutaten-column">
                        <span class="view-mode">{{ $pizza->Zutaten }}</span>
                        <input type="text" name="Zutaten" value="{{ $pizza->Zutaten }}" class="edit-mode hidden">
                    </td>
                    <td class="beschreibung-column">
                        <span class="view-mode">{{ $pizza->Beschreibung }}</span>
                        <input type="text" name="Beschreibung" value="{{ $pizza->Beschreibung }}" class="edit-mode hidden">
                    </td>
                    <td>
                        <button class="edit-button view-mode" onclick="toggleEditMode({{ $pizza->id }})"><i class="fas fa-edit"></i></button>
                        <button class="save-button edit-mode hidden" onclick="saveChanges({{ $pizza->id }}),refreshPage()"><i class="fas fa-check"></i></button>
                    </td>
                    <td>
                        <a href="{{ route('pizza.confirmDelete', $pizza->id) }}" ><i class="fas fa-trash"></i></button>
                        <a class="cancel-button edit-mode hidden" onclick="toggleEditMode({{ $pizza->id }})"><i class="fas fa-times"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Include the Add Pizza Form -->
        @include('pizza/create')

    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            if (sidebar.style.display === 'none' || sidebar.style.display === '') {
                sidebar.style.display = 'block';
            } else {
                sidebar.style.display = 'none';
            }
        }

        function toggleAddPizzaForm() {
            var form = document.getElementById('addPizzaForm');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }

        function toggleEditMode(pizzaId) {
            const row = document.getElementById(`pizza-row-${pizzaId}`);
            const viewElements = row.querySelectorAll('.view-mode');
            const editElements = row.querySelectorAll('.edit-mode');

            viewElements.forEach(el => el.classList.toggle('hidden'));
            editElements.forEach(el => el.classList.toggle('hidden'));
        }

        function saveChanges(pizzaId) {
            const row = document.getElementById(`pizza-row-${pizzaId}`);
            const formData = new FormData();

            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PUT');
            formData.append('PizzaName', row.querySelector('input[name="PizzaName"]').value);
            formData.append('Preis', row.querySelector('input[name="Preis"]').value);
            formData.append('Zutaten', row.querySelector('input[name="Zutaten"]').value);
            formData.append('Beschreibung', row.querySelector('input[name="Beschreibung"]').value);

            fetch(`{{ url('/pizza/update') }}/${pizzaId}`, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const pizzaNameElement = row.querySelector('.view-mode span:nth-child(1)');
                    const preisElement = row.querySelector('.view-mode span:nth-child(2)');
                    const zutatenElement = row.querySelector('.view-mode span:nth-child(3)');
                    const beschreibungElement = row.querySelector('.view-mode span:nth-child(4)');

                    if (pizzaNameElement) pizzaNameElement.innerText = data.pizza.PizzaName;
                    if (preisElement) preisElement.innerText = data.pizza.Preis;
                    if (zutatenElement) zutatenElement.innerText = data.pizza.Zutaten;
                    if (beschreibungElement) beschreibungElement.innerText = data.pizza.Beschreibung;

                    toggleEditMode(pizzaId);
                } else {
                    alert('Failed to update pizza');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to update pizza');
            });
        }
        function refreshPage(){
            window.location.reload();
        }
    </script>
</body>
</html>
