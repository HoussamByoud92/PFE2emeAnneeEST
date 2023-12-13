@extends('Utilisateur.source')

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


                            <p class="text-uppercase text-m">معلومات المستخدم</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prenom" class="form-control-label">الإسم</label>
                                        <input disabled value="{{ $utilisateur->name }}" name="name"
                                            placeholder="الإسم" class="form-control" type="text">
                                    </div>
                                </div>
                                

                                <div class="col-md-6 w-100">
                                    <div class="form-group">
                                        <label for="adresse" class="form-control-label">العنوان</label>
                                        <input disabled value="{{ $utilisateur->adresse }}" name="adresse"
                                            placeholder="العنوان" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 w-100">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label w-100">البريد الإلكتروني</label>
                                        <input disabled value="{{ $utilisateur->email }}" name="email"
                                            placeholder="البريد الإلكتروني" class="form-control" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone" class="form-control-label">رقم الهاتف</label>
                                        <input disabled value="{{ $utilisateur->telephone }}" name="telephone"
                                            placeholder="رقم الهاتف" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_nais" class="form-control-label">تاريخ الإزدياد</label>
                                        <input disabled value="{{ $utilisateur->date_nais }}" name="date_nais"
                                            class="form-control" placeholder="تاريخ الإزدياد" type="date">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lieu_nais" class="form-control-label">مكان الإزدياد</label>
                                        <input disabled value="{{ $utilisateur->lieu_nais }}" name="lieu_nais"
                                            class="form-control" placeholder="مكان الإزدياد" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CIN" class="form-control-label">رقم ب.ت.و</label>
                                        <input disabled value="{{ $utilisateur->CIN }}" name="CIN" class="form-control"
                                            placeholder="رقم ب.ت.و" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 w-100">
                                    <div class="form-group">
                                        <label for="role" class="form-control-label">الوظيفة</label>
                                        <input disabled value="{{ $utilisateur->role }}" name="role"
                                            class="form-control" type="text" placeholder="الوظيفة">
                                    </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
