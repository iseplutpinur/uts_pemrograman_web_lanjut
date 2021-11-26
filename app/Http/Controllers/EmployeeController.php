<?php

namespace App\Http\Controllers;

use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil semua record pada tabel employees
        $employees = EmployeeModel::all();
        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan halaman create
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi input data employee
        $request->validate([
            'emp_id' => ['required', 'string', 'max:10', 'unique:employees'],
            'emp_name' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:100'],
            'emp_email' => ['required', 'string', 'email', 'max:50', 'unique:employees'],
            'emp_phone' => ['required', 'string', 'max:15', 'unique:employees'],
            'emp_address' => 'required',
        ]);

        //insert setiap request dari form ke dalam database
        //Jika menggunakan metode ini, nama field pada tabel dan form harus sama
        EmployeeModel::create($request->all());

        /// redirect jika sukses menyimpan data
        return redirect()->route('employees.index')
            ->with('success', 'Employee Data saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeModel $employee)
    {
        // dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        // berdasarkan id yang dipilih
        // href="{{ route('employee.show',$employeeModel->id) }}
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeModel $employee)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('employees.edit',$employee->id) }}
        return view('employees.edit', compact('employee'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeModel $employee)
    {
        //validasi update data employee
        $request->validate([
            'emp_id' => ['required', 'string', 'max:10'],
            'emp_name' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:50'],
            'emp_email' => ['required', 'string', 'email', 'max:50'],
            'emp_phone' => ['required', 'string', 'max:15'],
            'emp_address' => 'required',
        ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $employee->update($request->all());

        /// setelah berhasil mengubah data
        return redirect()->route('employees.index')
            ->with('success', 'Employee data updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeModel $employee)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee data deleted successfully');
    }
}
