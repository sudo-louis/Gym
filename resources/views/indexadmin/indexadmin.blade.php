@include('/plantilla/navbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>

<body>
    <div style="background-image: url('/storage/nosotros.jpg'); height: 57rem; background-repeat: no-repeat; background-size: cover; background-position: center center;"><br /><br /><br /><br /><br /><br /><br /><br />
        <div>
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl dark:text-white text-center">
                Aquí puedes actualizar
                <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                tus registros
                </span>
            </h1>
        </div>
    </div>


    <footer>
        @include('plantilla/footer')
    </footer>
</body>
</html>