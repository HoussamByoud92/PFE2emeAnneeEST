@extends('Demande.source')

@section('content')
    <div class="container-fluid py-6 ms-auto">
        <form>
            @csrf
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
                                        <input disabled value="{{ $demande->nom_prenom }}" name="nom_prenom"
                                            placeholder="الاسم الكامل" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">مكان السكن</label>
                                        <input disabled value="{{ $demande->adresse }}" name="adresse"
                                            placeholder="مكان السكن" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">رقم البطاقة
                                            الوطنية</label>
                                        <input disabled value="{{ $demande->CIN }}" name="CIN"
                                            placeholder="رقم البطاقة الوطنية" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">تاريخ انتهاء
                                            الصلاحية</label>
                                        <input disabled value="{{ $demande->date_expiration }}" name="date_expiration"
                                            placeholder="تاريخ انتهاء الصلاحية" class="form-control" type="date">
                                    </div>
                                </div>
                                @empty($demande->autre)
                                    <div class="col-md-4">
                                        <label for="example-text-input" class="form-control-label">علاقة القرابة</label>
                                        <div class="form-group">
                                            <input disabled value="{{ $demande->pere_ou_mere }}" name="autre"
                                                class="form-control" placeholder="التحديد" type="text">
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input value="{{ $demande->autre }}" name="autre" class="form-control"
                                                placeholder="التحديد" type="text">
                                        </div>
                                    </div>
                                @endempty
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-m">معلومات الطفل</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">الاسم الكامل</label>
                                        <input disabled value="{{ $demande->nom_prenom_enfant }}" name="nom_prenom_enfant"
                                            class="form-control" type="text" placeholder="الاسم الكامل">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">المؤسسة</label>
                                        <input disabled value="{{ $demande->etablissement }}" name="etablissement"
                                            class="form-control" type="text" placeholder="المؤسسة">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">البعد عن المدرسة</label>
                                        <input disabled value="{{ $demande->type_exploitation }}" name="cause"
                                            class="form-control" type="text" placeholder="نعم أم لا">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">ضعف الحالة
                                            الجتماعية</label>
                                        <input disabled value="{{ $demande->cause }}" name="type_exploitation"
                                            class="form-control" type="text" placeholder="نعم أم لا">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">يتيم</label>
                                        <input disabled value="{{ $demande->orphelinat }}" name="orphelinat"
                                            class="form-control" type="text" placeholder="الأب الأم أو هما معا">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">العنف العائلي</label>
                                        <input disabled value="{{ $demande->violence }}" name="violence"
                                            class="form-control" type="text" placeholder="نعم أم لا">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">الاستغلال</label>
                                        <input disabled value="{{ $demande->exploitation }}" name="exploitaion"
                                            class="form-control" type="text" placeholder="نوع الاستغلال">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">مكان ملء
                                            الاستمارة</label>
                                        <input disabled value="{{ $demande->lieu_demande }}" name="lieu_demande"
                                            class="form-control" type="text" placeholder="المكان">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">تاريخ ملء
                                            الاستمارة</label>
                                        <input disabled name="date_demande" value="{{ $demande->date_demande }}"
                                            class="form-control" type="date">
                                    </div>
                                </div>
                                <div class="flex items-center leading-normal text-sm">
                                    <a href="{{ route('pdf', ['id_demande' => $demande->id]) }}"
                                        class="inline-block px-0 py-3 mb-0 ml-6 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-soft-in bg-150 text-sm active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 text-slate-700"><i
                                            class="mr-1 fas fa-file-pdf text-lg"></i> PDF</a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-sm mb-0 w-100"
                                        href="{{ route('index_un', ['id_demande' => $demande->id]) }}"
                                        type="button">Enquete Sociale</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
