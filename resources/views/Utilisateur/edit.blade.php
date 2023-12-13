@extends('Utilisateur.source')

@section('content')
    <div class="container-fluid py-6 ms-auto">
        <form action="{{ route('utilisateur.update', $utilisateur->id) }}" method="POST">
            @csrf
            @method('PUT')
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
                                        <input value="{{ $utilisateur->name}}" name="name" placeholder="الإسم" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                

                                <div class="col-md-6 w-100">
                                    <div class="form-group">
                                        <label for="adresse" class="form-control-label">العنوان</label>
                                        <input value="{{ $utilisateur->adresse}}" name="adresse" placeholder="العنوان"
                                            class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 w-100">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label w-100">   البريد الإلكتروني</label>
                                        <input value="{{ $utilisateur->email}}" name="email" placeholder="البريد الإلكتروني" class="form-control"
                                            type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone" class="form-control-label">رقم الهاتف</label>
                                        <input value="{{ $utilisateur->telephone}}" name="telephone" placeholder="رقم الهاتف"
                                            class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_nais" class="form-control-label">تاريخ الإزدياد</label>
                                        <input value="{{ $utilisateur->date_nais}}" name="date_nais" class="form-control" placeholder="تاريخ الإزدياد" type="date">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lieu_nais" class="form-control-label">مكان الإزدياد</label>
                                        <input value="{{ $utilisateur->lieu_nais}}" name="lieu_nais" class="form-control" placeholder="مكان الإزدياد" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CIN" class="form-control-label">رقم ب.ت.و</label>
                                        <input value="{{ $utilisateur->CIN}}" name="CIN" class="form-control" placeholder="رقم ب.ت.و" type="text">
                                    </div>
                                </div>



                                

                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-m">معلومات تسجيل الدخول</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">إسم المستخدم</label>
                                        <input value="{{ $utilisateur->name}}" name="name" class="form-control" type="text"
                                            placeholder="إسم المستخدم">
                                    </div>
                                </div>
                                
                               
                                <div class="col-md-6 w-100">
                                    <div class="form-group">
                                        <label for="role" class="form-control-label">الوظيفة</label>
                                        <select value="{{ $utilisateur->role}}" name="role" class="form-control" type="text" placeholder="الوظيفة">
                                        <option >directeur</option>
                                        <option >secretaire</option>
                                        <option >utilisateur</option>
                                        <option >educateur</option>
                                        <option >accompagnant</option>
                                        </select>
                                    </div>
                                </div>
                                
                            <hr class="horizontal dark">
                            <div class="row">
                                <div class="col-md-6 w-100">
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
