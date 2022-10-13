<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Employee;
use App\Enums\EmployeeRole;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(Controller::$RESULT_PAGINATION);
        $roles = EmployeeRole::array();
        return view('employees.index')
                ->with('employees', $employees)
                ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = EmployeeRole::array();
        $default_role = EmployeeRole::ADMINISTRATIVE->name;
        return view('employees.create')
            ->with('roles', $roles)
            ->with('default_role_id', $default_role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employeeFields = $this->validateEmployee($request);
        $user = User::create(
            array_merge(
                $this->validateUser($request),
                ['role' => UserRole::EMPLOYEE->name],
            )
        );

        $address = Address::create($this->validateAddress($request));

        $fields = array_merge(
            $employeeFields,
            ['user_id' => $user->id, 'address_id' => $address->id]
        );

        $employee = Employee::create($fields);

        $this->consistencyCheck($employee, $user, $address);

        session()->flash('success', 'Empleado creado exitosamente');

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $roles = EmployeeRole::array();

        return view('employees.edit')
                ->with('employee', $employee)
                ->with('roles', $roles);
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
        $employee->user->update($this->validateUserUpdate($request));
        $employee->address->update($this->validateAddress($request));
        $employee->update($this->validateEmployeeUpdate($request));

        return redirect(route('employees.index'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $this->deleteModels($employee, $employee->address, $employee->user);
        return redirect(route('employees.index'));
    }
    
    private function validateEmployee(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'date_of_birth' => 'required|date',
            'DNI' => ['required', 'numeric', Rule::unique('employees', 'DNI')],
            'email' => ['required', 'email', Rule::unique('employees', 'email')],
            'phone_number' => 'nullable|max:14',
            'role' => ['required', Rule::in(EmployeeRole::names())],
        ]);
    }

    private function validateEmployeeUpdate(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'date_of_birth' => 'required|date',
            'DNI' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'phone_number' => 'nullable|max:14',
            'role' => ['required', Rule::in(EmployeeRole::names())],
        ]);
    }

    private function validateUser(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:8|same:password_repeat',
        ]);
    }

    private function validateUserUpdate(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'email' => ['required', 'email'],
            'password' => 'required|min:8|same:password_repeat',
        ]);
    }

    private function validateAddress(Request $request)
    {
        return $request->validate([
            'street' => 'nullable',
            'number' => 'nullable|max:5',
            'city' => 'required|string',
            'province' => 'required|string'
        ]);
    }


    private function consistencyCheck(Model $employee, Model $user, Model $address)
    {
        if (!isset($employee) || !isset($user) || !isset($address)) {
            $this->tryToDelete($employee);
            $this->tryToDelete($user);
            $this->tryToDelete($address);
        }
    }

    private function tryToDelete(Model $model)
    {
        isset($model) && $model->delete();
    }
}
