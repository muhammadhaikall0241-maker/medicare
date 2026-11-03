<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    // Menampilkan semua staf
    public function index()
    {
        $staff = Staff::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar staf berhasil diambil.',
            'data' => $staff
        ], 200);
    }

    // Menambahkan staf
    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_code' => 'nullable|string|max:255|unique:staff,staff_code',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $validated['staff_code'] = $validated['staff_code']
            ?? 'STF-' . strtoupper(Str::random(6));

        $staff = Staff::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Staf berhasil ditambahkan.',
            'data' => $staff
        ], 201);
    }

    // Detail staf
    public function show(string $id)
    {
        $staff = Staff::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail staf berhasil diambil.',
            'data' => $staff
        ], 200);
    }

    // Memperbarui staf
    public function update(Request $request, string $id)
    {
        $staff = Staff::findOrFail($id);

        $validated = $request->validate([
            'staff_code' => 'sometimes|required|string|max:255|unique:staff,staff_code,' . $id,
            'name' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string',
            'birth_date' => 'sometimes|required|date',
            'birth_place' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
        ]);

        $staff->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data staf berhasil diperbarui.',
            'data' => $staff
        ], 200);
    }

    // Menghapus staf
    public function destroy(string $id)
    {
        $staff = Staff::findOrFail($id);

        $staff->delete();

        return response()->json([
            'success' => true,
            'message' => 'Staf berhasil dihapus.'
        ], 200);
    }
}