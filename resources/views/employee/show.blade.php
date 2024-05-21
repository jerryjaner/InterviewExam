<x-app-layout>
    <div class="py-12">
      <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <div class="card">
                    <div class="card-header">
                        <h3><b>Show Employee</b>
                            <a href="{{route('employee.index')}}" class="btn btn-sm btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Firstname</label>
                            <input type="text" name="firstname" id="" class="form-control  @error('firstname') is-invalid @enderror" value="{{ $employee->firstname}}" disabled>
                            @error('firstname')
                                    <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Lastname</label>
                            <input type="text" name="lastname" id="" class="form-control @error('lastname') is-invalid @enderror" value="{{ $employee->lastname}}" disabled>
                            @error('lastname')
                                    <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" value="{{ $employee->email}}" disabled>
                            @error('email')
                                    <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="tel" name="phone" id="" class="form-control @error('phone') is-invalid @enderror" value="{{ $employee->phone}}" disabled>
                            @error('phone')
                                    <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Company</label>
                            <input type="text" name="company" id="" class="form-control @error('company') is-invalid @enderror" value="{{ $employee->company->name}}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</x-app-layout>
