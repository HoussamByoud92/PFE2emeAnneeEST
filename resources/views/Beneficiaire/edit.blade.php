@extends('Demande.source')

@section('content')
    <div class="container-fluid py-6 ms-auto">
        <form action="{{ route('demande.update', $demande->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header pb-0">
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-m">معلومات الولي</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">الاسم الكامل</label>
                                        <input value="{{ $demande->nom_prenom }}" name="nom_prenom"
                                            placeholder="الاسم الكامل" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">مكان السكن</label>
                                        <input value="{{ $demande->adresse }}" name="adresse" placeholder="مكان السكن"
                                            class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">رقم البطاقة
                                            الوطنية</label>
                                        <input value="{{ $demande->CIN }}" name="CIN" placeholder="رقم البطاقة الوطنية"
                                            class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">تاريخ انتهاء
                                            الصلاحية</label>
                                        <input value="{{ $demande->date_expiration }}" name="date_expiration"
                                            placeholder="تاريخ انتهاء الصلاحية" class="form-control" type="date">
                                    </div>
                                </div>
                                <div class="form-check form-check-info text-start justify-content-start col-sm-2">
                                    <input value="الأب" name="pere_ou_mere" class="form-check-input float-end"
                                        type="checkbox" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        الأب
                                    </label>
                                </div>
                                <div class="form-check form-check-info text-start justify-content-start col-sm-2">
                                    <input value="الأم" name="pere_ou_mere" name="pere_ou_mere"
                                        class="form-check-input float-end" type="checkbox" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        الأم
                                    </label>
                                </div>
                                <div class="form-check form-check-info text-start justify-content-start col-sm-2">
                                    <input class="form-check-input float-end" type="checkbox" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        آخر
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="autre" class="form-control" placeholder="التحديد" type="text">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-m">معلومات الطفل</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">الاسم الكامل</label>
                                        <input value="{{ $demande->nom_prenom_enfant }}" name="nom_prenom_enfant"
                                            class="form-control" type="text" placeholder="الاسم الكامل">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">المؤسسة</label>
                                        <input value="{{ $demande->etablissement }}" name="etablissement"
                                            class="form-control" type="text" placeholder="المؤسسة">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">البعد عن المدرسة</label>
                                        <input value="{{ $demande->type_exploitation }}" name="cause"
                                            class="form-control" type="text" placeholder="نعم أم لا">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">ضعف الحالة
                                            الجتماعية</label>
                                        <input value="{{ $demande->cause }}" name="type_exploitation"
                                            class="form-control" type="text" placeholder="نعم أم لا">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">يتيم</label>
                                        <input value="{{ $demande->orphelinat }}" name="orphelinat" class="form-control"
                                            type="text" placeholder="الأب الأم أو هما معا">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">العنف العائلي</label>
                                        <input value="{{ $demande->violence }}" name="violence" class="form-control"
                                            type="text" placeholder="نعم أم لا">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">الاستغلال</label>
                                        <input value="{{ $demande->exploitation }}" name="exploitaion"
                                            class="form-control" type="text" placeholder="نوع الاستغلال">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">مكان ملء
                                            الاستمارة</label>
                                        <input value="{{ $demande->lieu_demande }}" name="lieu_demande"
                                            class="form-control" type="text" placeholder="المكان">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">تاريخ ملء
                                            الاستمارة</label>
                                        <input name="date_demande" value="{{ $demande->date_demande }}"
                                            class="form-control" type="date">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit"
                                        href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard"
                                        class="btn btn-dark btn-sm w-100 mb-3">تعديل</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
