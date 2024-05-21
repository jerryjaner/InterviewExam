<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Employee List
                                <a href="{{ route('employee.create') }}" class="btn btn-sm btn-success float-end">Create Employee</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            @if ($employees->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->firstname }}</td>
                                                <td>{{ $employee->lastname }}</td>
                                                <td>{{ $employee->company->name}}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>
                                                    <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                                        <a class="btn btn-info btn-sm" href="{{ route('employee.show', $employee->id) }}">Show</a>
                                                        <a class="btn btn-primary btn-sm" href="{{ route('employee.edit', $employee->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                {!! $employees->links() !!}
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
