<div>
    <div class="container">
        <div class="row">
            <div class="col">
                <select class="form-select" wire:model.lazy="department">
                    <option value="all">All</option>
                    <option value="College of Arts, Sciences & Technology">College of Arts, Sciences & Technology</option>
                    <option value="College of Nursing">College of Nursing</option>
                    <option value="College of Business - Hospitality Department">College of Business</option>
                    <option value="College of Business - Business Department">College of Business - Business Department</option>
                    <option value="College of Education">College of Education</option>
                    <option value="College of Criminal Justice">College of Criminal Justice</option>
                </select>
            </div>
            <div class="col">
                <select class="form-select" wire:model.lazy="year_level">
                    <option value="all">All</option>
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                </select>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Search" wire:model="search"> 
            </div>
        
      
           <div class="card-body mt-2">
            <table class="table bg-light">
                <thead class="bg-info">
                    <tr>
                        <th>ID No</th>
                        <th>Student Name</th>
                        <th>Email Address</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>Year Level</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->contact_number }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->department }}</td>
                            <td>{{ $student->year_level }}</td>
                            <td>
                                <a href="{{ url('edit', ['student' => $student->id]) }}" class="btn btn-secondary">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('delete', ['student' => $student->id]) }}" class="btn btn-danger">Delete</i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col offset-md-5">
                {{$students->links()}}
            </div>
           </div>
       
    </div>
</div>
 </div>
</div>

