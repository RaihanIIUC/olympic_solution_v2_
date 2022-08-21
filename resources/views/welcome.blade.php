@extends('layouts.app')

@section('content')


<div class=" ">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-7  border rounded p-4 " style=" background: #f8e9c8; ">
            @if (\Session::has('success'))
            <div class="alert alert-success">
            <ul>
            <li>{!! \Session::get('success') !!}</li>
            </ul>
            </div>
            @endif
                <h2 class="mb-5 text-center">(Date Range) To Download data </h2>
                @livewire('date-form')
                    @livewire('progressbar')
                        @livewire('show-all-progress')
            </div>
        </div>


  
            @include('helper.failedList')
         
</div>
</div>
@endsection
