@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Shift</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('shifts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="agent_id">Agent</label>
            <select name="agent_id" class="form-control" required>
                @foreach($agents as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->nom }} {{ $agent->prenom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type_shift">Type de Shift</label>
            <select name="type_shift" class="form-control" required>
                <option value="matin">Matin</option>
                <option value="soir">Soir</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
