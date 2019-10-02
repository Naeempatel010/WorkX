@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Ideas</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>poc</th>
                                    <th>Status</th>
                                    <th>Investment needed</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ideas as $idea)
                                
                                    <tr>
                                        <td>{{ $idea->title }}</td>
                                        <td>{{ $idea->description }}</td>
                                        <td>{{ $idea->poc }}</td>
                                        <td>{{ $idea->status }}</td>
                                        <td>{{ $idea->investment }}</td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        <div class="links">
                            <a href="/idea">Post an idea</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
