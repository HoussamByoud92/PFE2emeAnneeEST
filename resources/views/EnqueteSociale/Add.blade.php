@extends('EnqueteSociale.source')

@section('content')
    <div class="container-fluid py-6 ms-auto">
        <form action="{{ route('enqueteSociale.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header pb-0">
                        </div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">تاريخ البحث</label>
                                    <input name="date_enquete" placeholder="الاسم الكامل" class="form-control"
                                        type="date">
                                </div>
                            </div>
                            <p class="text-uppercase text-m">معلومات الطفل</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">الاسم الكامل</label>
                                        <input name="nom_prenom" placeholder="الاسم الكامل" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">مكان السكن</label>
                                        <input name="adresse_enfant" placeholder="مكان السكن" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">مكان الازدياد</label>
                                        <input name="lieu_naissance" placeholder="مكان الازدياد" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">تاريخ الازدياد</label>
                                        <input name="date_naissance" placeholder="تاريخ الازدياد" class="form-control"
                                            type="date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">معلومات عن الطفل</label>
                                        <textarea name="info_enfant" placeholder="معلومات عن الطفل" class="form-control" type="text"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">المستوى الدراسي</label>
                                        <input name="niveau_scolaire" placeholder="المستوى الدراسي" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">الحالة الاجتماعية</label>
                                        <input name="niveau_scolaire" placeholder="الحالة الاجتماعية" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">الحالة الدراسية</label>
                                        <input name="niveau_scolaire" placeholder="الحالة الدراسية" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-m">معلومات الاخوة</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">عدد الاخوة</label>
                                            <input name="nbr_frr" class="form-control" type="number"
                                                placeholder=" عدد الاخوة الذكور">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">عدد الاخوة
                                                الاناث</label>
                                            <input name="nbr_soeur" class="form-control" type="number"
                                                placeholder=" عدد الاخوة الاناث">
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <p class="text-uppercase text-m">معلومات الولي</p>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">السن</label>
                                            <input name="tuteur_age" class="form-control" type="text"
                                                placeholder="السن">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">المهنة</label>
                                            <input name="tuteur_metier" class="form-control" type="text"
                                                placeholder="المهنة">
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
                                            <input name="etat_scolarite" class="form-control" type="text"
                                                placeholder="المستوى الدراسي">
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <p class="text-uppercase text-m">الوضع السوسيو-اقتصادي للطفل</p>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">الاصل
                                                الجغرافي</label>
                                            <input name="origine_geographique" class="form-control" type="text"
                                                placeholder="الاصل الجغرافي">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">نوع السكن </label>
                                            <input name="type_residance" class="form-control" type="text"
                                                placeholder="نوع السكن ">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">السكن</label>
                                            <input name="residence" class="form-control" type="text"
                                                placeholder="السكن">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">عدد أفراد
                                                الاسرة</label>
                                            <input name="nbr_membre_famille" class="form-control" type="number"
                                                placeholder="عدد أفراد الاسرة">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">عدد الغرف</label>
                                            <input class="form-control" type="number" name="nbr_chambre"
                                                placeholder="عدد الغرف">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">عدد
                                                المقيمين</label>
                                            <input class="form-control" type="number" name="nbr_habitant"
                                                placeholder="عدد المقيمين">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">مصدر العيش</label>
                                            <input class="form-control" type="text" name="source_de_vie"
                                                placeholder="مصدر العيش">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">الطلب الموافق
                                                للبحث</label>
                                            <select class="form-control" name="id_demande">
                                                @foreach ($demande as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nom_prenom_enfant }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                    <div class="col-md-6">
                                        <button class="btn btn-primary btn-sm mb-0 w-100"
                                            href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree"
                                            type="button">PDF</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
