<!-- 
// Amara chaile anonymous components use korte pari.
// atar kono class file create korte hoyna.
// just component folder er modde akta manually file create kore nile e hoy.
// ak kothay bolte pari je component folder er modde ja kicho thakbe setai amara Component hisebe use korte pari.
// tar mane holo X-prefix diye use korte pari.
// nam bihin components
 -->

 {{-- <div class="bg-black">
    This is our Anonymous components
 </div> --}}




 <!--- Data Properties / Attributes --->

 {{-- <div class="bg-black" {{ $attributes }}>
   This is our Anonymous components

   @php
      // dd($attributes)
   @endphp

</div> --}}





 <!-- 
// Amara chaile Data Properties / Attributes  pass korte pari.
{{-- // jeheto atar under e kono class file nei, ti @props method duy value gulo received korbo. --}}
 -->

@props(['type' => 'info', 'message'])

<div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }}>
    {{ $message }}
</div>