@extends('layout')
@section('body')
    <section class="main">
        <div class="main-content">
            <h1>your bright future is our mission</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam obcaecati libero nihil. Laboriosam error
                nesciunt natus aliquid est.</p>
            <a href="{{ route('customer.index') }}">
                <button>Our clients</button>
            </a>
        </div>
        <div class="image">
            <img src="{{ asset('images/main-bank.jpg') }}" alt="main-image" height="250px">
        </div>
    </section>

    <section class="about">
        <div class="about-content">
            <h1>about banking system</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis nulla quae dolores iusto repellat asperiores
                sint explicabo ut nam? Eveniet accusantium non officia voluptatum tempore sed, cupiditate rem corporis
                asperiores!</p>
        </div>
        <div class="image">
            <img src="{{ asset('images/about.webp') }}" alt="about" height="250px">
        </div>
    </section>
@endsection
