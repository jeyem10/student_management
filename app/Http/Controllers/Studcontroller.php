<?php

namespace App\Http\Controllers;

use Illuminate\Support\Fascades\DB;
use Response;
use Illuminate\Http\Request;
use App\Models\stud;


class Studcontroller extends Controller
{
    public function index(){


        $students = stud::get();

        return view('students.index', compact('students'));
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){
        $request->validate([
            'lname' => 'required|max:255|string',
            'fname' => 'required|max:255|string',
            'midname' => 'required|max:255|string',
            'age' => 'required|integer',
            'address' => 'required|max:255|string',
            'zip' => 'required|integer'

        ]);
        stud::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added successfully.');

    }

    public function edit( int $id){
        $students = stud::find($id);
        return view ('students.edit',compact('students'));
    }

    public function update(Request $request, int $id) {
        
            $request->validate([
                'fname' => 'required|max:255|string',
                'lname' => 'required|max:255|string',
                'midname' => 'required|max:255|string',
                'age' => 'required|integer',
                'address' => 'required|max:255|string',
                'zip' => 'required|integer',
                
            ]);
        
            stud::findOrFail($id)->update($request->all());
            return redirect ()->back()->with('status','Employee Updated Successfully!');
            
    }

    public function destroy(Request $request, int $id){
        $students = stud::findOrFail($id);
        $students->delete();
        return redirect ()->back()->with('status','Student Deleted');
    }
}
