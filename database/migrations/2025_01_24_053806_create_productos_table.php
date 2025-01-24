<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto', 100);
            $table->string('descripcion', 255);
            $table->unsignedBigInteger('proveedor');
            $table->unsignedBigInteger('categoria');
            $table->integer('cantidad_en_stock');
            $table->decimal('precio', 10, 2);
            $table->string('foto', 255);
            $table->timestamps();

            $table->foreign('proveedor')
                    ->references('id')
                    ->on('proveedores')
                    ->onDelete('cascade');

            $table->foreign('categoria')
                    ->references('id')
                    ->on('categorias')
                    ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
