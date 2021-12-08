@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        @if (isset($pengeluaran))
        <p class="montserrat fs-30 ta-c fw-600">Informasi pencairan dana</p>
        @else
        <p class="montserrat fs-30 ta-c fw-600">Tambah pencairan dana</p>
        @endif
        <div class="box pd-h-5">
            <form action="" method="post" class="wp-50 center">
                @csrf
                <label for="nominal" class="block montserrat fs-16 fw-600 mg-t-3">Nominal pencairan</label>
                <input type="text" name="nominal" id="nominal" class="block input bg-grey montserrat fs-16 fw-600" value="{{ (isset($pengeluaran)?'Rp'.number_format($pengeluaran->nominal, 0, ',', '.'):"") }}" {{ (isset($pengeluaran)?"disabled":"") }}>
                <label for="bank" class="block montserrat fs-16 fw-600 mg-t-3">Bank</label>
                <input type="text" name="bank" id="bank" class="block input bg-grey montserrat fs-16 fw-600" value="{{ (isset($pengeluaran)?$pengeluaran->bank:"") }}" {{ (isset($pengeluaran)?"disabled":"") }}>
                <label for="rek" class="block montserrat fs-16 fw-600 mg-t-3">Rekening</label>
                <input type="text" name="rek" id="rek" class="block input bg-grey montserrat fs-16 fw-600" value="{{ (isset($pengeluaran)?$pengeluaran->rek:"") }}" {{ (isset($pengeluaran)?"disabled":"") }}>
                <label for="ket" class="block montserrat fs-16 fw-600 mg-t-3">Keterangan</label>
                <textarea name="ket" id="ket" cols="47" rows="10" class="block br-18 bg-grey montserrat fs-16 fw-600 pd-3" {{ (isset($pengeluaran)?"disabled":"") }}>{{ (isset($pengeluaran)?$pengeluaran->ket:"") }}</textarea>
                @if (!isset($pengeluaran))
                <button type="submit" class="btn bg-orange mg-ha-v-3 block mg-t-3 pointer montserrat fs-24 fw-600">Tambah</button>
                @endif
            </form>
            @if (isset($data))
                @foreach ($data as $item)
                    @foreach ($item as $msg)
                        <p class="ta-c montserrat red">{{ $msg }}</p>
                    @endforeach
                @endforeach
            @endif
        </div>
    </div>
@endsection