<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Employee::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Employee::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('datapegawai', compact('data'));
    }

    public function barang(Request $request)
    {

        return view('databarang');
    }

    public function tambahpegawai()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        $data = Employee::create($validatedData);
        if ($request->hasFile('image')) {
            $request->file('image')->move('fotopegawai/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('pegawai')->with('success', 'Data berhasil ditambahkan');
    }

    public function tampildata(Request $request, $id)
    {
        $data = Employee::find($id);

        return view('edit', compact('data'));
    }

    public function editpegawai(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'image' => 'image|file|max:1024'
        ]);
        $data = Employee::find($id);

        $data->update($validatedData);

        if (session('halaman_url')) {
            return redirect(session('halaman_url'))->with('update', 'Data berhasil diupdate');
        }
        return redirect()->route('pegawai')->with('update', 'Data berhasil diupdate');
    }


    public function hapusdata($id)
    {
        $data = Employee::find($id);

        $data->delete();

        return redirect()->route('pegawai')->with('danger', 'Data berhasil dihapus');
    }

    public function exportpdf()
    {
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datapegawai-pdf');
        return $pdf->download('data.pdf');
    }

    public function landing()
    {
        return view('landing');
    }
}
