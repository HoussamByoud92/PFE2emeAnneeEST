@extends('Beneficiaire.source')

@section('content')
    @foreach ($dossierOrange as $dossier)
        <div class="container-fluid py-6 ms-auto" style="margin-right: 150px">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row gx-4">
                                <div class="col-auto">
                                    <div class="avatar avatar-xl position-relative">
                                        <img src="../../../../img/OIP.jpeg" alt="profile_image"
                                            class="w-100 border-radius-lg shadow-sm">
                                    </div>
                                </div>

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
                                <div class="col-lg-7 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 "
                                style="width: 1000px;">
                                <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                    <ul class="nav nav-pills nav-fill p-1 row" role="tablist">
                                        <li class="nav-item col-4">
                                            <a href="{{ route('parcoursScolaire.show', $dossier->beneficiaire->id) }}"
                                                class="btn btn-sm btn-danger mb-0 d-none d-lg-block">المسار
                                                الدراسي</a>
                                        </li>
                                        <li class="nav-item col-4">
                                            <a href="{{ route('infraction.show', $dossier->beneficiaire->id) }}"
                                                class="btn btn-sm btn-primary mb-0 d-none d-lg-block">المخالفات</a>
                                        </li>
                                        <li class="nav-item col-4">
                                            <a href="{{ route('dossierMedical.show', $dossier->beneficiaire->id) }}"
                                                class="btn btn-sm btn-dark mb-0 d-none d-lg-block">الملف الصحي</a>
                                        </li>
                                        <li class="nav-item col-4 mt-2">
                                            <a href="{{ route('dossierOrange.show', $dossier->beneficiaire->id) }}"
                                                class="btn btn-sm btn-warning mb-0 d-none d-lg-block">الملف
                                                البرتقالي</a>
                                        </li>
                                        <li class="nav-item col-4 mt-2">
                                            <a href="{{ route('registreJournalier.show', $dossier->beneficiaire->id) }}"
                                                class="btn btn-sm btn-success mb-0 d-none d-lg-block">التسجيل
                                                اليومي</a>
                                        </li>
                                        <li class="nav-item col-4 mt-2">
                                            <a href="{{ route('visite.show', $dossier->beneficiaire->id) }}"
                                                class="btn btn-sm btn-info mb-0 d-none d-lg-block">الزيارات</a>
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
        <!--partie info sue le beneficiaire -->
        @empty($dossier->certificat_vie_collectif)
            <p>ta rani khawi hhhh</p>
            <div class="col-lg-5 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a href="{{ route('dossierOrange.edit', $dossier->id) }}"
                                class="btn btn-sm btn-warning mb-0 d-none d-lg-block">تعديل الملف
                                البتقالي</a>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div class="container-fluid py-0 ms-auto">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="card" style="width: 1230px; height: 700px;">
                            <div class="card-body p-3">
                                <div class="row gx-4">
                                    <div class="col-md-4" style="width: 400px; height: 600px;">
                                        <div class="card card-profile col-md-4" style="width: 100%; height: 600px;">
                                            <img src="../../../../image/{{ $dossier->certificat_vie_collectif }}"
                                                style="width: 100%; height: 100%;" alt="Image placeholder" class="card-img-top">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="width: 400px; height: 600px;">
                                        <div class="card card-profile col-md-4" style="width: 100%; height: 600px;">
                                            <img src="../../../../image/{{ $dossier->fiche_scolaire }}"
                                                style="width: 100%; height: 100%;" alt="Image placeholder" class="card-img-top">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="width: 400px; height: 600px;">
                                        <div class="card card-profile col-md-4" style="width: 100%; height: 600px;">
                                            <img src="../../../../image/{{ $dossier->engagement_tuteur }}"
                                                style="width: 100%; height: 100%;" alt="Image placeholder" class="card-img-top">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                                        <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                                <li class="nav-item">
                                                    <a href="{{ route('dossierOrange.edit', $dossier->id) }}"
                                                        class="btn btn-sm btn-warning mb-0 d-none d-lg-block">تعديل الملف
                                                        البتقالي</a>
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
        @endempty
    @endforeach
@endsection
