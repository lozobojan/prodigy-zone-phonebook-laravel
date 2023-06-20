@extends('main-layout')

@section('page_title', 'izmjena kontakta')

@section('content')

    <h3 class="text-center mt-3">Izmjena kontakta</h3>

    <div class="row">
        <div class="col-8 offset-2">
            <form action="{{ route('contact.update', ['id' => $contact->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="firstName">Ime:</label>
                <input type="text" id="firstName" class="form-control" value="{{ $contact->first_name }}" name="first_name">

                <label for="lastName">Prezime:</label>
                <input type="text" id="lastName" class="form-control" value="{{ $contact->last_name }}" name="last_name">

                <label for="email">Email:</label>
                <input type="email" id="email" class="form-control" value="{{ $contact->email }}" name="email">

                <button class="btn btn-success w-100 mt-3" id="saveBtn">Sačuvaj</button>

            </form>
        </div>
    </div>

@endsection
