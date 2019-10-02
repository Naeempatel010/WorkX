@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Reviews</div>

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
                                    <th>Content</th>
                                    <th>Up-vote</th>
                                    <th>-</th>
                                    <th>Down-vote</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                
                                    <tr>
                                        <td>{{ $review->title }}</td>
                                        <td>{{ $review->description }}</td>
                                        <td>{{ $review->review }}</td>
                                        <td>{{ $review->upvotes }}</td>
                                        <td class="links">
                                        	<a href="/upvoteReview/{{ $review->id }}" style="color: blue;">
                                        	upvote
                                        	</a>
                                        </td>
                                        <td>{{ $review->downvotes }}</td>
                                        <td class="links">
                                        	<a href="/downvoteReview/{{ $review->id }}" style="color: red;">
                                        	downvote
                                        	</a>
                                        </td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        <div class="links">
                            <a href="/review">Post a review</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
