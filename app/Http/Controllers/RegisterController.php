<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request) {
        // untuk memvalidasi register form
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:4|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // untuk encryptsi password
        $validatedData['password'] = bcrypt($validatedData['password']);

        // untuk memasukkan data yg sudah divalidasi ke database
        User::create($validatedData);

        // untuk menampilkan pesan registrasi berhasil
        $request->session()->flash('success', 'Registrasi Berhasil! Silahkan Login!');

        // untuk redirect user setelah register ke login
        return redirect('/login');
    }
}