<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    private $sample;

    public function __construct(){
        $this->sample =collect([
            [
            'id' => 1,
            'name' => 'jm',
            'address' => 'bangui',
        ],
        [
            'id' => 2,
            'name' => 'ernest',
            'address' => 'paoay',
        ],
        [
            'id' => 3,
            'name' => 'jonathan',
            'address' => 'bacarra',
        ],
        [
            'id' => 4,
            'name' => 'steven',
            'address' => 'cagayan',
        ],
    ]);
    }

    public function index(){
        return view("app");
    }
    
    public function student() {
        // $users = DB::select('select * from students');
        $data = Student::all();
        return $data;
    }

    public function getStudent($id) {
        $student = Student::find($id);
        return $student;
    }

    public function info($id){
        $info = $this->sample->where('id', $id)->first();
        return view("sample.info", compact('info'));
    }

    public function createForm(){
        return view("sample.create");
    }

    public function saveForm(Request $request) {
        $student = Student::find($request->id);
        if (!$student) {
            $student = new Student();
        }
        $student->name = $request->name;
        $student->address = $request->address;
        $student->birthday = date('Y-m-d', strtotime($request->birthday));
        $student->sex = $request->sex;
        $student->height = $request->height;
        $student->weight = $request->weight;
        $student->save();
        return "Okay";
    }

    public function delete(Request $request)
    {   
        $student = Student::find($request->id);
        if ($student){
            $student->delete();
            return "Success";
        }
    }

    public function update(Request $request,$id)
    {   
        $student = Student::find($id);
        $student->name = $request->name;
        $student->address = $request->address;
        $student->birthday = date('Y-m-d', strtotime($request->birthday));
        $student->sex = $request->sex;
        $student->height = $request->height;
        $student->weight = $request->weight;
        $student->save();
        return redirect('/student');
    }

    public function editForm($id){
        $student = Student::find($id); 
        return view('sample.edit', compact('student'));
    }
}
