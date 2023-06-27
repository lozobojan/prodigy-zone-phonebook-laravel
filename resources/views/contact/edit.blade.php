@extends('main-layout')

@section('page_title', 'izmjena kontakta')

@section('content')

    <h3 class="text-center mt-3">Izmjena kontakta</h3>

    <div class="row">
        <div class="col-8 offset-2">
            <form action="{{ route('contact.update', ['contact' => $contact]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="firstName">Ime:</label>
                <input type="text" id="firstName" class="form-control" value="{{ $contact->first_name }}" name="first_name">
                @error('first_name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="lastName">Prezime:</label>
                <input type="text" id="lastName" class="form-control" value="{{ $contact->last_name }}" name="last_name">
                @error('last_name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="email">Email:</label>
                <input type="email" id="email" class="form-control" value="{{ $contact->email }}" name="email">
                @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <label for="city_id">Grad:</label>
                <select  class="form-control" name="city_id" id="city_id">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" @if(old('city_id') == $city->id || $contact->city_id == $city->id) selected @endif>{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <img src="{{ asset($contact->photo_path) }}" alt="" class="img-fluid w-50 my-3">

                @if($contact->photo)
                    <a href="{{ asset("storage/{$contact->photo}") }}" alt="" download>preuzmi</a>
                @endif


                <input type="file" name="avatarPhoto" id="avatar_photo" class="form-control">
                @error('avatarPhoto')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <button class="btn btn-success w-100 mt-3" id="saveBtn">Sačuvaj</button>

            </form>
        </div>
    </div>

@endsection
