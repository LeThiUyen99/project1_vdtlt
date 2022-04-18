@extends('main-dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Admin</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admins.create') }}"> Create New Admin</a>
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
            <th>Pass</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($admins as $admin)
            <tr>
                <td>#{{ ++$i }}</td>
                <td><img src="/image/{{ $admin->adminImage }}" width="100px"></td>
                <td>{{ $admin->adminName }}</td>
                <td>{{ $admin->adminPass }}</td>
                <td>{{ $admin->adminEmail }}</td>
                <td>{{ $admin->adminAddress }}</td>
                <td>{{ $admin->adminPhone }}</td>
                <td>
                    @if($admin->adminType == 1)
                        Show
                    @else
                        Hide
                    @endif
                </td>
                <td>
                    <form action="{{ route('admins.destroy',$admin->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('admins.show',$admin->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('admins.edit',$admin->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $admins->links() !!}

@endsection
