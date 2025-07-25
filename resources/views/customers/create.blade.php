@extends("layouts.partials.master")
@section("content")
    <div id="navbar-top">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Müşteri Ekle') }}
                        <a href="{{route("customers.index")}}" class="btn btn-info">Müşteriler</a>
                    </div>

                    <div class="card-body">
                        <h1>Müşteri Ekle</h1>
                        <form action='{{route('customers.store')}}' method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Müşteri Adı</label>
                                <input required name="name" type="text" class="form-control" placeholder="Müşteri adı">
                            </div>
                            <div class="form-group">
                                <label for="">Önem Düzeyi</label>
                                <select name="price" type="text" class="form-select">
                                    <option VALUE="A">A</option>
                                    <option VALUE="B">B</option>
                                    <option VALUE="C">C</option>
                                    <option VALUE="D">D</option>
                                    <option VALUE="E">E</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Açıklama</label>
                                <input name="comments" type="text" class="form-control" placeholder="Açıklama">
                            </div>
                            <button type="submit" class="btn btn-success mt-1">Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
