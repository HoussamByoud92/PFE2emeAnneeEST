@extends('Demande.source')

@section('content')
    <br>
    <div class="d-flex justify-content-between">
        <a href="{{ route('demande.create') }}" class="btn btn-sm btn-dark mx-auto mb-0 d-none d-lg-block"><i
                class="fas fa-plus"></i>&nbsp;&nbsp;اضافة طلب</a>
    </div>
    <br>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>جدول الطلبات</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            الاسم الكامل للولي</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            الاسم الكامل للطفل
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            تاريخ الطلب</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            مكان الطلب</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ">
                                            اكشن</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            قرار</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($demande as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div
                                                        class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                                                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->nom_prenom }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $item->CIN }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->nom_prenom_enfant }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $item->date_demande }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->lieu_demande }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="ml-auto text-end row">
                                                    <a class="btn btn-link text-dark px-0 mb-0 col-4"
                                                        href="{{ route('demande.edit', $item->id) }}"><i
                                                            class="fas fa-pencil-alt text-dark me-2"
                                                            aria-hidden="true"></i></a>
                                                    <form id="deleteForm" onsubmit="return confirmDelete()" class="col-4"
                                                        action="{{ route('demande.destroy', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-link text-danger text-gradient px-0 mb-0"
                                                            href="javascript:;"><i
                                                                class="far fa-trash-alt me-2"></i></button>
                                                    </form>
                                                    <script>
                                                        function confirmDelete() {
                                                            return confirm(
                                                                "Êtes-vous sûr de vouloir supprimer cette demande ?"); // Affiche une boîte de dialogue de confirmation
                                                        }
                                                    </script>
                                                    <a class="btn btn-link text-dark px-0 mb-0 col-4"
                                                        href="{{ route('demande.show', $item->id) }}"><i
                                                            class="fa fa-eye text-dark me-2" aria-hidden="true">
                                                        </i></a>
                                                </div>
                                            </td>
                                            @empty($item->etat)
                                                <td class="align-middle">
                                                    <div class="ml-auto text-center row">
                                                        <div class="col-3"></div>
                                                        <form class="col-3"
                                                            action="{{ route('accepter', ['id' => $item->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                            <button type="submit"
                                                                class="btn btn-link text-info text-gradient px-0 mb-0">
                                                                <i class="fas fa-check me-2"></i>
                                                            </button>
                                                        </form>
                                                        <form class="col-3"
                                                            action="{{ route('refuser', ['id' => $item->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                            <button type="submit"
                                                                class="btn btn-link text-danger text-gradient px-0 mb-0">
                                                                <i class="fas fa-times me-2"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @elseif ($item->etat === 'refuser')
                                                <td class="text-center">
                                                    <p class="text-danger text-gradient">Refuser</p>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <p class="text-info text-gradient">Accepter</p>
                                                </td>
                                            @endempty
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $demande->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
