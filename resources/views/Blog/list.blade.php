@extends('main-dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('Blog.create') }}"> Create New Admin</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Info</th>
            <th>Content</th>
            <th>User</th>
            <th>Category</th>
            <th width="280px">Action</th>
        </tr>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->id }}</td>
                <td><img src="/image/{{ $blog->blogPicture }}" width="100px"></td>
                <td>{{ $blog->blogName }}</td>
                <td>{{ Str::limit($blog->blogInf, 50, $end='.......') }}</td>
                <td>{{ Str::limit($blog->blogContent, 200, $end='.......') }}</td>
                <td>{{ $blog->userId }}</td>
                <td>{{ $blog->categoryId }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
