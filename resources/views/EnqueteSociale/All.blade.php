@extends('EnqueteSociale.source')

@section('content')
    <br>
    <div class="d-flex justify-content-between">
        <a href="{{ route('enqueteSociale.create') }}" class="btn btn-sm btn-dark mx-auto mb-0 d-none d-lg-block"><i
                class="fas fa-plus"></i>&nbsp;&nbsp;اضافة بحث اجتماعي</a>
    </div>
    <br>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>جدول الابحاث الاجتماعية</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            الاسم الكامل للطفل</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            تاريخ و مكان الازدياد
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            تاريخ البحث</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ">
                                            اكشن</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enqueteSociale as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div
                                                        class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                                                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->nom_prenom }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->date_naissance }} /
                                                        {{ $item->lieu_naissance }}</p>
                                                </td>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->date_enquete }}</p>
                                                </td>
                                            </div>
                                            <td class="align-middle">
                                                <div class="ml-auto text-end row">
                                                    <a class="btn btn-link text-dark px-0 mb-0 col-4"
                                                        href="{{ route('enqueteSociale.edit', $item->id) }}"><i
                                                            class="fas fa-pencil-alt text-dark me-2"
                                                            aria-hidden="true"></i>تعديل</a>
                                                    <form id="deleteForm" onsubmit="return confirmDelete()" class="col-4"
                                                        action="{{ route('enqueteSociale.destroy', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-link text-danger text-gradient px-0 mb-0"
                                                            href="javascript:;"><i
                                                                class="far fa-trash-alt me-2"></i>حدف</button>
                                                    </form>
                                                    <script>
                                                        function confirmDelete() {
                                                            return confirm(
                                                                "Êtes-vous sûr de vouloir supprimer cette demande ?"); // Affiche une boîte de dialogue de confirmation
                                                        }
                                                    </script>
                                                    <a class="btn btn-link text-dark px-0 mb-0 col-4"
                                                        href="{{ route('enqueteSociale.show', $item->id) }}"><i
                                                            class="ni ni-tv-2 text-dark me-2" aria-hidden="true">
                                                        </i>اضهار</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $enqueteSociale->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
