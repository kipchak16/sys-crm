@extends("layouts.partials.master")
@section("content")
        <div class="insights">
            <div>
                <div class="deneme">
                    <div >
                        <a href="{{ route('Duty.create') }}" class="btn btn-success">Yeni Görev Ekle</a>
                    </div>


                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Marka/Görev</th>
                                <th scope="col">Görevlendiren</th>

                                <th scope="col">Teslim Tarihi</th>
                                <th scope="col">Kalan Gün</th>
                                <th scope="col">İş Durumu</th>
                                <th scope="col">Ç</th>
                                <th scope="col">S</th>
                                <th scope="col">K</th>
                                <th scope="col">M</th>
                                <th scope="col">A</th>

                                <th scope="col">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $dutys as $duty)
                                <tr class="deneme">
                                    <th scope="row">{{$duty->id}}</th>
                                    <td>
                                        <a href="{{route("Duty.view",$duty->id)}}"
                                           class="custom-list-option">
                                            <h5
                                                class="fw-bolder">{{$duty->name}}
                                            </h5>
                                        </a>
                                        <small>
                                            {{$duty->customer->name ?? "Müşteri Yok"}}
                                        </small>

                                    </td>
                                    <td><h5 class="fw-bolder">{{$duty->createdBy->name}} </h5></td>
                                    <td>
                                        <h7 class="fw-bolder">{{ \Carbon\Carbon::parse($duty->date)->format('d.m.Y') }} </h7>
                                        <br>
                                        <small>
                                            Kayıt {{ \Carbon\Carbon::parse($duty->CREATED_AT)->format('d.m.Y') }}
                                        </small>
                                    </td>
                                    <td>
                                        @php
                                            $kalanGun = round(\Carbon\Carbon::parse($duty->date)->diffInDays(now()->setTimezone('Europe/Istanbul'), false));
                                        @endphp

                                        @if($kalanGun < 0)
                                            <span class="text-danger">{{ $kalanGun }} gün</span>
                                        @else
                                            <span class="text-success">{{ $kalanGun }} gün</span>
                                        @endif
                                    </td>
                                    <td class="status-cell">
                                        {{$duty->status}}
                                    </td>

                                    <td>
                                        <input type="checkbox"
                                               class="form-check-input"
                                               data-id="{{ $duty->id }}"
                                               data-field="c"
                                            {{ $duty->c ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox"
                                               class="form-check-input"
                                               data-id="{{ $duty->id }}"
                                               data-field="s"
                                            {{ $duty->s ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox"
                                               class="form-check-input"
                                               data-id="{{ $duty->id }}"
                                               data-field="k"
                                            {{ $duty->k ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox"
                                               class="form-check-input"
                                               data-id="{{ $duty->id }}"
                                               data-field="m"
                                            {{ $duty->m ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox"
                                               class="form-check-input"
                                               data-id="{{ $duty->id }}"
                                               data-field="a"
                                            {{ $duty->a ? 'checked' : '' }}>
                                    </td>

                                    <td>
                                        <a href="{{route("Duty.edit",$duty->id)}}" class="btn btn-xs btn-success"
                                           data-toggle="tooltip" data-placement="top" title="Düzenle">
                                            <span class="fa fa-pencil"></span>
                                        </a>
                                        <a href="{{route("Duty.delete",$duty->id)}}" class="btn btn-xs btn-danger"
                                           data-toggle="tooltip" data-placement="top" title="Sil"
                                           onclick="return confirm('Emin misiniz?')">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section("scripts")
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.form-check-input').forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    fetch("{{ route('duty.updateCheckbox') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            id: this.dataset.id,
                            field: this.dataset.field,
                            checked: this.checked
                        })
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                if (this.checked) {
                                    showToast("Onay durumu güncellendi.", 'rgba(72, 187, 120, 0.95)'); // yeşil
                                } else {
                                    showToast("Onay durumu geri alındı.", 'rgba(220, 53, 69, 0.95)');  // kırmızı
                                }
                            } else {
                                alert("Güncelleme başarısız!");
                                this.checked = !this.checked;
                            }
                            const statusCell = this.closest('tr').querySelector('td.status-cell');
                            if (statusCell) {
                                statusCell.textContent = data.status;
                            }
                        })
                        .catch(error => {
                            console.error("İstek hatası:", error);
                            alert("Sunucuya ulaşırken hata oluştu.");
                            this.checked = !this.checked;
                        });
                });
            });
        });
    </script>

    <script>
        function showToast(message, bgColor = 'rgba(72, 187, 120, 0.95)') {
            const toast = document.getElementById('toast-message');
            toast.textContent = message;
            toast.style.backgroundColor = bgColor;
            toast.style.display = 'block';
            toast.style.opacity = '1';
            toast.style.transform = 'translate(-50%, 0)';

            setTimeout(() => {
                toast.style.transform = 'translate(-50%, 20px)';
            }, 50);
            // 2 saniye sonra yukarı kaydır ve yok et
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translate(-50%, 0)';

                setTimeout(() => {
                    toast.style.display = 'none';
                }, 500);
            }, 2050);
        }

    </script>

@endsection
