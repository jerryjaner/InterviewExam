<x-app-layout>
    <div class="py-12">
      <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <div class="card">
                    <div class="card-header">
                        <h3><b>Edit Employee</b>
                            <a href="{{route('employee.index')}}" class="btn btn-sm btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('employee.update', $employee->id)}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="">Firstname</label>
                                <input type="text" name="firstname" id="" class="form-control  @error('firstname') is-invalid @enderror" value={{ $employee->firstname}}>
                                @error('firstname')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Lastname</label>
                                <input type="text" name="lastname" id="" class="form-control @error('lastname') is-invalid @enderror" value={{ $employee->lastname}}>
                                @error('lastname')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" value={{ $employee->email}}>
                                @error('email')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Phone</label>
                                <input type="tel" name="phone" id="" class="form-control @error('phone') is-invalid @enderror" value={{ $employee->phone}}>
                                @error('phone')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Company</label>
                                <select name="company_id" class="form-select form-control @error('company_id') is-invalid @enderror">
                                   
                                    <option value="{{ $employee->company->id }}">{{ $employee->company->name }}</option>
                                    
                                    @foreach($companies as $company)
                                        @if($employee->company_id != $company->id)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endif
                                    @endforeach
                                </select> 

                                @error('company_id')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-sm float-end">Update</button>
                            </div>
                            
                        </form>   
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</x-app-layout>
