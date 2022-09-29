<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Employee;
use App\Models\User;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedFields = $this->validateEmployee($request);
        $user = $this->createUser($request);
        $address = $this->createAddress($request);
        
        $fields = array_merge(
            $validatedFields, 
            ['user_id' => $user->id, 'address_id' => $address->id]
        );

        Employee::create($fields);
        session()->flash('success', 'Empleado creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    private function validateEmployee(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'date_of_birth' => 'required|date',
            'DNI' => 'required|numeric',
            'email' => 'required|email',
            'phone_numeric' => 'nullable|numeric|max:14',
            'plan_id' => 'numeric'
        ]);
    }

    private function createUser(Request $request) 
    {
        return User::create($request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role_id' => 'required'
        ]));
    }

    private function createAddress(Request $request)
    {
        return Address::create($request->validate([
            'street' => 'nullable',
            'number' => 'nullable|max:5',
            'city' => 'required|string',
            'province' => 'required|string'
        ]));
    }
}
