@extends("layouts.partials.master")
@section("content")



<div class="container" id="top_newblade">
    @include("layouts.partials.alert")
    <div class="header-container">
        <h4 class="font-weight-bold">Yeni Görev Ekle</h4>
        <a href="{{route("Duty.MyDutys")}}"class="btn btn-secondary float-end font-weight-bold " > <i class="fa fa-arrow-left"></i>  Ana Sayfa</a>
    </div>
    <hr style="border: 1px solid white;">

    @include("layouts.partials.errors")

    <form action="{{route("Duty.store")}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="form-group {{$errors->has("name") ? "has-error" : "" }}">
            <label for="task-name">Görev Adı</label>
            <input type="text" id="task-name" name="name" value="{{old("name",$entry->name)}}" required placeholder="Görev adını girin...">
            @if($errors->has("name"))
                <span class="help-block">
                    <strong>{{$erorrs->first("name")}}</strong>
                </span>
            @endif
        </div>
        <label for="task-desc">Açıklama</label>
        <textarea id="task-desc" name="comment" placeholder="Görev açıklaması yazın..." required value="{{old("name",$entry->comment)}}"></textarea>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Teslim Tarihi</label>
                <input required type="date" name="date" value="{{old("name",$entry->date)}}" class="form-control">
            </div>
            <div class="col-md-6 form-group {{$errors->has("name") ? "has-error" : "" }}">
                <label>Görevli Kullanıcı</label>
                <select required name="user_id" class="form-select " id="inlineFormCustomSelect">
                    <option disabled>Seçiniz</option>
                    @foreach($users as $pick)
                        <option value="{{ $pick->id }}" {{ $entry->user_id == $pick->id ? 'selected' : '' }}>
                            {{ $pick->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has("user_id"))
                    <span class="help-block">
                    <strong>{{$errors->first("user_id")}}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Marka</label>
                <select required class="form-select " name="customer_id" id="inlineFormCustomSelect">
                    @foreach($customers as $pick)
                    <option value= "{{ $pick->id }}" {{ $entry->customer_id == $pick->id ? 'selected' : '' }}>{{$pick->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>Kategori</label>
                <select required class="form-select " name="category_id" id="inlineFormCustomSelect">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$entry->category_id == $category->id ? "selected" : ""}} >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Önem Düzeyi</label>
                <select  class="form-select " name="value" id="inlineFormCustomSelect">
                    @foreach(config("task.priorities") as $key => $text)
                        <option value="{{$key}}" {{old("value",$entry->value ?? "" ) == $key ? "selected" : ""}}>
                            {{$text}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>İş Puanı</label>
                <select class="form-select " name="point" id="inlineFormCustomSelect">
                    @foreach(config("task.points") as $key => $text)
                        <option value="{{$key}}" {{old("point",$entry->point ?? "" ) == $key ? "selected" : ""}}>
                            {{$text}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <label>Resim Yükle:</label>
        <div>
            <input type="file" name="image[]" class="dropzone" id="my-awesome-dropzone" multiple accept="image/*">
        </div>

        <label>Belge Yükle:</label>
        <div>
            <input type="file" name="document[]" class="dropzone" id="my-awesome-dropzone"  multiple accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt">
        </div>


        <button type="submit" class="btn btn-success float-end">
            {{@$entry->id>0 ? "Güncelle" : "Kaydet"}}
        </button>
        @if(isset($entry->id))
            <input type="hidden" name="id" value="{{ $entry->id }}">
        @endif
    </form>

</div>








@endsection


