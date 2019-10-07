@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">All Investments</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($investments as $investment)
                                
                                    <tr>
                                        <td>{{ $investment->amount }}</td>
                                        <td>{{ $investment->status }}</td>
                                        <td><a href="/investorDetails/{{ $investment->investor_id }}">Investor details</a></td>
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
