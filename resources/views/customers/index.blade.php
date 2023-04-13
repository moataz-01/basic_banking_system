@extends('layout')

@section('body')
    <div class="header">
        <div class="header-content">
            <h1>Home > Customers</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto esse tempore nostrum cum non pariatur
                suscipit autem sapiente, sequi veritatis expedita ipsa, unde sint, reiciendis nobis ipsam velit.
                Accusantium, laborum.</p>
        </div>
    </div>
    @if (Session::has('success_message'))
        <div class="alert-success">
            <ul>
                <li>{{ Session::get('success_message') }}</li>
            </ul>
        </div>
    @endif
    <div class="body-content">
        <h1 style="text-align:center; margin:40px;">All Customers</h1>
        <div style="overflow-x:auto;padding: 0 15px;">
        <table id="customers">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>email</th>
                    <th>Current Balance</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->current_balance }}</td>
                        <td>
                            <a href="{{ route('customer.transfer', $customer->id) }}">
                                <button class="transfer-button">transfer amount</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $customers->links() }}
        </div>
    </div>
@endsection
