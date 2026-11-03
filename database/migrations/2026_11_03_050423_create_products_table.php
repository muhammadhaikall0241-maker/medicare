<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Relasi kategori
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->cascadeOnDelete();

            // Informasi produk
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('brand')->nullable();
            $table->text('description')->nullable();

            // Harga dan stok
            $table->decimal('price', 12, 2);
            $table->unsignedInteger('stock')->default(0);

            // Informasi obat
            $table->enum('product_type', [
                'obat_bebas',
                'obat_bebas_terbatas',
                'obat_resep',
                'alat_kesehatan',
                'perawatan'
            ])->default('perawatan');

            // Gambar dan status produk
            $table->string('image')->nullable();
            $table->boolean('requires_prescription')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};