@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">All Jobs</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Salary</th>
                                    <th>Description</th>
                                    <th>Vacancy</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                
                                    <tr>
                                        <td>{{ $job->type }}</td>
                                        <td>{{ $job->salary }}</td>
                                        <td>{{ $job->description }}</td>
                                        <td>{{ $job->vacancy }}</td>
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
