<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Menampilkan semua transaksi milik pengguna yang terautentikasi
    public function index()
    {
        $transactions = Auth::user()->transactions; // Mengambil transaksi dari pengguna yang terautentikasi

        return response()->json($transactions);
    }

    // Menampilkan detail transaksi berdasarkan ID
    public function show($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction || $transaction->user_id !== Auth::id()) {
            return response()->json(['message' => 'Transaction not found or you do not have access to it'], 404);
        }

        return response()->json($transaction);
    }

    // Membuat transaksi baru
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'bank' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'no_rek' => 'required|string|max:255',
            'nominal' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $validatedData['user_id'] = Auth::id();
        $validatedData['status'] = 'menunggu';

        $transaction = Transaction::create($validatedData);

        return response()->json(['message' => 'Transaction created successfully', 'data' => $transaction], 201);
    }

    // Memperbarui transaksi berdasarkan ID
    public function admin_acc_deposit(Request $id)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 'diterima';
        $transaction->save();

        $nominal = $transaction->nominal;
        $user = User::find($transaction->user_id);
        $user->total_simpanan += $nominal;
        $user->save();

        return response()->json(['message' => 'Transaction updated successfully & User get the Balance', 'data' => $transaction]);
    }

    public function admin_dec_deposit(Request $id)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 'gagal';
        $transaction->save();

        return response()->json(['message' => 'Transaction updated successfully', 'data' => $transaction]);
    }

    // Menghapus transaksi berdasarkan ID
    public function delete($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction || $transaction->user_id !== Auth::id()) {
            return response()->json(['message' => 'Transaction not found or you do not have access to it'], 404);
        }

        $transaction->delete();

        return response()->json(['message' => 'Transaction deleted successfully']);
    }
}
