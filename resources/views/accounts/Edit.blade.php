@extends("layouts.master")
@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Hesap Düzenle') }}
                        <a href="{{route("accounts.List")}}" class="btn btn-info">Hesaplar</a>
                    </div>

                    <div class="card-body">
                        <h1>Müşteri Düzenle</h1>
                        <form action='{{route('accounts.Update', $accounts->id)}}' method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Hesap Adı</label>
                                <input value="{{$accounts->account_name}}" name="account_name" type="text" class="form-control">
                                <label for="">Nickname</label>
                                <input value="{{$accounts->account_nickname}}" name="account_nickname" type="text" class="form-control">
                                <label for="">Password</label>
                                <input value="{{$accounts->password}}" name="password" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Ait Olduğu Müşteri</label>
                                <select name="user_id" type="text" class="form-select">
                                    @foreach ($customer as $pick  )
                                        <option value="{{ $pick->id}}" {{$accounts->user_id == $pick->id ? "selected" : ""}}>{{ $pick->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Açıklama</label>
                                <input value="{{$accounts->comment}}" name="comment" type="text" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success mt-1">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
