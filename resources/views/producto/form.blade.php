<div class="mb-5">
    <label for="foto" class="block mb-2 text-sm font-medium text-white dark:text-white">Subir imagen: </label>
    @if(isset($producto->foto))
        <img src="{{ asset('storage'.'/'.$producto->foto) }}" width="200" alt="imagen del producto">
    @endif
    <input id="foto" name="foto" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
</div>
<div class="mb-5">
    <label for="nombre_producto" class="block mb-2 text-sm font-medium text-white dark:text-white">Nombre del Producto: </label>
    <input type="text" id="nombre_producto" name="nombre_producto"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        value="{{isset($producto->nombre_producto)?$producto->nombre_producto:''}}" rerquired />
</div>
<div class="mb-5">
    <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="descripcion">Descripcion: </label>
    <input name="descripcion" id="descripcion" type="text"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        value="{{isset($producto->descripcion)?$producto->descripcion:''}}" required />
</div>
<div class="mb-5">
    <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="proveedor">Selecciona un Proveedor: </label>
    <select name="proveedor" id="proveedor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option disabled selected>-- Selecciona un proveedor --</option>
        @foreach($prdb as $proveedor)
            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre_contacto }}</option>
        @endforeach
    </select>
</div>
<div class="mb-5">
    <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="categoria">Selecciona un categoría: </label>
    <select name="categoria" id="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option disabled selected>-- Selecciona un categoría --</option>
        @foreach($ctdb as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
        @endforeach
    </select>
</div>
<div class="mb-5">
    <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="cantidad_en_stock">Cantidad en Stock: </label>
    <input name="cantidad_en_stock" id="cantidad_en_stock" type="number" min="1"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        value="{{isset($producto->cantidad_en_stock)?$producto->cantidad_en_stock:''}}" required />
</div>
<div class="mb-5">
    <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="precio">Precio: </label>
    <input name="precio" id="precio" type="number" min="1"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        value="{{isset($producto->precio)?$producto->precio:''}}" required />
</div>
<a href="{{URL('/producto')}}" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Regresar</a>
<button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar
</button>
