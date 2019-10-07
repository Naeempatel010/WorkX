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
                                    <th>Company Name</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($startups as $startup)
                                
                                    <tr>
                                        <td>{{ $startup->company_name }}</td>
                                        <td>
                                            <a href="/startupsDetails/{{ $startup->id }}">Additional details</a>
                                        </td>
                                        <td>
                                            <a href="/startupsInvestments/{{ $startup->id }}">
                                                Investments
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/startupsJobs/{{ $startup->id }}">Jobs</a>
                                        </td>
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
