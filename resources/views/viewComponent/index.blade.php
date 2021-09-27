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



                <!--Components--->
                {{-- <x-alert/> --}}

                {{-- <x-alert> </x-alert> --}}
                
                <!--SubFolder e jodi file thake ta hole Folder name er pore akta "." dite component call korbo-->
                {{-- <x-Form.Input></x-Form.Input> --}}


                <!--Blade file theke chaile component e data pass korte pari
                Then ata ke Component er jonno jei class file toiri hoy tar constructor e value ta dorte hobe.

                Note---
                Component er maddome jodi php kono Variable pass kore chai ta hole clone : symble ta use korte hobe.
                Ai khaner cloner er sathe jei users, ata diye constructor e received korbo. r porer ta holo jei variable pass korchi oita.
                -->
                
                <!--- Code Refactor by Composers------->
                <x-Form.Input title="This Title is comming form Component" name="Biplob Jabery" :users="$users"/>
                <table class="table table-bordered">
                    <tr>
                        <th>1st</th>
                        <th>2nd</th>
                        <th>3rd</th>
                    </tr>
                    <tr>
                        <td>.</td>
                        <td>.</td>
                        <td>.</td>
                    </tr>
                </table>

                <!--- Custom name use kore component Call-------> 
                <x-ComponentAlert/>

                <x-Notification type="success"/>
                <br>
                <x-Notification type="danger"/>





            </div>
        </div>
    </div>
@endsection