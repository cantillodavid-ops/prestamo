@extends('layouts.app')

@section('content')
<div class="mb-5">
        <h2 class="fw-bold text-dark m-0">Dashboard</h2>
        <p class="text-muted small">Resumen del estado actual del inventario y préstamos.</p>
    </div>

    <div class="row g-4">
        
        <div class="col-12 col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 position-relative overflow-hidden" style="background: #ffffff;">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase fw-semibold small tracking-wider">Equipos Disponibles</span>
                        <h1 class="display-5 fw-extrabold text-success mt-2 mb-0">{{ $disponibles }}</h1>
                    </div>
                    <div class="rounded-3 p-3 bg-success bg-opacity-10 text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.722V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1.5 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1.5 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                        </svg>
                    </div>
                </div>
                <div class="position-absolute bottom-0 start-0 end-0 bg-success" style="height: 4px;"></div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 position-relative overflow-hidden" style="background: #ffffff;">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase fw-semibold small tracking-wider">Equipos Prestados</span>
                        <h1 class="display-5 fw-extrabold text-warning mt-2 mb-0">{{ $prestados }}</h1>
                    </div>
                    <div class="rounded-3 p-3 bg-warning bg-opacity-10 text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 2.118a7 7 0 0 0-.307-.975l.91-.415c.142.312.258.64.348.974l-.951.216zm.134 2.032c.003-.056.004-.11.004-.165h1a9 9 0 0 1-.006.413l-.998-.048zm-.51 1.956c.088-.316.155-.642.2-.974l.983.148c-.06.417-.146.828-.258 1.224l-.925-.398zM11.5 13h-4a3.5 3.5 0 1 1 0-7h4a3.5 3.5 0 1 1 0 7m0-1a2.5 2.5 0 1 0 0-5h-4a2.5 2.5 0 1 0 0 5z"/>
                        </svg>
                    </div>
                </div>
                <div class="position-absolute bottom-0 start-0 end-0 bg-warning" style="height: 4px;"></div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 position-relative overflow-hidden" style="background: #ffffff;">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted text-uppercase fw-semibold small tracking-wider">Total Préstamos</span>
                        <h1 class="display-5 fw-extrabold text-primary mt-2 mb-0">{{ $total }}</h1>
                    </div>
                    <div class="rounded-3 p-3 bg-primary bg-opacity-10 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                            <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                        </svg>
                    </div>
                </div>
                <div class="position-absolute bottom-0 start-0 end-0 bg-primary" style="height: 4px;"></div>
            </div>
        </div>

    </div>
@endsection
