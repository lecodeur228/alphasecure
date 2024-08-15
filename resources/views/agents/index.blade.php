@extends("layouts.app")

@section("content")

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Liste des agents</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="docs-search-form row gx-1 align-items-center" action="" method="GET">
                                    <div class="col-auto">
                                        <input type="text" id="search-docs" name="searchdocs" class="form-control search-docs" placeholder="Rechercher">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Rechercher</button>
                                    </div>
                                </form>
                            </div><!--//col-->

                            <div class="col-auto">
                                <a class="btn app-btn-primary" href="{{ route('agents.create') }}">Ajouter un agent</a>
                            </div>
                        </div><!--//row-->
                    </div><!--//page-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->

            <div class="row g-4">
               {{-- Vérifiez si la collection d'agents n'est pas vide --}}
@forelse($agents as $agent)
<div class="col-6 col-md-4 col-xl-3 col-xxl-2">
    <div class="app-card app-card-doc shadow-sm h-100">
        <div class="app-card-thumb-holder p-3">
            <span class="icon-holder">
                <img class="profile-image" src="{{ $agent->photo }}">
            </span>
            <a class="app-card-link-mask" href="#agent-link"></a>
        </div>
        <div class="app-card-body p-3 has-card-actions">
            <h4 class="app-doc-title truncate mb-0">{{ $agent->prenom }} {{ $agent->nom }}</h4>
            
            <div class="app-doc-meta">
                <ul class="list-unstyled mb-0">
                    <li><span class="text-muted">Email:</span> {{ $agent->email }}</li>
                    <li><span class="text-muted">Téléphone:</span> {{ $agent->telephone }}</li>
                    <li><span class="text-muted">Disponibilité:</span> {{ $agent->disponibilite ? 'DISPO' : 'OCCUPER' }}</li>
                </ul>
            </div><!--//app-doc-meta-->

            <div class="app-card-actions">
                <div class="dropdown">
                    <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg>
                    </div><!--//dropdown-toggle-->
                    <ul class="dropdown-menu">
                        <!-- Lien d'édition -->
                        <li>
                            <a class="dropdown-item" href="{{ route('agents.edit', $agent->id) }}">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                                Modifier
                            </a>
                        </li>
                        
                        <li><hr class="dropdown-divider"></li>
                        
                        <!-- Lien de suppression -->
                        <li>
                            <form action="{{ route('agents.destroy', $agent->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet agent ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H3h10h.5a1 1 0 0 1 1 1v1zM4.118 4l.347 9.679A2 2 0 0 0 6.46 15h3.08a2 2 0 0 0 2-2.321L11.882 4H4.118z"/>
                                    </svg>
                                    Supprimer
                                </button>
                            </form>
                        </li>
                    </ul>
                </div><!--//dropdown-->
            </div><!--//app-card-actions-->
        </div><!--//app-card-body-->
    </div><!--//app-card-->
</div><!--//col-->
@empty
<div class="col-12">
    <p class="text-center">Aucun agent trouvé.</p>
</div>
@endforelse

            </div><!--//row-->
        </div><!--//container-xl-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->

@endsection
