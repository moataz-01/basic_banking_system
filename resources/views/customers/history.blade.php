@extends('layout')

@section('body')
    <div class="header">
        <div class="header-content">
            <h1>Home > History</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto esse tempore nostrum cum non pariatur
                suscipit autem sapiente, sequi veritatis expedita ipsa, unde sint, reiciendis nobis ipsam velit.
                Accusantium, laborum.</p>
        </div>
    </div>
    <h1 style="text-align:center; margin:40px;">transfers table</h1>
    <div style="overflow-x:auto;padding: 0 15px;">
    <table id="customers">
        <thead>
            <tr>
                <th>#</th>
                <th>sender name</th>
                <th>amount</th>
                <th>receiver name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transfers as $transfer)
                <tr>
                    <td>{{ $transfer->id }}</td>
                    <td>{{ $transfer->sender_name }}</td>
                    <td>{{ $transfer->amount }}</td>
                    <td>{{ $transfer->receiver_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $transfers->links() }}
    </div>
@endsection
