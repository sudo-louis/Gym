@include('plantilla/navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Empleado</title>
</head>
<body>
    <h1 class="text-center m-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl dark:text-white">Editar un <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">Empleado</mark> existente</h1>
    <form action="{{URL('/empleado/'.$empleado->ID)}}" method="POST" class="max-w-sm mx-auto text-center mt-5">
        @csrf
        @method('PATCH')
        @include('empleado.form')
    </form>
</body>
</html>