@extends('layouts.master')
@section('title', 'Koleksiyonlar')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Koleksiyonlar</h2>
            @include('layouts.partials.alert')
            <table class="table table-bordererd table-hover">
                    <tr>
                        <th colspan="2">Koleksiyonum</th>
                        <th>sil</th>
                        <th>
                            <form action="{{route('collection_add')}}" method="post">
                                {{ csrf_field() }}
                                <input type="text" name="collection_name" required>
                                <button type="submit" class="btn btn-success">
                                    Ekle
                                </button>
                            </form>
                        </th>
                    </tr>
                    @foreach($favorite_collections as $collection)
                        <tr>
                            <td>
                                <a href="{{ route('collection_product', $collection->slug) }}">
                                    <p>{{ $collection->collection_name }}
                                    </p>
                                </a>
                            </td>
                            <td>



                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Sil
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Koleksiyon Sil!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <li class="dropdown-item">Bu Koleksiyonu silmek istediğinize emin misiniz?</li>
                                            </div>

                                            <div class="modal-footer">
                                                <a class="dropdown-link tx-13 tx-gray-500" href="{{ route('collection_delete' , $collection->id) }}">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Sil</button></a>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
            </table>

        </div>
    </div>
@endsection
@section('footer')
@endsection
