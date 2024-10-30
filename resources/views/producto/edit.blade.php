@include('plantilla/navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Producto</title>
</head>
<body>
    <h1 class="text-center m-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl dark:text-white">Editar un <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">Producto</mark> existente</h1>
    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{URL('/producto/'.$producto->ID)}}" enctype="multipart/form-data" method="POST" class="max-w-sm mx-auto text-center mt-5">
        @csrf
        @method('PATCH')
        @include('producto.form')
    </form>
</body>
</html>