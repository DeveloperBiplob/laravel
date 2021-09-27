@extends('layouts.app')
@section('app-content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>View Component</h1>
            </div>
            <div class="card-body">
                {{-- <p>{{ $test }}</p>
                @foreach($users as $user)
                    <p>{{ $user->name }}</p>
                @endforeach --}}



                <!--View Composer-------------->
                {{-- <h3>Data Pass in View Composer</h3>
                {{ $globalUsers }} --}}


                <!--Custom Blade Directives-------------->
                @customUpperCase('biplob')
                
                <!--Custom Route Directive Create and Use Case--->
                {{-- <a href="@route('customRoute')" class="btn btn-primary">Clck Me</a> --}}
                
                {{-- peramiter pass kore jay. roue('') er moto e kaj kore --}}
                <a href="@route('customRoute', ['id' => 5, 'name' => 'Biplob'])" class="btn btn-primary">Clck Me</a>



            </div>
        </div>
    </div>
@endsection