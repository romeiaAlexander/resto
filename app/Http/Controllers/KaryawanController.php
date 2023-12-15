<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;


class KaryawanController extends Controller
{
    public function index() {

        $karyawans = Karyawan::all();

        return view('karyawan.index', compact('karyawans'));
    }

    public function create() {

        return view('karyawan.create');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'status' => 'required',
            'foto' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $karyawans = Karyawan::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'status' => $request->status,
            'foto' => $request->foto
        ]);

        return redirect()->route('karyawan.index');

    }

    public function edit($id) {

        $karyawans = Karyawan::find($id);

        return view('karyawan.edit', compact('karyawans'));

    }

    public function update(Request $request, $id) {

        Karyawan::where('id', $id)->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'status' => $request->status,
            'foto' => $request->foto
        ]);

        return redirect()->route('karyawan.index');
    }

    public function destroy($id) {

        $karyawans = Karyawan::find($id);

        $karyawans->delete();

        return redirect()->route('karyawan.index');
    }

}
