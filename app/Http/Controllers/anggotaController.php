<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\pinjambuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class anggotaController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('anggota.index', compact('books'));
    }

    // Menampilkan form untuk peminjaman
    public function create()
    {
        $loans = PinjamBuku::with('book')->get();
        return view('anggota.create', compact('loans'));
    }

    // Proses peminjaman buku
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        $book = Book::findOrFail($request->book_id);

        if (!$book->status) {
            return back()->with('error', 'Buku tidak tersedia untuk dipinjam');
        }

        $book->decrement('jumlah');

        PinjamBuku::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'borrowed',
        ]);

        if ($book->jumlah <= 0) {
            $book->update([
                'status' => false,
                'loan_status' => 'borrowed',
            ]);
        } else {
            $book->update([
                'loan_status' => 'borrowed',
            ]);
        }

        return redirect()->back()->with('success', 'Buku berhasil dipinjam');
    }

    // Mengembalikan buku
    public function kembalikanBuku(PinjamBuku $pinjam)
    {
        DB::beginTransaction();

        try {
            $pinjam->status = 'returned'; // Update status menjadi 'returned'
            $pinjam->tanggal_kembali = now();
            $pinjam->save();

            $book = Book::findOrFail($pinjam->book_id);
            $book->jumlah += 1; // Tambahkan stok buku
            $book->status = true; // Set status buku menjadi tersedia
            $book->save();

            DB::commit();

            return redirect()->back()->with('success', 'Buku berhasil dikembalikan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengembalikan buku.');
        }
    }

    // Memperpanjang tanggal pengembalian buku
    public function perpanjangTanggal(Request $request, PinjamBuku $pinjam)
    {
        $request->validate([
            'tanggal_kembali' => 'required|date|after:' . $pinjam->tanggal_kembali,
        ]);

        $pinjam->update([
            'tanggal_kembali' => $request->input('tanggal_kembali'),
        ]);

        return redirect()->back()->with('success', 'Tanggal pengembalian berhasil diperpanjang.');
    }

    // Mengembalikan buku secara paksa
    public function kembalikanPaksa($id)
    {
        $pinjam = PinjamBuku::findOrFail($id);

        DB::beginTransaction();

        try {
            $pinjam->status = 'returned';
            $pinjam->tanggal_kembali = now();
            $pinjam->save();

            $book = Book::findOrFail($pinjam->book_id);
            $book->increment('jumlah'); // Tambah stok buku
            $book->status = true; // Set status buku menjadi tersedia lagi
            $book->save();

            DB::commit();

            return redirect()->back()->with('success', 'Buku berhasil dikembalikan secara paksa.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengembalikan buku.');
        }
    }

    public function loanHistory()
    {
        $books = Book::all();
        $pinjamBukus = PinjamBuku::all();
        return view('admin.loanHistory', compact('books', 'pinjamBukus'));
    }
}