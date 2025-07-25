@extends("layouts.partials.master")
@section("content")
    <div id="navbar-top" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('customer') }}
                        <a href="{{ route("customers.create") }}" class="btn btn-info">Müşteri Ekle</a>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Müşteri Adı</th>
                                <th scope="col">Önem Düzeyi</th>
                                <th scope="col">Açıklama</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <th scope="row">{{ $customer->id }}</th>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->price }}</td>
                                    <td>{{ $customer->comments }}</td>
                                    <td><a href="{{ route("customers.edit",$customer->id) }}"
                                           class="btn btn-info">Düzenle</a></td>
                                    <td><a href="{{ route("customers.delete",$customer->id) }}"
                                           class="btn btn-danger">Sil</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
