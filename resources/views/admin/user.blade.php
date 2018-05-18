@extends('adminlte::page')

@section('content')
    <div class="box-body">
        <table class="table table-striped table-hover">
            <thread>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
            </thread>
            <tbody>
                <?php $no = 1;?>
                @foreach($users as $user)
                <tr>
                    <th>{{ $no++}}</th>
                    <th>{{ $user->name}}</th>
                    <th>{{ $user->email}}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection