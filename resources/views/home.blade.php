@extends("layouts.app")

@section("content")

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Dashboard</h1>


            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Agents</h4>
                            <div class="stats-figure">{{ $agentCount }}</div>
                        </div>
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                </div>
        
                <!-- Nombre d'équipements -->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Agents en service</h4>
                            {{-- <div class="stats-figure">{{ $nombreEquipements }}</div> --}}
                        </div>
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                </div>
        
                <!-- Nombre de marques -->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Agents non en service</h4>
                            {{-- <div class="stats-figure">{{ $nombreMarques }}</div> --}}
                        </div>
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                </div>
        
                <!-- Nombre de licences -->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Licences</h4>
                            {{-- <div class="stats-figure">{{ $nombreLicences }}</div> --}}
                        </div>
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                </div>
        
            </div><!--//row-->
         
            <h1 class="app-page-title">Liste des agents en service aujourd'hui : </h1>
            <div class="container d-flex justify-content-center align-items-center ">
                <div class="col-12">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                          <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                              <thead>
                                <tr>
                                  <th class="cell">Date</th>
                                  <th class="cell">Agent</th>
                                  <th class="cell">Type de Shift</th>
                                 
                                  <th class="cell"></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($shiftsDuJour as $shift)
                                <tr>
                                  <td class="cell">{{ $shift->date->locale('fr')->format('d M Y') }}</td>
                                  <td class="cell">
                                    {{ $shift->agent->nom }}
                                    <br>
                                    {{ $shift->agent->prenom }}

                                  </td>
                                
                                  <td class="cell">{{ $shift->type_shift }}</td>
                                 
                                  <td class="cell">
                                    <a class="btn-sm app-btn-secondary" href="{{ route('shifts.edit', $shift->id) }}">Modifier</a>
                                  </td>
                                  <td class="cell">
                                    <td class="cell">
                                        @if (!$shift->enService)
                                            <form action="{{ route('changeState', $shift->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn-sm app-btn-primary">Présent</button>
                                            </form>
                                        @else
                                            <span class="badge bg-success">En service</span>
                                        @endif
                                    </td>
                                    
                                </td>
                                
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div><!--//table-responsive-->
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div>
            </div>
           

        </div><!--//container-fluid-->
    </div><!--//app-content-->

    <footer class="app-footer">
        <div class="container text-center py-3">
            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>

        </div>
    </footer><!--//app-footer-->

</div><!--//app-wrapper-->



@endsection