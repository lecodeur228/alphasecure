@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">{{ __('Edit Shift') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('shifts.update', $shift->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="date">{{ __('Date') }}</label>
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date', $shift->date) }}" required>
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type_shift">{{ __('Shift Type') }}</label>
                            <input id="type_shift" type="text" class="form-control @error('type_shift') is-invalid @enderror" name="type_shift" value="{{ old('type_shift', $shift->type_shift) }}" required>
                            @error('type_shift')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="agent_id">{{ __('Agent') }}</label>
                            <select id="agent_id" class="form-control @error('agent_id') is-invalid @enderror" name="agent_id" required>
                                <option value="">Select an Agent</option>
                                @foreach($agents as $agent)
                                    <option value="{{ $agent->id }}" {{ old('agent_id', $shift->agent_id) == $agent->id ? 'selected' : '' }}>{{ $agent->name }}</option>
                                @endforeach
                            </select>
                            @error('agent_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
