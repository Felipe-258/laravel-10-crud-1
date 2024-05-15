@extends('students.layouts')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Student Information
                    </div>
                    <div class="float-end">
                        <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <label for="dni"
                            class="col-md-4 col-form-label text-md-end text-start"><strong>DNI:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->dni }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name"
                            class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="surname"
                            class="col-md-4 col-form-label text-md-end text-start"><strong>surname:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->surname }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="assist"
                            class="col-md-4 col-form-label text-md-end text-start"><strong>assist:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->assist }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <form action="{{ route('assistForm.store') }}" method="post">
                            @csrf
                            <input type="hidden" class="hidden form-control" id="dni" name="dni"
                                placeholder="dni" value="{{ $student->dni }}">

                            @if ($errors->has('dni'))
                                <span class="text-danger">{{ $errors->first('dni') }}</span>
                            @endif
                        <div class="mb-3 row">
                            <button type="submit" class="col-md-6 offset-md-3 btn btn-primary" value="Add Assist"> Add
                                Assist</button>
                            {{-- <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Assist"> --}}
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    </div>
    </div>
@endsection
