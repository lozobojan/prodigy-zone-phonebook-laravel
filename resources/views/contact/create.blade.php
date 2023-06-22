@extends('main-layout')

@section('page_title', 'dodavanje novog')

@section('content')

    <h3 class="text-center mt-3">Dodavanje novog kontakta</h3>

    <div class="row">
        <div class="col-8 offset-2">
            <form action="{{ route('contact.save') }}" method="POST">
                @csrf

                <label for="firstName">Ime:</label>
                <input type="text" id="firstName" class="form-control" value="{{ old('first_name') }}" name="first_name">
                @error('first_name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="lastName">Prezime:</label>
                <input type="text" id="lastName" class="form-control" value="{{ old('last_name') }}" name="last_name">
                @error('last_name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="email">Email:</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="city_id">Grad:</label>
                <select  class="form-control" name="city_id" id="city_id">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" @if(old('city_id') == $city->id) selected @endif>{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <button class="btn btn-success w-100 mt-3" id="saveBtn">Sačuvaj</button>

            </form>
        </div>
    </div>

@endsection
