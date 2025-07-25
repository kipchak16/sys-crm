@extends("layouts.partials.master")
@section("content")

    <div id="navbar-top">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header">
                        {{ __('Müşteri Ekle') }}
                        <a href="{{route("customers.index")}}" class="btn btn-info">Müşteriler</a>
                    </div>

                    <div class="card-body">
                        <h1>Müşteri Düzenle</h1>
                        <form action='{{route('customers.update', $customer->id)}}' method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Müşteri Adı</label>
                                <input value="{{$customer->name}}" name="name" type="text" class="form-control" placeholder="Müşteri adı">
                            </div>
                            <div class="form-group">
                                <label for="">Önem Düzeyi</label>

                                <select name="price" type="text" class="form-select">
                                    <option VALUE="A" {{ $customer["price"] == 'A' ? 'selected' : '' }} >A</option>
                                    <option VALUE="B" {{ $customer["price"] == 'B' ? 'selected' : '' }} >B</option>
                                    <option VALUE="C" {{ $customer["price"] == 'C' ? 'selected' : '' }} >C</option>
                                    <option VALUE="D" {{ $customer["price"] == 'D' ? 'selected' : '' }} >D</option>
                                    <option VALUE="E" {{ $customer["price"] == 'E' ? 'selected' : '' }} >E</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Açıklama</label>
                                <input value="{{$customer->comments}}" name="comments" type="text" class="form-control" placeholder="Açıklama">
                            </div>
                            <button type="submit" class="btn btn-success mt-1">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
