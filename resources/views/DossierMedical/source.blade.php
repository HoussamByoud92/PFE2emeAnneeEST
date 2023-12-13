@extends('Beneficiaire.source')

@section('content')
    <div class="container-fluid py-6 ms-auto">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row gx-4">
                            <div class="col-auto">
                                <div class="avatar avatar-xl position-relative">
                                    <img src="../../../../img/team-1.jpg" alt="profile_image"
                                        class="w-100 border-radius-lg shadow-sm">
                                </div>
                            </div>
                            @foreach ($dossierOrange as $dossier)
                                <div class="col-auto my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1">
                                            {{ $dossier->beneficiaire->nom_prenom }}
                                        </h5>
                                        <p class="mb-0 font-weight-bold text-sm">
                                            {{ $dossier->beneficiaire->id }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                            <li class="nav-item">
                                                <a href="javascript:;"
                                                    class="btn btn-sm btn-light mb-0 d-none d-lg-block">ana</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:;"
                                                    class="btn btn-sm btn-dark mb-0 d-none d-lg-block mx-4">الملف الصحي</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('dossierOrange.show', $dossier->beneficiaire->id) }}"
                                                    class="btn btn-sm btn-warning mb-0 d-none d-lg-block">الملف
                                                    البرتقالي</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
@endsection
