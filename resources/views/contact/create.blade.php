@extends('main-layout')

@section('page_title', 'dodavanje novog')

@section('content')

    <h3 class="text-center mt-3">Dodavanje novog kontakta</h3>

    <div class="row">
        <div class="col-8 offset-2">
            <form action="{{ route('contact.save') }}" method="POST">
                @csrf

                <label for="firstName">Ime:</label>
                <input type="text" id="firstName" class="form-control" name="first_name">

                <label for="lastName">Prezime:</label>
                <input type="text" id="lastName" class="form-control" name="last_name">

                <label for="email">Email:</label>
                <input type="email" id="email" class="form-control" name="email">

                <label for="city_id">Grad:</label>
                <select  class="form-control" name="city_id" id="city_id">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>

                <button class="btn btn-success w-100 mt-3" id="saveBtn">Sačuvaj</button>

            </form>
        </div>
    </div>

@endsection
