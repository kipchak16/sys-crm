
@extends("layouts.partials.master")
@section("content")

    <div id="navbar-top" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Accounts') }}
                        <a href="{{route("accounts.Create")}}" class="btn btn-info">Hesap Ekle</a>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Hesap Adı</th>
                                <th scope="col">Nickname</th>
                                <th scope="col">Şifre</th>
                                <th scope="col">Müşteri ID</th>
                                <th scope="col">Açıklama</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <th scope="row">{{$account->id}}</th>
                                    <td>{{$account->account_name}}</td>
                                    <td>{{$account->account_nickname}}</td>
                                    <td>{{$account->password}}</td>
                                    <td>{{$account->customer->name}}</td>
                                    <td>{{$account->comment}}</td>
                                    <td><a href="{{route("accounts.Edit",$account->id)}}" class="btn btn-info">Düzenle</a></td>
                                    <td><a href="{{route("accounts.Delete",$account->id)}}" class="btn btn-danger">Sil</a></td>
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
