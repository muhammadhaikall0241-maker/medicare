<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class StockMovementController extends Controller
{
    // Menampilkan riwayat pergerakan stok
    public function index()
    {
        $movements = StockMovement::with(['product', 'user'])
            ->latest()
            ->paginate(20);

        return response()->json([
            'success' => true,
            'message' => 'Riwayat stok berhasil diambil.',
            'data' => $movements
        ]);
    }

    // Mencatat stok masuk, keluar, dan penyesuaian
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => [
                'required',
                'integer',
                'exists:products,id'
            ],
            'type' => [
                'required',
                Rule::in(['stock_in', 'stock_out', 'adjustment'])
            ],
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:1000'
        ]);

        $movement = DB::transaction(function () use ($validated) {

            $product = Product::whereKey($validated['product_id'])
                ->lockForUpdate()
                ->firstOrFail();

            $before = (int) $product->stock;
            $quantity = (int) $validated['quantity'];

            if ($validated['type'] === 'stock_in') {

                $after = $before + $quantity;

            } elseif ($validated['type'] === 'stock_out') {

                if ($quantity > $before) {
                    throw ValidationException::withMessages([
                        'quantity' => [
                            'Stok tidak mencukupi untuk pengeluaran.'
                        ]
                    ]);
                }

                $after = $before - $quantity;

            } else {

                // Adjustment menetapkan jumlah stok akhir
                $after = $quantity;
            }

            $product->update([
                'stock' => $after
            ]);

            return StockMovement::create([
                'product_id' => $product->id,
                'user_id' => auth()->id(),
                'type' => $validated['type'],
                'quantity' => $quantity,
                'stock_before' => $before,
                'stock_after' => $after,
                'notes' => $validated['notes'] ?? null
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Perubahan stok berhasil dicatat.',
            'data' => $movement->load(['product', 'user'])
        ], 201);
    }

    // Menampilkan detail riwayat stok
    public function show(StockMovement $stockMovement)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail riwayat stok berhasil diambil.',
            'data' => $stockMovement->load(['product', 'user'])
        ]);
    }
}
