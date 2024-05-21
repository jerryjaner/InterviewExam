<x-app-layout>
    <div class="py-12">
      <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <div class="card">
                    <div class="card-header">
                        <h3><b>Create Employee</b>
                            <a href="{{route('employee.index')}}" class="btn btn-sm btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Firstname</label>
                                <input type="text" name="firstname" id="" class="form-control  @error('firstname') is-invalid @enderror">
                                @error('firstname')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Lastname</label>
                                <input type="text" name="lastname" id="" class="form-control @error('lastname') is-invalid @enderror">
                                @error('lastname')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Phone</label>
                                <input type="tel" name="phone" id="" class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Company</label>
                                <select name="company"  class="form-select form-control @error('company') is-invalid @enderror">
                                    <option value="">--Select Company--</option>
                                    @foreach($companies as $company)
                                      <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                @error('company')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-sm float-end">Submit</button>
                            </div>
                            
                        </form>   
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</x-app-layout>
