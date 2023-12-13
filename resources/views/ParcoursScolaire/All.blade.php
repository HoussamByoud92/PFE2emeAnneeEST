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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('creates', $beneficiaire->id) }}"
                            class="btn btn-m btn-link mx-auto mb-0 d-none d-lg-block"><i
                                class="fas fa-plus"></i>&nbsp;&nbsp;اضافة مسار دراسي</a>
                    </div>
                    <div class="card-header pb-0">
                        <h6>جدول المسارات الدراسية</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">السنة
                                            الدراسية
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            المؤسسة</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            القسم
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            معدل الدورة الاولى
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            معدل الدورة الثانية
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            معدل السنة
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ">
                                            اكشن
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parcoursScolaire as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div
                                                        class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                                                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->annee_sco }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->etablissement_sco }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->classe }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->moy_s1 }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->moy_s2 }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->moy_ann }}</p>
                                            </td>
                                            <td class="align-middle">
                                                <div class="ml-auto text-end row">
                                                    <form id="deleteForm" onsubmit="return confirmDelete()" class="col-4"
                                                        action="{{ route('parcoursScolaire.destroy', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-link text-danger text-gradient px-0 mb-0"><i
                                                                class="far fa-trash-alt me-2"></i>حدف</button>
                                                    </form>
                                                    <script>
                                                        function confirmDelete() {
                                                            return confirm(
                                                                "Êtes-vous sûr de vouloir supprimer cette demande ?"); // Affiche une boîte de dialogue de confirmation
                                                        }
                                                    </script>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $parcoursScolaire->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
