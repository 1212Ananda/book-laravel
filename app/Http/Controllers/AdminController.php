<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $book = Book::all();
        // dd($book);
        return view('home', ['listbook'=>$book]);
    }

    public function addbook(Request $request){
        // dd($request);

        $book = new Book; //membuat object model/tabel baru

        //kolom database = data yang akan dimansukan 
        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->tahun = $request->tahun;
        $book->penerbit = $request->penerbit;

        $book->save(); 
        return redirect()->back()->with('success','Data Berhasil Dimasukan');
    }
    public function editbook(Request $request){
        dd($request);

        $book =Book::find($request->id); //mencari berdasarkan id

        //kolom database = data yang akan dimansukan 
        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->tahun = $request->tahun;
        $book->penerbit = $request->penerbit;

        $book->save(); 
        return redirect()->back()->with('success','Data Berhasil Di update');
    }

    public function deletebook($id){
        $book = Book::find($id);
        //dd($book);
        $book->delete();
        return redirect()->back()->with('success','Data Berhasil Di Hapus');
    }

    public function detailbook($id){
        $book = Book::find($id);
        //dd($book);
        return view('detail', ['book'=> $book]);
    }
}
