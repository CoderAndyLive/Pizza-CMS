<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Löschen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-danger {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1>Sind Sie sicher, dass Sie diese Pizza löschen möchten?</h1>
        <form action="{{ route('pizza.destroy', $pizza->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Ja, löschen</button>
            <a href="{{ url('/') }}" class="btn btn-secondary">Abbrechen</a>
        </form>
    </div>
</body>
</html>
