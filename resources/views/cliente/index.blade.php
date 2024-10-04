@include('/plantilla/navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
</head>
<body>
    <div class="mt-5">
        <a href="{{URL('cliente/create')}}" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Registrar Nuevo Cliente</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table style="margin:2rem 0rem;" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Imagen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Apellido
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Teléfono
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de registro
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$cliente->ID}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <center>
                                <img width="200" src="{{asset('storage/').$cliente->foto}}" alt="imagen del Cliente">
                            </center>
                        </th>
                        <td class="px-6 py-4">
                            {{$cliente->nombre}}
                        </td>
                        <td class="px-6 py-4">  
                            {{$cliente->apellido}}
                        </td>
                        <td class="px-6 py-4">
                            {{$cliente->telefono}}
                        </td>
                        <td class="px-6 py-4">
                            {{$cliente->correo}}
                        </td>
                        <td class="px-6 py-4">
                            {{$cliente->fecha_registro}}
                        </td>
                        <td class="px-6 py-4">
                            {{$cliente->status}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{URL('/cliente/'.$cliente->ID.'/edit')}}">Editar</a>
                            <form action="{{URL('/cliente/'.$cliente->ID)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input style="cursor: pointer; color: red" type="submit" value="Eliminar" onclick="return confirm('¿Desas eliminar este Cliente?')" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>