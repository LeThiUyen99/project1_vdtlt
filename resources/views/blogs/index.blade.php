@extends('main-dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create New Product</a>
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
        @foreach ($blogs as $blog)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/image/{!! $blog->blogPicture !!}" width="100px"></td>
                <td>{!! $blog->blogName !!}</td>
                <td>{!! Str::limit($blog->blogInf, 50, $end='.......') !!}</td>
                <td>{!! Str::limit($blog->blogContent, 200, $end='.......') !!}</td>
                <td>{{ $blog->userId }}</td>
                <td>{{ $blog->categoryId }}</td>
                <td>
                    <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('blogs.show',$blog->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('blogs.edit',$blog->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $blogs->links() !!}

@endsection
