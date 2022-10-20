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
                                <li class="dropdown-item"><a class="dropdown-link tx-13 tx-gray-500" href="{{ route('collection_delete' , $collection->id) }}"><i class="icon-close mr-2"></i>Sil</a></li>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endsection
@section('footer')
@endsection
