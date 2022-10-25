
<div>
    <div class="container">
    <div class="card">
     <div class="card-header">
         <h3>Edit Student</h3>
     </div>
     <div class="card-body">
         <div class="form-floating mb-3">
             <input type="text" class="form-control" wire:model.defer='name'>
             <label for="name">Student Name</label>
             @error('name')
             <div class="text-danger">{{$message}}</div>
             @enderror
         </div>
 
         <div class="form-floating mb-3">
             <input type="text" class="form-control" wire:model.debounce.500ms='email'>
             <label for="email">Email</label>
             @error('email')
             <div class="text-danger">{{$message}}</div>
             @enderror
         </div>
 
         <div class="form-floating mb-3">
             <input type="text" class="form-control" wire:model.defer='address'>
             <label for="address">Address</label>
             @error('address')
             <div class="text-danger">{{$message}}</div>
             @enderror
         </div>
 
         <div class="form-floating mb-3">
             <input type="text" class="form-control" wire:model.defer='contact_number'>
             <label for="contact_number">Contact Number</label>
             @error('contact_number')
             <div class="text-danger">{{$message}}</div>
             @enderror
         </div>
 
         <div class="form-floating mb-3">
            <select name="department" class="form-select" wire:model.defer='department'>
             <option hidden="true">Select Department</option>
             <option selected disabled>Select Department</option>
             <option value="College of Arts, Sciences & Technology">College of Arts, Sciences & Technology</option>
             <option value="College of Nursing">College of Nursing</option>
             <option value="College of Business - Hospitality Department">College of Business</option>
             <option value="College of Business - Business Department">College of Business - Business Department</option>
             <option value="College of Education">College of Education</option>
             <option value="College of Criminal Justice">College of Criminal Justice</option>
            </select>
            <label for="department">Department</label>
            @error('department')
             <div class="text-danger">{{$message}}</div>
             @enderror
         </div>
         <div class="form-floating mb-3">
             <select name="year_level" class="form-select" wire:model.defer='year_level'>
              <option hidden="true">Year Level</option>
              <option selected disabled>Year Level</option>
              <option value="1">1st Year</option>
              <option value="2">2nd Year</option>
              <option value="3">3rd Year</option>
              <option value="4">4th Year</option>
             </select>
             <label for="year_level">Year Level</label>
             @error('year_level')
             <div class="text-danger">{{$message}}</div>
             @enderror
          </div>
          <div class="form-group mb-2 d-grip gap-2 d-md-flex justify-content-end">
            <button class="btn btn-primary" wire:click="editStudent()">
                Save Changes
            </button>
            <button class="btn btn-info mx-2" wire:click="back()">
                back
            </button>
        </div>
     </div>
    </div>
 </div>
 
</div>
