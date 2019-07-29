@extends('layouts.app')


@section('content')

    <div class="w-2/3 bg-gray-200 mx-auto p-6 flex flex-col items-center shadow">

        <form method="post" action="/authors" class="flex flex-col items-center">

            @csrf
            <h1>Add New Author</h1>
            <div class="pt-4">
                <input type="text" name="name" placeholder="full name" class="rounded px-4 py-2 w-64" />

                {{--@if($errors->has('name'))--}}
                    {{--<p class="text-red-600">{{$errors->first('name')}}</p>--}}
                {{--@endif--}}


                @error('name') <p class="text-red-600">{{$message}}</p> @enderror
            </div>

            <div class="pt-4">
                <input type="text" name="dob" placeholder="day of birth"  class="rounded px-4 py-2 w-64" />
                @error('dob') <p class="text-red-600">{{$message}}</p> @enderror

            </div>

            <div class="pt-4">
                <button class="bg-blue-300 text-white py-2 px-4">Add Author</button>
            </div>

        </form>


    </div>

@endsection
