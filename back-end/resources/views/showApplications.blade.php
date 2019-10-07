@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Applications</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Resume</th>
                                    <th>Skills</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seekers as $seeker)
                                
                                    <tr>
                                        <td><a href="/downloadResume2/{{ $seeker->resume }}">{{ $seeker->resume }}</a></td>
                                        <td>{{ $seeker->skills }}</td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        <!-- <div class="links">
                            <a href="/"></a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
