@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}
                        <a href="{{ route('index') }}" class="btn btn-primary" style="float: right">All Notes</a>
                    </div>
                    <div class="container">
                        <div class="row">

                            <div class="col-md-6">
                                <form action="{{ route('store') }}" method="POST">

                                    @csrf
                                    {{-- Note Title --}}
                                    <label for="note_title">Note title:</label><br>
                                    <input type="text" name="note_title"
                                        class="@error('note_title') is-invalid @enderror" ><br>
                                    @error('note_title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    {{-- Note content --}}
                                    <label for="note_content">Note Content:</label><br>
                                    <input type="text" name="note_content"
                                        class="@error('note_content') is-invalid @enderror" ><br>
                                    @error('note_content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror



                                    <button type="submit" name="add">Add Note</button><br>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
