@extends("layouts.master")
@section("content")

    <div id="navbar-top" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Hesap Ekle') }}
                        <a href="{{route("accounts.List")}}" class="btn btn-info">Hesaplar</a>
                    </div>

                    <div class="card-body">
                        <h1>Hesap Ekle</h1>
                        <form action='{{route('accounts.Name')}}' method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Hesap Adı</label>
                                <input name="account_name" type="text" class="form-control">
                                <label for="">Nickname</label>
                                <input name="account_nickname" type="text" class="form-control">
                                <label for="">password</label>
                                <input name="password" type="password" class="form-control">

                                <label for="">Ait Olduğu Müşteri</label>
                                <select name="user_id" id="pick" class="form-select">
                                    @foreach ($customer as $pick  )
                                        <option value="{{ $pick->id}}">{{ $pick->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Açıklama</label>
                                <input name="comment" type="text" class="form-control" placeholder="Açıklama">
                            </div>
                            <button type="submit" class="btn btn-success mt-1">Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
