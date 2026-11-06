<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    // Menampilkan semua pelanggan
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Daftar pelanggan berhasil diambil.',
            'data' => Customer::latest()->get()
        ], 200);
    }

    // Menambahkan pelanggan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_code' => [
                'nullable',
                'string',
                'max:30',
                'unique:customers,customer_code'
            ],
            'name' => [
                'required',
                'string',
                'max:100',
                "regex:/^[\p{L}\s'.-]+$/u"
            ],
            'address' => [
                'required',
                'string',
                'min:5',
                'max:1000'
            ],
            'phone' => [
                'required',
                'string',
                'regex:/^(?:\+62|62|0)[0-9]{8,13}$/'
            ],
        ], [
            'customer_code.unique' => 'Kode pelanggan sudah digunakan.',
            'name.required' => 'Nama pelanggan wajib diisi.',
            'name.regex' => 'Nama hanya boleh berisi huruf, spasi, titik, tanda petik, dan tanda hubung.',
            'name.max' => 'Nama maksimal 100 karakter.',
            'address.required' => 'Alamat wajib diisi.',
            'address.min' => 'Alamat minimal 5 karakter.',
            'address.max' => 'Alamat maksimal 1000 karakter.',
            'phone.required' => 'Nomor HP wajib diisi.',
            'phone.regex' => 'Nomor HP harus menggunakan format Indonesia, misalnya 081234567890 atau +6281234567890.',
        ]);

        $validated['customer_code'] = $validated['customer_code']
            ?? 'PLG-' . strtoupper(Str::random(6));

        $customer = Customer::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pelanggan berhasil ditambahkan.',
            'data' => $customer
        ], 201);
    }

    // Detail pelanggan
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail pelanggan berhasil diambil.',
            'data' => $customer
        ], 200);
    }

    // Memperbarui pelanggan
    public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'customer_code' => [
                'sometimes',
                'required',
                'string',
                'max:30',
                'unique:customers,customer_code,' . $customer->id
            ],
            'name' => [
                'sometimes',
                'required',
                'string',
                'max:100',
                "regex:/^[\p{L}\s'.-]+$/u"
            ],
            'address' => [
                'sometimes',
                'required',
                'string',
                'min:5',
                'max:1000'
            ],
            'phone' => [
                'sometimes',
                'required',
                'string',
                'regex:/^(?:\+62|62|0)[0-9]{8,13}$/'
            ],
        ], [
            'customer_code.required' => 'Kode pelanggan wajib diisi.',
            'customer_code.unique' => 'Kode pelanggan sudah digunakan.',
            'name.required' => 'Nama pelanggan wajib diisi.',
            'name.regex' => 'Nama hanya boleh berisi huruf dan tanda baca yang diperbolehkan.',
            'address.required' => 'Alamat wajib diisi.',
            'address.min' => 'Alamat minimal 5 karakter.',
            'phone.required' => 'Nomor HP wajib diisi.',
            'phone.regex' => 'Format nomor HP tidak valid. Contoh: 081234567890.',
        ]);

        $customer->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil diperbarui.',
            'data' => $customer->fresh()
        ], 200);
    }

    // Menghapus pelanggan
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pelanggan berhasil dihapus.'
        ], 200);
    }
}
