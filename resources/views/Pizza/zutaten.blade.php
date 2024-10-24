<!DOCTYPE html>
<html>
<head>
    <title>Pizza CMS - Zutaten</title>
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/113cf8dfd4.js" crossorigin="anonymous"></script>

    <style>
        /* Style for the ingredients table */
        .zutaten_seite_table {
          width: auto; /* Allow table to expand */
          border-collapse: collapse;
          border-width: thick;
          margin-left: 250px; /* Push the table to the right by the sidebar width */
        }

        .zutaten_seite_table th, .zutaten_seite_table td {
          border: 3px solid black;
          padding: 8px;
          text-align: left;
          border-top: none; /* Remove top border for all cells */
          border-bottom: none; /* Remove bottom border for all cells initially */
        }

        /* Add bottom border to the first row (header) only */
        .zutaten_seite_table tr:first-child th {
          border-bottom: 3px solid black;
        }

        /* Remove left border from the first column */
        .zutaten_seite_table tr td:first-child,
        .zutaten_seite_table tr th:first-child {
          border-left: none;
        }

        /* Remove right border from the last column */
        .zutaten_seite_table tr td:last-child,
        .zutaten_seite_table tr th:last-child {
          border-right: none;
        }

        /* Column width definitions */
        .id-column { width: 10%; }
        .zutatenname-column { width: 40%; }
        .beschreibung-column { width: 50%; }

        /* Style for the add ingredient button */
        .addingredient {
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

        /* Container for the add ingredient button */
        .button-container {
          display: flex;
          justify-content: flex-end;
          margin-bottom: 10px;
        }

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

        .sidebar {
          height: 100%;
          width: 250px;  /* Adjust width as needed */
          position: fixed;
          z-index: 1;
          top: 25px;  /* Position below the top bar */
          left: 0;
          background-color: #ffffff;
          overflow-x: hidden;
          padding-top: 20px;
          border-right: 3px solid black; /* Add black border to the right */
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
          margin-left: 250px; /* Same as sidebar width */
          padding: 0px 10px;
        }

        /* Style for alternating row colors */
        .zutaten_seite_table tr:nth-child(even) {
          background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="left-side">
            <i class="fas fa-bars menu-icon"></i>
        </div>
        <div class="right-side">
        </div>
    </div>
    <div class="sidebar">
        <a href="{{ route('pizza.index') }}"><i class="fas fa-pizza-slice"></i> Pizzas</a>
        <a href="{{ route('zutaten') }}" style="background-color: rgb(0, 0, 0);"><i class="fas fa-seedling"></i> Zutaten</a>
    </div>
    <div class="content">
        <h2>Zutaten</h2>
        <div class="button-container">
            <button type="button" class="addingredient" onclick="toggleAddIngredientForm()">+ Zutat</button>
        </div>

        <table class="zutaten_seite_table">
            <thead>
                <tr>
                    <th class="id-column">Id</th>
                    <th class="zutatenname-column">Name</th>
                    <th class="beschreibung-column">Beschreibung</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="id-column">1</td>
                    <td class="zutatenname-column">Tomato</td>
                    <td class="beschreibung-column">Fresh tomatoes</td>
                    <td>
                        <button class="button">
                            <i class="fas fa-pen"></i>
                        </button>
                    </td>
                    <td>
                        <button class="button">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>

        <!-- Placeholder for the Add Ingredient Form -->
        <div id="addIngredientForm" style="display:none;">
            <!-- Add Ingredient Form Content -->
        </div>
    </div>

    <script>
        function toggleAddIngredientForm() {
            var form = document.getElementById('addIngredientForm');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }
    </script>
</body>
</html>
