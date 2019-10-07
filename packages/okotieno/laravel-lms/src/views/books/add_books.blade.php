@extends('okotieno.lms.app')
@section('content')
    <div class="container">
        <h1>Add Books</h1>
        <div class="row">
            <div class="col">

                <form method="post" action="/library-books">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="category">

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="author" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="author">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                        <div class="col-sm-10">
                            <input name="publisher" type="text" class="form-control" id="publisher">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="publication-date" class="col-sm-2 col-form-label">Publication Date</label>
                        <div class="col-sm-10">
                            <input name="publication-date" type="text" class="form-control" id="publication-date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="version" class="col-sm-2 col-form-label">Version</label>
                        <div class="col-sm-10">
                            <input name="version" type="text" class="form-control" id="version">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>

        </div>

    </div>

@endSection
