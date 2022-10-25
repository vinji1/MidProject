<?php

namespace App\Http\Livewire\Students;

use App\Events\UserLog;
use App\Models\Student;
use Livewire\Component;

class Edit extends Component
{
    public $studentId;
    public $name, $email, $address, $contact_number, $department, $year_level;

    public function mount() {
        $this->name             = $this->student->name;
        $this->email            = $this->student->email;
        $this->address          = $this->student->address;
        $this->contact_number   = $this->student->contact_number;
        $this->department       = $this->student->department;
        $this->year_level       = $this->student->year_level;

    }

    public function editStudent() {
        $this->validate([
            'name'              => ['required','string','max:255'],
            // 'email'             => ['required','email','unique:students'],
            'address'           => ['required','string','max:255'],
            'contact_number'    => ['required','numeric','digits:11'],
            'department'        => ['required','string','max:255'],
            'year_level'        => ['required','numeric','min:1', 'max:4'],
        ]);

        $this->student->update([
            'name'              => $this->name,
            'email'             => $this->email,
            'address'           => $this->address,
            'contact_number'    => $this->contact_number,
            'department'        => $this->department,
            'year_level'        => $this->year_level
        ]);

        $log_entry = 'Update Student: "' . $this->student->name . '" with an ID: ' . $this->student->id;
        event(new UserLog($log_entry));

        return redirect('/dashboard')->with('message', $this->student->name .' updated successfully');
    }

    public function back() {
        return redirect('/dashboard');
    }

    public function getStudentProperty() {
        return Student::find($this->studentId);
    }

    public function render()
    {
        return view('livewire.students.edit');
    }
}
