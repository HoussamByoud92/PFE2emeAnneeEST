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
    <div class="container-fluid py-6 ms-auto" style="margin-right: 150px">
        <form action="{{ route('dossierMedical.update', $dossierMedical->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header pb-0">
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-m">معلومات حول الملف الطبي</p>
                            <div class="row">
                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="poids" class="form-control-label w-50">الوزن</label>
                                        <input value="{{ $dossierMedical->poids }}" name="poids" placeholder="الوزن"
                                            class="form-control" type="number">
                                    </div>
                                </div>

                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="taille" class="form-control-label">الطول</label>
                                        <input value="{{ $dossierMedical->taille }}" name="taille" class="form-control"
                                            placeholder="الطول" type="number">
                                    </div>
                                </div>

                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="groupe_sanguin" class="form-control-label">الفصيلة الدموية</label>
                                        <input value="{{ $dossierMedical->groupe_sanguin }}" name="groupe_sanguin"
                                            placeholder="الفصيلة الدموية" class="form-control" type="string">
                                    </div>
                                </div>
                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="antecedent_perso_familiaux" class="form-control-label">التاريخ
                                            العائلي</label>
                                        <input value="{{ $dossierMedical->antecedent_perso_familiaux }}"
                                            name="antecedent_perso_familiaux" placeholder="التاريخ العائلي"
                                            class="form-control" type="string">
                                    </div>
                                </div>

                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="examen_digestif" class="form-control-label">فحص الجهاز الهضمي</label>
                                        <input value="{{ $dossierMedical->examen_digestif }}" name="examen_digestif"
                                            placeholder="فحص الجهاز الهضمي" class="form-control" type="string">
                                    </div>
                                </div>
                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="examen_cardio_vasculaire" class="form-control-label w-50">فحص القلب و
                                            الأوعية الدموية</label>
                                        <input value="{{ $dossierMedical->examen_cardio_vasculaire }}"
                                            name="examen_cardio_vasculaire" placeholder="فحص القلب و الأوعية الدموية"
                                            class="form-control" type="string">
                                    </div>
                                </div>

                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="examen_pluro_pulmonaire" class="form-control-label">فحص
                                            الرئتين</label>
                                        <input value="{{ $dossierMedical->examen_pluro_pulmonaire }}"
                                            name="examen_pluro_pulmonaire" class="form-control" placeholder="فحص الرئتين"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="examen_neurologique" class="form-control-label">فحص الجهاز
                                            العصبي</label>
                                        <input value="{{ $dossierMedical->examen_neurologique }}"
                                            name="examen_neurologique" placeholder="فحص الجهاز العصبي"
                                            class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="examen_urologique" class="form-control-label">فحص المسالك
                                            البولية</label>
                                        <input value="{{ $dossierMedical->examen_urologique }}" name="examen_urologique"
                                            placeholder="فحص المسالك البولية" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="examen_dermatologique" class="form-control-label">الأمراض
                                            الجلدية</label>
                                        <input value="{{ $dossierMedical->examen_dermatologique }}"
                                            name="examen_dermatologique" placeholder="الأمراض الجلدية"
                                            class="form-control" type="string">
                                    </div>
                                </div>
                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="aires_gonglionnaire" class="form-control-label w-50">فحص منطقة العقدة
                                            الليمفاوية</label>
                                        <input value="{{ $dossierMedical->aires_gonglionnaire }}"
                                            name="aires_gonglionnaire" placeholder="فحص منطقة العقدة الليمفاوية"
                                            class="form-control" type="string">
                                    </div>
                                </div>

                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="examen_sanguin" class="form-control-label">إختبار الدم</label>
                                        <input value="{{ $dossierMedical->examen_sanguin }}" name="examen_sanguin"
                                            class="form-control" placeholder="إختبار الدم" type="string">
                                    </div>
                                </div>
                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="etat_vaccinal" class="form-control-label">التلقيح</label>
                                        <input value="{{ $dossierMedical->etat_vaccinal }}" name="etat_vaccinal"
                                            placeholder="التلقيح" class="form-control" type="string">
                                    </div>
                                </div>
                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="conclusion" class="form-control-label">القرار</label>
                                        <input value="{{ $dossierMedical->conclusion }}" name="conclusion"
                                            placeholder="القرار" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="date" class="form-control-label">التاريخ</label>
                                        <input value="{{ $dossierMedical->date }}" name="date" placeholder="التاريخ"
                                            class="form-control" type="date">
                                    </div>
                                </div>
                                <div class="col-md-6 w-50">
                                    <div class="form-group">
                                        <label for="medecin" class="form-control-label w-50">الطبيب</label>
                                        <input value="{{ $dossierMedical->medecin }}" name="medecin"
                                            placeholder="الطبيب" class="form-control" type="string">
                                    </div>
                                </div>


                                <hr class="horizontal dark">
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit"
                                            href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard"
                                            class="btn btn-dark btn-sm w-50 mb-3">تأكيد الاضافة</button>
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
