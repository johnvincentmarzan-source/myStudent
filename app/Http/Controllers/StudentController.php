<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Section;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show all students
    public function index()
    {
        $students = Student::with('section')->orderBy('id','desc')->get();
        return view('students.index', compact('students'));
    }

    // Show create form
    public function create()
    {
        $sections = Section::orderBy('year_level')->orderBy('section_name')->get();
        return view('students.create', compact('sections'));
    }

    // Store new student
    public function store(Request $request)
    {
        $request->validate([
            'studentNumber' => 'required|unique:students,studentNumber|max:9',
            'lname' => 'required|max:150',
            'fname' => 'required|max:150',
            'mi' => 'nullable|max:2',
            'email' => 'nullable|email|max:150',
            'contactNumber' => 'nullable|max:20',
            'course' => 'nullable|string|max:150',
            'year_level' => 'nullable|integer|min:1|max:4',
            'section_id' => 'nullable|exists:sections,id'
        ]);

        Student::create($request->only([
            'studentNumber', 'lname', 'fname', 'mi', 'email',
            'contactNumber', 'course', 'year_level', 'section_id'
        ]));

        return redirect()->route('students.index')->with('success','Student added.');
    }

    // Show edit form
    public function edit(Student $student)
    {
        $sections = Section::orderBy('year_level')->orderBy('section_name')->get();
        return view('students.edit', compact('student','sections'));
    }

    // Update student
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'studentNumber' => 'required|unique:students,studentNumber,'.$student->id.'|max:9',
            'lname' => 'required|max:150',
            'fname' => 'required|max:150',
            'mi' => 'nullable|max:2',
            'email' => 'nullable|email|max:150',
            'contactNumber' => 'nullable|max:20',
            'course' => 'nullable|string|max:150',
            'year_level' => 'nullable|integer|min:1|max:4',
            'section_id' => 'nullable|exists:sections,id'
        ]);

        $student->update($request->only([
            'studentNumber', 'lname', 'fname', 'mi', 'email',
            'contactNumber', 'course', 'year_level', 'section_id'
        ]));

        return redirect()->route('students.index')->with('success','Student updated.');
    }

    // Delete student
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success','Student deleted.');
    }

    // Dashboard
    public function dashboard()
    {
        $total = Student::count();
        $enrolled = Student::whereNotNull('section_id')->count();
        $inactive = Student::whereNull('section_id')->count();
        $sections = Section::orderBy('year_level')->orderBy('section_name')->get();

        $enrolledStudents = Student::with('section')->whereNotNull('section_id')->get();

        return view('dashboard.index', compact(
            'total','enrolled','inactive','sections','enrolledStudents'
        ));
    }
}