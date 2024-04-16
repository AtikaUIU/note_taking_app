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
                                <form action="{{ route('update', $data->id) }}" method="POST">

                                    @csrf
                                    {{-- Note Title --}}
                                    <label for="note_title">Note title:</label><br>
                                    <input type="text" name="note_title" value="{{ $data->title }}"><br>
                                    
                                    <label for="note_content">Note Content:</label><br>
                                    <input type="text" name="note_content" value="{{ $data->content }}"><br>


                                    <button type="submit" name="update">Update Note</button><br>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
