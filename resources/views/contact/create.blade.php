<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneBook Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">

    <h3 class="text-center mt-3">Dodavanje novog kontakta</h3>

    <div class="row">
        <div class="col-8 offset-2">
            <form action="{{ route('contact.save') }}" method="POST">
                @csrf

                <label for="firstName">Ime:</label>
                <input type="text" id="firstName" class="form-control" name="first_name">

                <label for="lastName">Prezime:</label>
                <input type="text" id="lastName" class="form-control" name="last_name">

                <label for="email">Email:</label>
                <input type="email" id="email" class="form-control" name="email">

                <button class="btn btn-success w-100 mt-3" id="saveBtn">Sačuvaj</button>

            </form>
        </div>
    </div>
</div>

</body>
</html>
