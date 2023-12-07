<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = student::orderBy('npm', 'asc')->get();
        return view('index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:students|digits:8',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
        ],[
            'npm.digits' => 'NPM harus memiliki 8 digit.',
            'npm.unique' => 'NPM Sudah Terdaftar',
        ]);

        student::create($request->all());

        return redirect()
            ->route('students.index')
            ->with('success-create', 'Student Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = student::find($id);

        return view('view', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = student::find($id);

        return view('edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        $validator = [
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
        ];
    
        // Cek apakah nilai NPM dalam permintaan berbeda dengan NPM saat ini
        if ($request->npm !== $student->npm) {
            $validator['npm'] = 'required|unique:students|digits:8';
        }
    
        $request->validate($validator, [
            'npm.digits' => 'NPM harus memiliki 8 digit.',
            'npm.unique' => 'NPM Sudah Terdaftar',
        ]);
        
        $student->npm = $request->input('npm');
        $student->nama = $request->input('nama');
        $student->kelas = $request->input('kelas');
        $student->jurusan = $request->input('jurusan');
        $student->no_hp = $request->input('no_hp');
        $student->save();

        return redirect()
            ->route('students.index')
            ->with('success-update', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        $student->delete();
        return redirect()
            ->route('students.index')
            ->with('success-delete', 'Data Deleted');
    }
}
