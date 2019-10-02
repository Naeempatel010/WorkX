@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Idea</div>

                <div class="card-body">
                    <form method="POST" action="/postIdea">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="poc" class="col-md-4 col-form-label text-md-right">POC upload</label>

                            <div class="col-md-6">
                                <input id="poc" type="text" class="form-control" name="poc">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="investment" class="col-md-4 col-form-label text-md-right">Investment needed</label>

                            <div class="col-md-6">
                                <input id="investment" type="number" class="form-control" name="investment">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit Idea
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
