<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Membuat slug unik
    private function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 2;

        while (
            Product::where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    // Menampilkan semua obat
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar obat berhasil diambil.',
            'data' => $products
        ], 200);
    }

    // Menambahkan obat
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'medicine_code' => 'required|string|max:255|unique:products,medicine_code',
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'product_type' => 'required|in:obat_bebas,obat_bebas_terbatas,obat_resep,alat_kesehatan,perawatan',
            'expiry_date' => 'required|date',
            'image' => 'nullable|string|max:255',
            'requires_prescription' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['slug'] = $this->generateUniqueSlug($validated['name']);

        $product = Product::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Obat berhasil ditambahkan.',
            'data' => $product
        ], 201);
    }

    // Detail obat
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail obat berhasil diambil.',
            'data' => $product
        ], 200);
    }

    // Memperbarui obat
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'sometimes|required|exists:categories,id',
            'medicine_code' => 'sometimes|required|string|max:255|unique:products,medicine_code,' . $id,
            'name' => 'sometimes|required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'product_type' => 'sometimes|required|in:obat_bebas,obat_bebas_terbatas,obat_resep,alat_kesehatan,perawatan',
            'expiry_date' => 'sometimes|required|date',
            'image' => 'nullable|string|max:255',
            'requires_prescription' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if (isset($validated['name'])) {
            $validated['slug'] = $this->generateUniqueSlug(
                $validated['name'],
                (int) $id
            );
        }

        $product->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil diperbarui.',
            'data' => $product
        ], 200);
    }

    // Menghapus obat
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Obat berhasil dihapus.'
        ], 200);
    }
}