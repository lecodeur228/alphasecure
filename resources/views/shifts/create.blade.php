@extends('layouts.app')

@section('content')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Ajouter un Shift</h1>
            <hr class="mb-4">
            <div class="row g-4 settings-section">
            
            <div class="container d-flex justify-content-center align-items-center min-vh-100">
                <div class="col-12 col-md-8">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="settings-form" action="{{ route('shifts.store') }}" method="POST">
                                @csrf
                                @method('POST')

                                {{-- Champ Agent --}}
                                <div class="mb-3">
                                    <label for="agent_id" class="form-label">Agent</label>
                                    <select name="agent_id" id="agent_id" class="form-select @error('agent_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>Choisir un agent</option>
                                        @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->nom }} {{ $agent->prenom }}</option>
                                        @endforeach
                                    </select>
                                    @error('agent_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Champ Date --}}
                                <div class="mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" required>
                                    @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Champ Type de Shift --}}
                                <div class="mb-3">
                                    <label for="type_shift" class="form-label">Type de Shift</label>
                                    <select name="type_shift" id="type_shift" class="form-select @error('type_shift') is-invalid @enderror" required>
                                        <option value="" disabled selected>Choisir un type de shift</option>
                                        <option value="matin">Matin</option>
                                        <option value="soir">Soir</option>
                                    </select>
                                    @error('type_shift')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn app-btn-primary">Ajouter</button>
                            </form>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div>
            </div>

            </div><!--//row-->
          
        </div><!--//container-xl-->
    </div><!--//app-content-->

    <footer class="app-footer">
        <div class="container text-center py-3">
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
        </div>
    </footer><!--//app-footer-->

</div><!--//app-wrapper-->

@endsection
