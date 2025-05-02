<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\view\view;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function show()
    {
        return view('mahasiswa',[
            'nama' => 'John Doe',
            'nim' => '123456789',
            'jurusan' => 'Teknik Informatika',
            'angkatan' => '2020',
        ]);
    }
}
