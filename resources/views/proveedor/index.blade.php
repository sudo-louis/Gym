@include('/plantilla/navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proveedores</title>
</head>
<body>
    <div class="mt-5">
        <a href="{{URL('proveedor/create')}}" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Registrar Nuevo Proveedor</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table style="margin:2rem 0rem;" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Logo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre de la empresa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre del Contacto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Teléfono
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Productos que Provee
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$proveedor->id}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <center>
                                <img src="{{asset('storage/uploads').'/'.$proveedor->foto}}" width="100" alt="LOGO">
                            </center>
                        </th>
                        <td class="px-6 py-4">
                            {{$proveedor->nombre_empresa}}
                        </td>
                        <td class="px-6 py-4">
                            {{$proveedor->nombre_contacto}}
                        </td>
                        <td class="px-6 py-4">
                            {{$proveedor->telefono}}
                        </td>
                        <td class="px-6 py-4">
                            {{$proveedor->correo}}
                        </td>
                        <td class="px-6 py-4">
                            {{$proveedor->productos_suministrados}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{URL('/proveedor/'.$proveedor->id.'/edit')}}">Editar</a>
                            <form action="{{URL('/proveedor/'.$proveedor->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input style="cursor: pointer; color: red" type="submit" value="Eliminar" onclick="return confirm('¿Desas eliminar este Proveedor?')" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$proveedores->links()}}
    </div>
</body>
</html>
