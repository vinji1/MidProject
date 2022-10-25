<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $search, $department='all', $year_level='all';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function loadStudents() {
        $query = Student::orderBy('name')
            ->search($this->search);

       if($this->department!='all') {
        $query->where('department', $this->department);
       }

       if($this->year_level!='all') {
        $query->where('year_level', $this->year_level);
       }

       $students = $query->paginate(4);

       return  compact('students');
    }

    public function render()
    {
        return view('livewire.students.index', $this->loadStudents());
    }
}
