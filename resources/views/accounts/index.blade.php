@extends('main-dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('accounts.create') }}"> Create New Account</a>
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
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($accounts as $account)
            <tr>
                <td>#{{ ++$i }}</td>
                <td><img src="/image/{{ $account->userImage }}" width="100px"></td>
                <td>{{ $account->userName }}</td>
                <td>{{ $account->userEmail }}</td>
                <td>{{ $account->userAddress }}</td>
                <td>{{ $account->userPhone }}</td>
                <td>
                    @if($account->userType == 1)
                        Show
                    @else
                        Hide
                    @endif
                </td>
                <td>
                    <form action="{{ route('accounts.destroy',$account->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('accounts.show',$account->id) }}">Show</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $accounts->links() !!}

@endsection
