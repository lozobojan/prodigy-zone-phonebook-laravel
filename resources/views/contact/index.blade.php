@extends('main-layout')

@section('page_title', 'prikaz kontakata')

@section('content')
    <h3 class="text-center mt-3">Lista kontakta</h3>

    <div class="row">
        <div class="col-8 offset-2 table-responsive">
            <form action="{{ route('contact.index') }}" method="GET">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="searchTerm" class="form-control" value="{{ request()->get('searchTerm') }}" placeholder="Pretraga kontakt">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary w-100">Pretraži</button>
                    </div>
                    <div class="col-3">
                        <a href="{{ route('contact.create') }}" class="btn btn-success w-100">+ Dodaj novi</a>
                    </div>
                </div>
            </form>

            <table class="table table-hover mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Email</th>
                    <th>Grad</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->first_name }}</td>
                        <td>{{ $contact->last_name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->city->name }}</td>
                        <td>
                            <a href="{{ route('contact.edit', ['id' => $contact->id]) }}" class="btn btn-primary btn-sm">izmjena</a>
                        </td>
                        <td>
                            <form action="{{ route('contact.delete', ['id' => $contact->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" >brisanje</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
