@extends('EnqueteSociale.source')

@section('content')
    <div class="container-fluid py-6 ms-auto">
        <form action="{{ route('enqueteSociale.update', $enqueteSociale->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header pb-0">
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-m">معلومات الطفل</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">الاسم الكامل</label>
                                        <input value="{{ $enqueteSociale->nom_prenom }}" name="nom_prenom"
                                            placeholder="الاسم الكامل" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">مكان السكن</label>
                                        <input value="{{ $enqueteSociale->type_residance }}" name="type_residance"
                                            placeholder="مكان السكن" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">مكان الازدياد</label>
                                        <input value="{{ $enqueteSociale->lieu_naissance }}" name="lieu_naissance"
                                            placeholder="مكان الازدياد" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">تاريخ الازدياد</label>
                                        <input value="{{ $enqueteSociale->date_naissance }}" name="date_naissance"
                                            placeholder="تاريخ الازدياد" class="form-control" type="date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">معلومات عن الطفل</label>
                                        <textarea value="{{ $enqueteSociale->info_enfant }}" name="info_enfant" placeholder="معلومات عن الطفل"
                                            class="form-control" type="text"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">المستوى الدراسي</label>
                                        <input value="{{ $enqueteSociale->niveau_scolaire }}" name="niveau_scolaire"
                                            placeholder="المستوى الدراسي" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">الحالة الصحية</label>
                                        <input value="{{ $enqueteSociale->etat_sante }}" name="etat_sante"
                                            placeholder="الحالة الصحية" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">الحالة الاجتماعية</label>
                                        <input value="{{ $enqueteSociale->etat_social }}" name="etat_social"
                                            placeholder="الحالة الاجتماعية" class="form-control" type="text">
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-m">معلومات الاخوة</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">عدد الاخوة</label>
                                            <input value="{{ $enqueteSociale->nbr_frr }}" name="nbr_frr"
                                                class="form-control" type="number" placeholder=" عدد الاخوة الذكور">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">عدد الاخوة
                                                الاناث</label>
                                            <input value="{{ $enqueteSociale->nbr_soeur }}" name="nbr_soeur"
                                                class="form-control" type="number" placeholder=" عدد الاخوة الاناث">
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <p class="text-uppercase text-m">معلومات الولي</p>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">السن</label>
                                            <input value="{{ $enqueteSociale->tuteur_age }}" name="tuteur_age"
                                                class="form-control" type="text" placeholder="السن">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">المهنة</label>
                                            <input value="{{ $enqueteSociale->tuteur_metier }}" name="tuteur_metier"
                                                class="form-control" type="text" placeholder="المهنة">
                                        </div>
                                    </div>
                                    <div class="form-check form-check-info text-start justify-content-start col-sm-3">
                                        <input value="متوفي" name="tuteur_etat" class="form-check-input float-end"
                                            type="checkbox" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            متوفي
                                        </label>
                                    </div>
                                    <div class="form-check form-check-info text-start justify-content-start col-sm-3">
                                        <input value="على قيد الحياة" name="tuteur_etat"
                                            class="form-check-input float-end" type="checkbox" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            على قيد الحياة
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">المستوى
                                                الدراسي</label>
                                            <input value="{{ $enqueteSociale->etat_scolarite }}" name="etat_scolarite"
                                                class="form-control" type="text" placeholder="المستوى الدراسي">
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <p class="text-uppercase text-m">الوضع السوسيو-اقتصادي للطفل</p>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">الاصل
                                                الجغرافي</label>
                                            <input value="{{ $enqueteSociale->origine_geographique }}"
                                                name="origine_geographique" class="form-control" type="text"
                                                placeholder="الاصل الجغرافي">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">نوع السكن </label>
                                            <input value="{{ $enqueteSociale->type_residance }}" name="type_residance"
                                                class="form-control" type="text" placeholder="نوع السكن ">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">السكن</label>
                                            <input value="{{ $enqueteSociale->residence }}" name="residence"
                                                class="form-control" type="text" placeholder="السكن">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">عدد أفراد
                                                الاسرة</label>
                                            <input value="{{ $enqueteSociale->nbr_membre_famille }}"
                                                name="nbr_membre_famille" class="form-control" type="number"
                                                placeholder="عدد أفراد الاسرة">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">عدد الغرف</label>
                                            <input value="{{ $enqueteSociale->nbr_chambre }}" class="form-control"
                                                type="number" name="nbr_chambre" placeholder="عدد الغرف">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">عدد
                                                المقيمين</label>
                                            <input value="{{ $enqueteSociale->nbr_habitant }}" class="form-control"
                                                type="number" name="nbr_habitant" placeholder="عدد المقيمين">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">مصدر العيش</label>
                                            <input value="{{ $enqueteSociale->source_de_vie }}" class="form-control"
                                                type="text" name="source_de_vie" placeholder="مصدر العيش">
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit"
                                            href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard"
                                            class="btn btn-dark btn-sm w-100 mb-3">تأكيد الاضافة</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
