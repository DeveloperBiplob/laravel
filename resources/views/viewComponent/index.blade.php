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

                <hr>





                {{-- Slot---------
                // Sloat Property use kore o component er blade file e data pass korte pari.
                // Normaly amra kono Variabel Or data pass korar jonno Constructor use kortam.
                // but slot use korte seta na kore sora sorasori Component er Blade file e data Received korte pari.
                // Just <x-Test> Pass some data <x-Test/> ai vabe data ta pass kore dile e hoy.
                // R seta Component er view file e $slot diye receive korte hoy. {{ $slot }}
                // Finaly Componenet jekhan theke call kora hobe sekhane data ta show korbe.
                 --}}
                
                <x-Test>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea soluta cupiditate ad quo veritatis dolorem ipsa ullam cumque! Provident repudiandae consectetur minima repellat, hic dignissimos sequi totam similique nemo fugit!


                    {{-- 
                    // Amara Chaile Slot e name use korte pari. jeta dore data pass korte pari.  <x-slot name="left_col">Defin Content </x-slot>
                    // Then Name ta Component er jei khane call korbo data gulo oi khane push hoye jabe.
                    // Nidristo kono kahne data ta push korar jonno Name Slot Use korbo.
                    --}}

                    <x-slot name="left_col">
                        <h1>This is Left Slot</h1>
                    </x-slot>
                    <x-slot name="right_col">
                        <h1>This is Right Slot</h1>
                    </x-slot>

                </x-Test>


                <!-- Anonymous components Call----------->
                {{-- <x-anonymous_component/> --}}


                <!--  Anonymous components Attributes pass------------->
                {{-- <x-anonymous_component style="font-size:20px"></x-anonymous_component> --}}

                <!--  Anonymous components  Props use kore data or  Attributes pass------------->
                @php
                    $message = "This is our Dynamic data form data base or others";
                @endphp
                <x-anonymous_component type="error" :message="$message" class="mb-4"/>
               







            </div>
        </div>
    </div>
@endsection