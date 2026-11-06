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
        return response()->json([
            'success' => true,
            'message' => 'Daftar staf berhasil diambil.',
            'data' => Staff::latest()->get()
        ], 200);
    }

    // Menambahkan staf
    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_code' => 'nullable|string|max:30|unique:staff,staff_code',
            'name' => ['required', 'string', 'max:100', "regex:/^(?=.*\p{L})[\p{L}\s'.-]+$/u"],
            'address' => 'required|string|min:5|max:1000',
            'birth_date' => 'required|date_format:Y-m-d|before:today',
            'birth_place' => ['required', 'string', 'max:100', "regex:/^(?=.*\p{L})[\p{L}\s'.-]+$/u"],
            'phone' => ['required', 'string', 'regex:/^(?:\+62|62|0)[0-9]{8,13}$/'],
        ], [
            'staff_code.unique' => 'Kode staf sudah digunakan.',
            'name.required' => 'Nama staf wajib diisi.',
            'name.regex' => 'Nama staf hanya boleh berisi huruf dan tanda baca yang diperbolehkan.',
            'address.required' => 'Alamat wajib diisi.',
            'address.min' => 'Alamat minimal 5 karakter.',
            'birth_date.required' => 'Tanggal lahir wajib diisi.',
            'birth_date.date_format' => 'Format tanggal harus YYYY-MM-DD.',
            'birth_date.before' => 'Tanggal lahir tidak boleh hari ini atau tanggal mendatang.',
            'birth_place.required' => 'Tempat lahir wajib diisi.',
            'birth_place.regex' => 'Format tempat lahir tidak valid.',
            'phone.required' => 'Nomor HP wajib diisi.',
            'phone.regex' => 'Nomor HP tidak valid. Contoh: 081234567890.',
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
            'staff_code' => 'sometimes|required|string|max:30|unique:staff,staff_code,' . $staff->id,
            'name' => ['sometimes', 'required', 'string', 'max:100', "regex:/^(?=.*\p{L})[\p{L}\s'.-]+$/u"],
            'address' => 'sometimes|required|string|min:5|max:1000',
            'birth_date' => 'sometimes|required|date_format:Y-m-d|before:today',
            'birth_place' => ['sometimes', 'required', 'string', 'max:100', "regex:/^(?=.*\p{L})[\p{L}\s'.-]+$/u"],
            'phone' => ['sometimes', 'required', 'string', 'regex:/^(?:\+62|62|0)[0-9]{8,13}$/'],
        ], [
            'staff_code.unique' => 'Kode staf sudah digunakan.',
            'name.required' => 'Nama staf wajib diisi.',
            'name.regex' => 'Format nama staf tidak valid.',
            'address.required' => 'Alamat wajib diisi.',
            'address.min' => 'Alamat minimal 5 karakter.',
            'birth_date.required' => 'Tanggal lahir wajib diisi.',
            'birth_date.date_format' => 'Format tanggal harus YYYY-MM-DD.',
            'birth_date.before' => 'Tanggal lahir tidak boleh hari ini atau tanggal mendatang.',
            'birth_place.required' => 'Tempat lahir wajib diisi.',
            'birth_place.regex' => 'Format tempat lahir tidak valid.',
            'phone.required' => 'Nomor HP wajib diisi.',
            'phone.regex' => 'Format nomor HP tidak valid.',
        ]);

        $staff->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data staf berhasil diperbarui.',
            'data' => $staff->fresh()
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
