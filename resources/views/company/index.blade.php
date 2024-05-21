<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Company List
                                <a href="{{ route('company.create') }}" class="btn btn-sm btn-success float-end">Create Company</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            @if ($companies->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Logo</th>
                                            <th>Website</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($companies as $company)
                                            <tr>
                                                <td>{{ $company->name }}</td>
                                                <td>{{ $company->email }}</td>
                                                <td>
                                                    @if ($company->logo)
                                                        <img src="{{ asset('storage/logo/' . $company->logo) }}" alt="Company Logo" width="100" height="100">
                                                    @else
                                                        No Logo
                                                    @endif
                                                </td>
                                                <td>{{ $company->website }}</td>
                                                <td>
                                                   
                                                    <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                                                        <a class="btn btn-info btn-sm" href="{{ route('company.show', $company->id) }}">Show</a>
                                                        <a class="btn btn-primary btn-sm" href="{{ route('company.edit', $company->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                {!! $companies->links() !!}
                            @else
                                <p class="text-center">No Data Available</p>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
