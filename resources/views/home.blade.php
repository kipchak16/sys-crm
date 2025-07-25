@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('HOŞGELDİNİZ') }}
                    <div>
                        <a href="{{route("customers.index")}}" class="btn btn-info" >Müşteriler</a>
                        <a href="{{route("customers.store")}}" class="btn btn-info" style="margin-left: 15px">Müşteri Ekle</a>
                        <a href="{{route("accounts.List")}}" class="btn btn-info" style="margin-left: 15px">Hesaplar</a>
                        <a href="{{route("Duty.create")}}" class="btn btn-info" style="margin-left: 15px">Yeni Görev</a>
                        <a href="{{route("Duty.MyDutys")}}" class="btn btn-info" style="margin-left: 15px">Görevlerim</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

