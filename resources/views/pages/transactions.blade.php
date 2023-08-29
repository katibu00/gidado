@extends('layout.app')
@section('PageTitle', 'Transaction History')
@section('content')

<div class="main-container">
    <div class="container">
        <div class="card">
            <div class="card-body px-0">
                <ul class="list-group list-group-flush">
             
                    <li class="list-group-item">
                        <div class="row align-items-center">
                            {{-- <div class="col-auto pr-0">
                                <div class="avatar avatar-40 rounded">
                                    <figure class="mb-0 avatar avatar-40 mr-2 bg-info rounded-circle">
                                        Data
                                    </figure>
                                </div>
                            </div> --}}
                            <div class="col align-self-center pr-0">
                                <h6 class="font-weight-normal mb-1">1GB - 08033167832</h6>
                                <p class="small text-secondary">15-1-2020, 8:00 am (3 hours ago)</p>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-success">N216</h6>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center">
                            {{-- <div class="col-auto pr-0">
                                <div class="avatar avatar-40 rounded">
                                    <figure class="mb-0 avatar avatar-40 mr-2 bg-info rounded-circle">
                                        Data
                                    </figure>
                                </div>
                            </div> --}}
                            <div class="col align-self-center pr-0">
                                <h6 class="font-weight-normal mb-1">1GB - 08033167832</h6>
                                <p class="small text-secondary">15-1-2020, 8:00 am (3 hours ago)</p>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-success">N216</h6>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection