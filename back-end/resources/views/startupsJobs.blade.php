@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Startups</div>

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
                                    <th>Description</th>
                                    <th>Salary</th>
                                    <th>Vacancy</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                
                                    <tr>
                                        <td>{{ $job->type }}</td>
                                        <td>{{ $job->description }}</td>
                                        <td>{{ $job->salary }}</td>
                                        <td>{{ $job->vacancy }}</td>
                                        <td><a href="/showApplications/{{ $job->id }}">Applications</a></td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        <!-- <div class="links">
                            <a href=""></a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
