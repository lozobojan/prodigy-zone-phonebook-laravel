@extends('main-layout')

@section('page_title', 'prikaz detalja')

@section('content')

    <h3 class="text-center mt-3">Prikaz kontakta</h3>

    <div class="row">
        <div class="col-4 offset-2">
            <p>Ime:</p>
            <p>Prezime:</p>
            <p>Mail:</p>
            <p>Grad:</p>
        </div>
        <div class="col-4">
            <p>{{ $contact->first_name }}</p>
            <p>{{ $contact->last_name }}</p>
            <p>{{ $contact->email }}</p>
            <p>{{ $contact->city->name }}</p>
        </div>
    </div>

@endsection
