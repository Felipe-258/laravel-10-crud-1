@extends('students.layouts')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Student List</div>
                <div class="card-body">
                    <a href="{{ route('students.create') }}" class="btn btn-success btn-sm my-2"><i
                            class="bi bi-plus-circle"></i> Add New Student</a>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S#</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Assist</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $student->dni }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->surname }}</td>
                                    <td>{{ $student->assist }}</td>
                                    <td>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('assist.show', $student->id) }}"
                                                class="btn btn-success btn-sm"><i class="bi bi-journal-text"></i> Assists</a>

                                            <a href="{{ route('students.show', $student->id) }}"
                                                class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                            <a href="{{ route('students.edit', $student->id) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Do you want to delete this student?');"><i
                                                    class="bi bi-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="6">
                                    <span class="text-danger">
                                        <strong>No student Found!</strong>
                                    </span>
                                </td>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $students->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
