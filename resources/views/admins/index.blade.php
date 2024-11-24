@include('/plantilla/navbarAdmins')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    <div class="grid justify-center"
        style="background-image: url('/storage/nosotros.jpg'); height: 57rem; background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <br /><br /><br /><br /><br /><br /><br /><br />
        <div>
            <h1
                class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl dark:text-white text-center">
                Aquí puedes actualizar
                <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                    tus registros
                </span>
            </h1>
        </div>
        <div class="grid" style="grid-template-columns: repeat(3, 1fr); gap: 2rem;">
            <div>
                <a href=""
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Clientes
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        <ol>
                            <li>°Listar</li>
                            <li>°Agregar</li>
                            <li>°Editar</li>
                            <li>°ELIMINAR</li>
                        </ol>
                    </p>
                </a>
            </div>
            <div>
                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Inventario
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        <ol>
                            <li>°Listar</li>
                            <li>°Agregar</li>
                            <li>°Editar</li>
                            <li>°ELIMINAR</li>
                        </ol>
                    </p>
                </a>
            </div>
            <div>
                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Servicios
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        <ol>
                            <li>°Listar</li>
                            <li>°Agregar</li>
                            <li>°Editar</li>
                            <li>°ELIMINAR</li>
                        </ol>
                    </p>
                </a>
            </div>
            <div>
                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Empleados
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        <ol>
                            <li>°Listar</li>
                            <li>°Agregar</li>
                            <li>°Editar</li>
                            <li>°ELIMINAR</li>
                        </ol>
                    </p>
                </a>
            </div>
            <div>
                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Proveedores
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        <ol>
                            <li>°Listar</li>
                            <li>°Agregar</li>
                            <li>°Editar</li>
                            <li>°ELIMINAR</li>
                        </ol>
                    </p>
                </a>
            </div>
            <div>
                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Categorías
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        <ol>
                            <li>°Listar</li>
                            <li>°Agregar</li>
                            <li>°Editar</li>
                            <li>°ELIMINAR</li>
                        </ol>
                    </p>
                </a>
            </div>
        </div>
    </div>

    <footer>
        @include('plantilla/footer')
    </footer>
</body>
</html>