@extends('Utilisateur.source')

@section('content')
    <div class="container-fluid py-6 ms-auto">
        <form action="{{ route('utilisateur.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header pb-0">
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-m">معلومات المستخدم</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prenom" class="form-control-label">الإسم</label>
                                        <input name="prenom" placeholder="الإسم" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom" class="form-control-label">النسب</label>
                                        <input name="nom" placeholder="النسب" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 w-100">
                                    <div class="form-group">
                                        <label for="adresse" class="form-control-label">العنوان</label>
                                        <input name="adresse" placeholder="العنوان"
                                            class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 w-100">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label w-100">البريد الإلكتروني</label>
                                        <input name="email" placeholder="البريد الإلكتروني" class="form-control"
                                            type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone" class="form-control-label">رقم الهاتف</label>
                                        <input name="telephone" placeholder="رقم الهاتف"
                                            class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_nais" class="form-control-label">تاريخ الإزدياد</label>
                                        <input name="date_nais" class="form-control" placeholder="تاريخ الإزدياد" type="date">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lieu_nais" class="form-control-label">مكان الإزدياد</label>
                                        <input name="lieu_nais" class="form-control" placeholder="مكان الإزدياد" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CIN" class="form-control-label">رقم ب.ت.و</label>
                                        <input name="CIN" class="form-control" placeholder="رقم ب.ت.و" type="text">
                                    </div>
                                </div>

                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-m">معلومات تسجيل الدخول</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Username" class="form-control-label">إسم المستخدم</label>
                                        <input name="Username" class="form-control" type="text"
                                            placeholder="إسم المستخدم">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="form-control-label">كلمة المرور</label>
                                        <input name="password" class="form-control" type="password"
                                            placeholder="كلمة المرور">
                                    </div>
                                </div>
                                <div class="col-md-6 w-100">
                                    <div class="form-group">
                                        <label for="role" class="form-control-label">الوظيفة</label>
                                        <input name="role" class="form-control" type="text" placeholder="الوظيفة">
                                    </div>
                                </div>
                                
                            <hr class="horizontal dark">
                            <div class="row">
                                <div class="col-md-6 w-50">
                                    <button type="submit"
                                        href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard"
                                        class="btn btn-dark btn-sm w-100 mb-3">تأكيد الاضافة</button>
                                </div>
                                <div class="col-md-6 w-50">
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
