@extends("layouts.app")

@section("content")

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Ajouter un Agent</h1>
            <hr class="mb-4">
            <div class="row g-4 settings-section">
            
            <div class="container d-flex justify-content-center align-items-center min-vh-100">
                <div class="col-12 col-md-8">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">

                            <form class="settings-form" method="POST" action="{{ route('agents.store') }}">
                                @csrf
                                @method('POST')

                                {{-- Champ Prénom --}}
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}">
                                    @error('prenom')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Champ Nom --}}
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}">
                                    @error('nom')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Champ Email --}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Champ Téléphone --}}
                                <div class="mb-3">
                                    <label for="telephone" class="form-label">Téléphone</label>
                                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}">
                                    @error('telephone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Champ Disponibilité --}}
                                <div class="mb-3">
                                    <label for="disponibilite" class="form-label">Disponibilité</label>
                                    <select class="form-select @error('disponibilite') is-invalid @enderror" id="disponibilite" name="disponibilite">
                                        <option value="" disabled selected>Sélectionnez...</option>
                                        <option value="1" {{ old('disponibilite') == '1' ? 'selected' : '' }}>Disponible</option>
                                        <option value="0" {{ old('disponibilite') == '0' ? 'selected' : '' }}>Non disponible</option>
                                    </select>
                                    @error('disponibilite')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Champ Photo --}}
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" value="{{ old('photo') }}">
                                    @error('photo')
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
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"
                    style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com"
                    target="_blank">Xiaoying Riley</a> for developers</small>
        </div>
    </footer><!--//app-footer-->

</div><!--//app-wrapper-->

@endsection
