<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Resources\Employee as EmployeeResource;
use Illuminate\Support\Facades\Auth;
use App\Employee;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $employees = Employee::all();
        return EmployeeResource::collection($employees);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'mobile' => 'required',
                'address' => 'required',
            ]);

        if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            $employee = Employee::create($request->all());

            //$success['token'] = $student->createToken('MyApp')->accessToken;
            //$success['name'] = $student->fname;

            //return response()->json(['success' => $success]);

            return new EmployeeResource($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        if($employee)
        {
            return new EmployeeResource($employee);
        }
        else
        {
            return response()->json(['Error'=>'there is no data available on this id: '.$id.''],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if($employee)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'mobile' => 'required',
                'address' => 'required',
            ]);

            if($validator->fails())
            {
                return response()->json(['error' => $validator->errors()], 401);
            }
            else
            {
                $employee->update($request->all());

                return new EmployeeResource($employee);
            }
        }
        else
        {
            return response()->json(['Error'=>'there is no data available on this id: '.$id.''],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if($employee)
        {
            $employee->delete();
            return new EmployeeResource($employee);
             //return response()->json(['Done'=>'this id: '.$id.' Deleted successfully']);
        }
        else
        {
            return response()->json(['error'=>'there is no data available on this id: '.$id.' '], 404);
        }
    }
}
