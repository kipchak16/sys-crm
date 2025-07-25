@extends("layouts.partials.master")
@section("content")


    <div id="navbar-top" class="container" style="margin-top: 60px;">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="fw-bold mb-0">
                                {{ $dutyview->name }} - Görev Detayı
                            </h4>
                            <div>
                                <a href="{{ route('Duty.edit', $dutyview->id) }}" class="btn btn-warning btn-sm me-2">
                                    <i class="fa fa-pencil"></i> Görevi Düzenle
                                </a>
                                <a href="{{ route('Duty.MyDutys') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-arrow-left"></i> Geri Dön
                                </a>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <div class="col-md-2 fw-bold">Adı:</div>
                            <div class="col-md-10">{{ $dutyview->name }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 fw-bold">Açıklama:</div>
                            <div class="col-md-10">{!! nl2br(e($dutyview->comment)) !!}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 fw-bold">Teslim Tarihi:</div>
                            <div class="col-md-10">{{ $dutyview->date }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 fw-bold">Durum:</div>
                            <div class="col-md-10">{{ $dutyview->status }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 fw-bold">Önem Düzeyi:</div>
                            <div class="col-md-10">{{ $dutyview->value }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 fw-bold">İş Puanı:</div>
                            <div class="col-md-10">{{ $dutyview->point }}</div>
                        </div>

                        <div>
                            <h4 class="fw-bold">Medya Dosyaları</h4>
                            @if($dutyview->getFirstMediaUrl('duty_img', 'thumb'))
                                @foreach($dutyview->getMedia('duty_img') as $media)
                                    <!--<p>{{ $media->getUrl() }}</p>-->
                                    <img class="row mb-2" src="{{ $media->getUrl() }}" alt="Görev Resmi" style="max-height: 200px;">
                                @endforeach
                            @endif
                        </div>
                        <div>
                            <h4 class="fw-bold">Belgeler</h4>
                            @if($dutyview->getFirstMediaUrl('duty_docs', 'thumb'))
                                @foreach($dutyview->getMedia('duty_docs') as $media)
                                    <a href="{{ $media->getUrl() }}" class="btn btn-secondary btn-sm col-md-4">
                                        <i class="btn-info"></i> "{{ $media->file_name }}"
                                    </a>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
























@endsection
