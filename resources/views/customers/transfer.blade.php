@extends('layout')
@section('body')

    <div id="myModal" class="modal">

        <div class="modal-content" id="modal_content">
            <span class="close">&times;</span>
            <p>Are you sure?</p>
            <button id="close_button" class="button-5" style="background-color: rgb(172, 63, 63);">back</button>
            <button class="button-5" role="button" type="submit" form="transfer_form"
                style="background-color: rgb(34, 116, 32);">confirm</button>
        </div>
        <div class="modal-content" id="modal_error_required">
            <span class="close">&times;</span>
            <p>all fields are required</p>
        </div>
        <div class="modal-content" id="modal_error_max">
            <span class="close">&times;</span>
            <p>your balance is not enough for this transfer</p>
        </div>
    </div>
    <div class="header">
        <div class="header-content">
            <h1>Customers > Transfer</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto esse tempore nostrum cum non pariatur
                suscipit autem sapiente, sequi veritatis expedita ipsa, unde sint, reiciendis nobis ipsam velit.
                Accusantium, laborum.</p>
        </div>
    </div>
    <div class="main-transfer">
        <div class="info-table">
            <table id="customers">
                <h3>customer info</h3>
                <thead>
                    <tr>
                        <th></th>
                        <th>details</th>

                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{ $sender_customer->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $sender_customer->email }}</td>
                    </tr>
                    <tr>
                        <td>Current Balance</td>
                        <td>{{ $sender_customer->current_balance }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="transfer-form">
            @if ($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('customer.confirm', $sender_customer->id) }}" method="post" id="transfer_form">
                @csrf
                <label for="customers">customers</label>
                <select name="customer" id="custoemrs_select">
                    <option value="">--Please choose an option--</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
                <label for="amount">Enter amount to transfer</label>
                <input type="number" name="amount" placeholder="Enter amount" id="amount" step="0.01"
                    class="amount-input" max="{{ $sender_customer->current_balance }}">
            </form>
            <button class="button-5" role="button" id="myBtn">transfer</button>
        </div>

    </div>

    <script>
        let modal = document.getElementById("myModal");
        let modal_content = document.getElementById("modal_content");
        let modal_error_required = document.getElementById("modal_error_required");
        let modal_error_max = document.getElementById("modal_error_max");
        let btn = document.getElementById("myBtn");


        btn.onclick = function() {
            modal.style.display = "block";
            if (document.getElementById("amount").value == "" || document.getElementById("custoemrs_select").value ==
                "") {
                modal_error_required.style.display = "block";
            } else if (parseFloat(document.getElementById("amount").max) < parseFloat(document.getElementById("amount")
                    .value)) {
                modal_error_max.style.display = "block";
            } else {
                modal_content.style.display = "block";
            }

        }

        let span = document.getElementsByClassName("close");
        for (let i = 0; i < span.length; i++) {
            span[i].onclick = function() {
                modal.style.display = "none";
                modal_error_required.style.display = "none";
                modal_error_max.style.display = "none";
                modal_content.style.display = "none";
            }
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                modal_error_required.style.display = "none";
                modal_error_max.style.display = "none";
                modal_content.style.display = "none";
            }
        }
    </script>
@endsection
