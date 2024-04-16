@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}
                        <a href="{{ route('create') }}" class="btn btn-primary" style="float: right">Add Note</a>
                    </div>

                    <div class="container">
                        <div class="row ">
                            <div class="col-md-6 ">

                                <form action="{{ route('search') }}" method="GET">
                                    <input type="text" name="search" placeholder="Search notes...">
                                    <button type="submit">Search</button>
                                </form>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No. </th>
                                            <th scope="col">Title </th>
                                            <th scope="col">Content </th>
                                            <th scope="col">Creation date </th>
                                            <th scope="col">Last modified date </th>
                                            <th scope="col">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($notes as $note)
                                                <td>{{ $note['id'] }}</td>
                                                <td>{{ $note['title'] }}</td>
                                                <td>{{ $note['content'] }}</td>
                                                <td>{{ Carbon\Carbon::parse($note['created_at'])->format('Y-m-d') }}</td>
                                                <td>{{ $note['updated_at'] }}</td>

                                                <td><a href="{{ route('edit', $note->id) }}"
                                                        class="btn btn-primary">Edit</a><br></td>
                                                <td><a href="{{ route('delete', $note->id) }}"
                                                        class="btn btn-danger">Delete</a><br></td>

                                        </tr>
                                        @endforeach



                                        {{-- @if ($notes->count() > 0)
                                            <h2>Search Results for "{{ $search }}"</h2>
                                            @foreach ($notes as $note)
                                                <div>
                                                    <h3>{{ $notes->title }}</h3>
                                                    <p>{{ $notes->content }}</p>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No notes found for "{{ $search }}".</p>
                                        @endif --}}


                                    </tbody>
                                </table>

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
