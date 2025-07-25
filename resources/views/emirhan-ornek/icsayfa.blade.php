@extends('emirhan-ornek.kapsayici')
@section('icerik')
    <div class="container">
        <div class="header-container">
            <h4 class="font-weight-bold">Yeni Görev Ekle</h4>
            <a href="{{ route("home")}}"class="btn btn-secondary float-end font-weight-bold " > <i class="fa fa-arrow-left"></i>  Ana Sayfa</a>
        </div>
        <hr style="border: 1px solid white;">

        <form action="">
            <label for="task-name">Görev Adı</label>
            <input type="text" id="task-name" name="name" placeholder="Görev adını girin...">

            <label for="task-desc">Açıklama</label>
            <textarea id="task-desc" name="comment" placeholder="Görev açıklaması yazın..."></textarea>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Teslim Tarihi</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Görevli Kullanıcı</label>
                    <select name="user_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected></option>
                        @foreach($users as $pick)
                            <option value="{{$pick->id}}">{{$pick->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Marka</label>
                    <select class="custom-select mr-sm-2" name="customer_id" id="inlineFormCustomSelect">
                        <option selected></option>
                        @foreach($customers as $pick)
                            <option value= "{{$pick->id}}" >{{$pick->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Kategori</label>
                    <select class="custom-select mr-sm-2" name="category" id="inlineFormCustomSelect">
                        <option selected></option>
                        <option value="1">Web Site İçerik Girişi</option>
                        <option value="2">SEO Raporu</option>
                        <option value="3">e-Ticaret</option>
                        <option value="3">Kurumsal Kimlik Çalışması</option>
                        <option value="3">Reklam Çalışması</option>
                        <option value="3">Aylık Sosyal Medya Planı Hazırlama</option>
                        <option value="3">Sosyal Medya Özel İşler</option>
                        <option value="3">Aylık Sosyal Medya Akışı Planlama</option>
                        <option value="3">Sosyal Medya Raporu Hazırlama</option>
                        <option value="3">Toplantı ( 1 Saat )</option>
                        <option value="3">Dijital Pazarlama Özel İşler ( Puan Değişecek )</option>
                        <option value="3">Tablo Güncellemeleri ( Data - Harcama - Sipariş )</option>
                        <option value="3">E-Ticaret Platform Güncellemeleri</option>
                        <option value="3">Reklam Raporu Hazırlama</option>
                        <option value="3">İçerik Stratejisi Geliştirme</option>
                        <option value="3">Günlük Reklam Analizi ve Güncellemeleri ( 1 Marka )</option>
                        <option value="3">E-Posta Pazarlama Kampanyası Oluşturma</option>
                        <option value="3">Facebook/Instagram Reklam Kampanya Kurulumu ve Yönetimi ( 1 Adet )</option>
                        <option value="3">Google Ads Kampanya Kurulumu ve Yönetimi ( 1 Adet )</option>
                        <option value="3">Anahtar Kelime Araştırması</option>
                        <option value="3">Prodüksiyon Özel İşler ( Puan Değişecek )</option>
                        <option value="3">Kısa Video Üretimi</option>
                        <option value="3">Motion Video ( 60 Sn ) ( Puan Değişecek )</option>
                        <option value="3">Kurgu Video ( 30 - 60 Sn )</option>
                        <option value="3">Özel Tasarımlar ( Puan Değişecek )</option>
                        <option value="3">Fotoğraf - Video Çekim ( 1 Saat )</option>
                        <option value="3">Billboard Tasarımı</option>
                        <option value="3">Poster - Afiş Tasarımı</option>
                        <option value="3">Banner</option>
                        <option value="3">Statik Story</option>
                        <option value="3">Hareketli Post</option>
                        <option value="3">Hareketli Story</option>
                        <option value="3">Statik Post</option>
                        <option value="3">Kurumsal Web Site</option>
                        <option value="3">CRM Projeler</option>
                        <option value="3">B2B Web Siteleri</option>
                        <option value="3">Reel Videoları</option>


                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Önem Düzeyi</label>
                    <select class="custom-select mr-sm-2" name="value" id="inlineFormCustomSelect">
                        <option selected></option>
                        <option>Orta</option>
                        <option>Önemli</option>
                        <option>Çok Önemli</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>İş Puanı</label>
                    <select class="custom-select mr-sm-2" name="point" id="inlineFormCustomSelect">
                        <option selected></option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-end font-weight-bold">Ekle</button>
        </form>

    </div>
@endsection
