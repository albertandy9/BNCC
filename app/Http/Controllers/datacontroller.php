<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\keranjangs;
use App\Models\login;
use App\Models\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class datacontroller extends Controller
{

    public function store_barang(Request $request){
        // Validate the request data, including the file input
        $request->validate([
            'kategori' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'fileInput' => 'required|file|mimes:jpeg,png,pdf,docx', // Adjust file types as needed
        ]);

        // Retrieve the file from the request
        $file = $request->file('fileInput');

        // Store the file in the 'uploads' directory (you can customize the directory as needed)
        $path = $file->store('/uploads');

        // Create the record in the 'barang' table with the file path
        barang::create([
            'barangid' => $request->barangid,
            'kategori' => $request->kategori,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'fileName' => $path, // Save the file path in the database
        ]);

        // Optionally, you can use Laravel's storage functionality to work with the file
        // For example, to get the URL of the stored file:
        // $fileUrl = Storage::url($path);

        // You can use $fileUrl in your views or return it in your response if needed

        // Redirect or return a response as needed
    }

    public function view_barang(){
        $barangs=barang::all();
        return view('viewbarang',compact('barangs'));
        // dd($barangs);
    }

    public function view_keranjang(){
        $keranjangs=keranjangs::all();
        return view('viewkeranjang',compact('keranjangs'));
        // dd($barangs);
    }

    // public function delete_barang($barangid){
    //     $barangdeleted = barang::find($id);
    //     $barangdeleted->delete();
    //     return redirect()->route('viewbarang');
    // }

    public function keranjang(Request $request){
        // Validate the request data, including the file input
        $request->validate([
            'kategori' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'fileInput' => 'required',
        ]);
    
        // $filewithoutpublic = substr($request->fileInput, 1);
        
        // Create the record in the 'barang' table with the file path
        keranjangs::create([
            'barangid' => $request->barangid,
            'kategori' => $request->kategori,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'fileName' => $request->fileInput, // Save the file path in the database
        ]);

        // Optionally, you can use Laravel's storage functionality to work with the file
        // For example, to get the URL of the stored file:
        // $fileUrl = Storage::url($path);

        // You can use $fileUrl in your views or return it in your response if needed

        // Redirect or return a response as needed
    }

    public function login(){
        return view('login');
    }

    public function store_login(Request $request){
        // Validate the request data, including the file input
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        // Check if user exists and password is correct
        $user = login::where('email','=',$request->email)->first();
        
        if ($user && ($request->password == $user->password)) {
            // Login successful, redirect to add_barang
            return redirect('view_barang');
        } else {
            // Login failed, redirect back with error message
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }
    
    public function store_register(Request $request){
        // Validate the request data, including the file input
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'noHP' => 'required',
        ]);

        login::create([
            'userid' => $request->userid,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'noHP' => $request->noHP,
        ]);

        // Optionally, you can use Laravel's storage functionality to work with the file
        // For example, to get the URL of the stored file:
        // $fileUrl = Storage::url($path);

        // You can use $fileUrl in your views or return it in your response if needed

        // Redirect or return a response as needed
    }
    public function view_register(){
        return view('register');
    }

    public function view_update(){
        return view('viewupdate');
    }

}
