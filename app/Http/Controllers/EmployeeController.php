<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * This method will return a list of all employees.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // Retrieve all employees and return as JSON
        $employees = Employee::all();
        return response()->json($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * This method will display a form for creating a new employee.
     *
     * @return Response
     */
    public function create()
    {
        // Return a view for creating a new employee
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * This method will validate and store the new employee in the database.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'created_by' => 'required|integer|exists:users,id',
        ]);

        // Create a new employee and set the created_by field to the authenticated user's ID
        $employee = Employee::create($validatedData + ['created_by' => auth()->id()]);

        // Return the newly created employee as JSON with a 201 status code
        return response()->json($employee, 201);
    }

    /**
     * Display the specified resource.
     *
     * This method will show the details of a specific employee.
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function show(Employee $employee): JsonResponse
    {
        // Return the specified employee as JSON
        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * This method will display a form for editing the specified employee.
     *
     * @param Employee $employee
     * @return Response
     */
    public function edit(Employee $employee)
    {
        // Return a view for editing the specified employee
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * This method will validate and update the specified employee in the database.
     *
     * @param Request $request
     * @param Employee $employee
     * @return JsonResponse
     */
    public function update(Request $request, Employee $employee): JsonResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:employees,email,' . $employee->id,
            'position' => 'sometimes|required|string|max:255',
            'salary' => 'sometimes|required|numeric',
            'created_by' => 'required|integer|exists:users,id',
        ]);

        // Update the employee with the validated data
        $employee->update($validatedData);

        // Return the updated employee as JSON with a 200 status code
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * This method will delete the specified employee from the database.
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function destroy(Employee $employee): JsonResponse
    {
        // Delete the specified employee
        $employee->delete();

        // Return a 204 No Content response to indicate successful deletion
        return response()->json(null, 204);
    }
}
