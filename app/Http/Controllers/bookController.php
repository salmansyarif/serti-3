<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = book::all();
        return view('books.index')->with(compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'penulis'=>'required',
            'kategori'=>'required',
            'status'=>'required|boolean',
            'tahun_terbit'=>'required|integer',
            'jumlah'=>'required|integer',
            'deskripsi'=>'required',
        ]);

        // Menyimpan data buku baru
        book::create($request->all());

        // Menambahkan pesan flash sebelum melakukan redirect
        session()->flash('success', 'Buku berhasil ditambahkan!');

        // Redirect ke halaman index
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = book::findOrFail($id);

        // Mengirim data produk ke halaman view yang bernama edit
        return view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul'=>'required',
            'penulis'=>'required',
            'kategori'=>'required',
            'status'=>'required|boolean',
            'tahun_terbit'=>'required|integer',
            'jumlah'=>'required|integer',
            'deskripsi'=>'required',
        ]);

        // Mencari buku berdasarkan ID dan memperbarui datanya
        $books = book::findOrFail($id);
        $books->update($request->all());

        // Menambahkan pesan flash sebelum melakukan redirect
        session()->flash('success', 'Buku berhasil diperbarui!');

        // Redirect ke halaman index
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = book::findOrFail($id);   

        // Menghapus buku
        $books->delete();

        // Menambahkan pesan flash sebelum redirect
        return redirect()->route('books.index')->with('success', 'Data berhasil dihapus');
    }
}
