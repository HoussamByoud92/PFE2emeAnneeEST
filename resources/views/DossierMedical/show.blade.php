@extends('Beneficiaire.source')

@section('content')
    @foreach ($dossierMedical as $dossier)
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
        <div class="container-fluid py-0 ms-auto">
            @csrf
            <div class="row">
                <div class="row">
                    <div class="card col-md-6">
                        <div class="card-body p-0">
                            <div class="row gx-4">
                                <div class="col-lg-4" style="width: 100%; height: 100%;">
                                    <div class="card h-100">
                                        <div class="card-header pb-0 p-3">
                                            <div class="row">
                                                <div class="col-6 d-flex align-items-center">
                                                    <h5 class="mb-0"> الملف الصحي</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-3 pb-0">
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">الوزن</h6>
                                                        <span class="text-s">{{ $dossier->poids }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">الطول</h6>
                                                        <span class="text-s">{{ $dossier->taille }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">الفصيلة الدموية
                                                        </h6>
                                                        <span class="text-s">{{ $dossier->groupe_sanguin }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">التاريخ العائلي</h6>
                                                        <span
                                                            class="text-s">{{ $dossier->antecedent_perso_familiaux }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">فحص الجهاز
                                                            الهضمي</h6>
                                                        <span class="text-s">{{ $dossier->examen_digestif }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">فحص القلب و
                                                            الأوعية الدموية</h6>
                                                        <span
                                                            class="text-s">{{ $dossier->examen_cardio_vasculaire }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">فحص الرئتين</h6>
                                                        <span class="text-s">{{ $dossier->examen_pluro_pulmonaire }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">فحص الجهاز
                                                            العصبي</h6>
                                                        <span class="text-s">{{ $dossier->examen_neurologique }}</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-6">
                        <div class="card-body p-0">
                            <div class="row gx-4">
                                <div class="col-lg-4" style="width: 100%; height: 100%;">
                                    <div class="card h-100">
                                        <div class="card-header pb-0 p-3 text-end">
                                            <div class="row">
                                                <div class="col-6 d-flex align-items-center">
                                                    <h6 hidden class="mb-0">تعديل الملف الصحي</h6>
                                                </div>
                                                <div class="col-6 text-start">
                                                    <a href="{{ route('dossierMedical.edit', $dossier->id) }}"
                                                        class="btn btn-sm btn-dark mb-0 d-none d-lg-block">تعديل الملف
                                                        الصحي</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-3 pb-0">
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">فحص المسالك
                                                            البولية</h6>
                                                        <span class="text-s">{{ $dossier->examen_urologique }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">الأمراض الجلدية
                                                        </h6>
                                                        <span class="text-s">{{ $dossier->examen_dermatologie }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">إختبار الدم
                                                        </h6>
                                                        <span class="text-s">{{ $dossier->examen_sanguin }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">فحص منطقة
                                                            العقدة
                                                            الليمفاوية</h6>
                                                        <span class="text-s">{{ $dossier->aires_gonglionnaire }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">التلقيح</h6>
                                                        <span class="text-s">{{ $dossier->etat_vaccinal }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">القرار</h6>
                                                        <span class="text-s">{{ $dossier->conclusion }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">التاريخ</h6>
                                                        <span class="text-s">{{ $dossier->date }}</span>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">الطبيب</h6>
                                                        <span class="text-s">{{ $dossier->medecin }}</span>
                                                    </div>
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
        </div>
    @endforeach
@endsection
