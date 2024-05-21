<x-app-layout>
    
    <div class="py-12">
      <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <div class="card">
                    <div class="card-header">
                        <h3><b>Create Company</b>
                            <a href="{{route('company.index')}}" class="btn btn-sm btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" id="" class="form-control  @error('name') is-invalid @enderror">
                                @error('name')
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
                                <label for="">Website</label>
                                <input type="text" name="website" id="" class="form-control @error('website') is-invalid @enderror">
                                @error('website')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <div class="mb-3" >
                                <label for="">Logo</label>
                                <input type="file" name="logo" class="form-control logo @error('logo') is-invalid @enderror">
                                @error('logo')
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
