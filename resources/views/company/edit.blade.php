<x-app-layout>
    <div class="py-12">
      <div class="container">
        <div class="row">
            <div class="col-md-12"> 
            
                <div class="card">
                    <div class="card-header">
                        <h3><b>Edit Company</b>
                            <a href="{{route('company.index')}}" class="btn btn-sm btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('company.update', $company->id)}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" id="" class="form-control  @error('name') is-invalid @enderror" value="{{ $company->name }}">
                                @error('name')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" id="" class="form-control @error('email') is-invalid @enderror" value="{{ $company->email }}">
                                @error('email')
                                        <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>
                           
                            <div class="mb-3">
                                <label for="">Website</label>
                                <input type="text" name="website" id="" class="form-control @error('website') is-invalid @enderror" value="{{ $company->website }}">
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

                            <div class="mb-3" >
                                <label for="" >Old Logo</label>
                                @if($company->logo)
                                    <img src="{{ asset('storage/logo/' . $company->logo) }}" alt="Company Logo" width="100" height="100" class="img-fluid">
                                @else
                                    <p>No logo available</p>
                                @endif
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
