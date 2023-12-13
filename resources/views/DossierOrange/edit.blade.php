@extends('Beneficiaire.source')

@section('content')
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
                                        {{ $beneficiaire->nom_prenom }}
                                    </h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        {{ $beneficiaire->id }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 "
                            style="width: 1000px;">
                            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                <ul class="nav nav-pills nav-fill p-1 row" role="tablist">
                                    <li class="nav-item col-4">
                                        <a href="{{ route('parcoursScolaire.show', $beneficiaire->id) }}"
                                            class="btn btn-sm btn-danger mb-0 d-none d-lg-block">المسار
                                            الدراسي</a>
                                    </li>
                                    <li class="nav-item col-4">
                                        <a href="{{ route('infraction.show', $beneficiaire->id) }}"
                                            class="btn btn-sm btn-primary mb-0 d-none d-lg-block">المخالفات</a>
                                    </li>
                                    <li class="nav-item col-4">
                                        <a href="{{ route('dossierMedical.show', $beneficiaire->id) }}"
                                            class="btn btn-sm btn-dark mb-0 d-none d-lg-block">الملف الصحي</a>
                                    </li>
                                    <li class="nav-item col-4 mt-2">
                                        <a href="{{ route('dossierOrange.show', $beneficiaire->id) }}"
                                            class="btn btn-sm btn-warning mb-0 d-none d-lg-block">الملف
                                            البرتقالي</a>
                                    </li>
                                    <li class="nav-item col-4 mt-2">
                                        <a href="{{ route('registreJournalier.show', $beneficiaire->id) }}"
                                            class="btn btn-sm btn-success mb-0 d-none d-lg-block">التسجيل
                                            اليومي</a>
                                    </li>
                                    <li class="nav-item col-4 mt-2">
                                        <a href="{{ route('visite.show', $beneficiaire->id) }}"
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
    <div class="container-fluid py-1 ms-auto" style="margin-right: 150px">
        <form action="{{ route('dossierOrange.update', $dossierOrange->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header pb-0">
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-m">معلومات حول الملف البرتقالي</p>
                            <div class="row">
                                <div class="col-md-6 w-100">
                                    <div class="form-group">
                                        <label for="certificat_vie_collectif" class="form-control-label">شهادة الحياة
                                            الجماعية</label>
                                        <input value="{{ $dossierOrange->certificat_vie_collectif }}"
                                            name="certificat_vie_collectif" placeholder="شهادة الحياة الجماعية"
                                            class="form-control" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6 w-100">
                                    <div class="form-group">
                                        <label for="engagement_tuteur" class="form-control-label w-100">إلتزام ولي
                                            الأمر</label>
                                        <input value="{{ $dossierOrange->engagement_tuteur }}" name="engagement_tuteur"
                                            placeholder="إلتزام ولي الأمر" class="form-control" type="file">
                                    </div>
                                </div>

                                <div class="col-md-6 w-100">
                                    <div class="form-group">
                                        <label for="fiche_scolaire" class="form-control-label">لشهادة المدرسية</label>
                                        <input value="{{ $dossierOrange->fiche_scolaire }}" name="fiche_scolaire"
                                            class="form-control" placeholder="لشهادة المدرسية" type="file">
                                    </div>
                                </div>

                                <hr class="horizontal dark">
                                <div class="row">
                                    <div class="col-md-8">
                                        <button type="submit"
                                            href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard"
                                            class="btn btn-dark btn-sm w-100 mb-3">تأكيد الاضافة</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
