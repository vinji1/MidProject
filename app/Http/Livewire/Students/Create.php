<?php

namespace App\Http\Livewire\Students;

use App\Events\UserLog;
use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
   
    public $name, $email, $address, $contact_number, $department, $year_level;

    public function addStudent(){
     
            $this->validate([
                'name'              => ['required','string','max:255'],
                'email'             => ['required','email','unique:students'],
                'address'           => ['required','string','max:255'],
                'contact_number'    => ['required','numeric','digits:11'],
                'department'        => ['required','string','max:255'],
                'year_level'        => ['required','numeric','min:1', 'max:4'],
            ]);
    
            Student::create([
                'name'              => $this->name,
                'email'             => $this->email,
                'address'           => $this->address,
                'contact_number'    => $this->contact_number,
                'department'        => $this->department,
                'year_level'        => $this->year_level
            ]);

            $log_entry = 'Added Student "' . $this->name;
            event(new UserLog($log_entry));

            return redirect('/dashboard')->with('message', $this->name . ' added successfully');
    }

    public function updated($propertyEmail)
    {
        $this->validateOnly($propertyEmail, [
            'email'             => ['required','email','unique:students'],
            
        ]);
    }

    public function render()
    {
        return view('livewire.students.create');
    }
}
