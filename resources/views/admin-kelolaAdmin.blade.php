@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        @if ($aksi=='tambah-user')
        <p class="montserrat fs-30 ta-c fw-600">Tambah Data Pengguna</p>
        @elseif ($aksi=='ubah-user')
        <p class="montserrat fs-30 ta-c fw-600">Ubah Data Pengguna</p>
        @elseif ($aksi=='tambah-admin')
        <p class="montserrat fs-30 ta-c fw-600">Tambah Data Admin</p>
        @else
        <p class="montserrat fs-30 ta-c fw-600">Ubah Data Admin</p>
        @endif
        <div class="box pd-h-5">
            <form action="" method="post" class="wp-50 center" enctype="multipart/form-data">
                @csrf
                @if ($aksi=='ubah-user')
                <div class="flex ai-c">
                    <img src="{{ app('firebase.storage')->getBucket()->object("img/profil/".$user->photo)->signedUrl(new \DateTime('tomorrow')) }}" alt="" class="img">
                    <button class="btn-foto mg-l-3 pointer bg-white" type="button">Unggah Foto</button>
                    <input type="text" id="file-name" disabled class="bg-white b-0">
                    <input type="file" name="photo" id="foto" style="display: none;">
                </div>
                <hr>
                @endif
                @if ($aksi=='tambah-user')    
                <label for="nama" class="block montserrat fs-16 fw-600 mg-t-3">Nama</label>
                <input type="text" name="name" id="nama" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="tel" class="block montserrat fs-16 fw-600 mg-t-3">Nomor Ponsel</label>
                <input type="text" name="tel" id="tel" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="username" class="block montserrat fs-16 fw-600 mg-t-3">Nama Penguna</label>
                <input type="text" name="username" id="username" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="email" class="block montserrat fs-16 fw-600 mg-t-3">Email</label>
                <input type="email" name="email" id="email" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="password" class="block montserrat fs-16 fw-600 mg-t-3">Kata Sandi</label>
                <input type="password" name="password" id="password" class="block input bg-grey montserrat fs-16 fw-600">
                @endif
                @if ($aksi=='ubah-user')
                <label for="nama" class="block montserrat fs-16 fw-600 mg-t-3">Nama</label>
                <input type="text" name="name" id="nama" class="block input bg-grey montserrat fs-16 fw-600" value="{{ $user->name }}">
                <label for="username" class="block montserrat fs-16 fw-600 mg-t-3">Nama Penguna</label>
                <input type="text" name="username" id="username" class="block input bg-grey montserrat fs-16 fw-600" value="{{ $user->username }}">
                <label for="email" class="block montserrat fs-16 fw-600 mg-t-3">Email</label>
                <input type="email" name="email" id="email" class="block input bg-grey montserrat fs-16 fw-600" value="{{ $user->email }}">
                <label for="password" class="block montserrat fs-16 fw-600 mg-t-3">Kata Sandi</label>
                <input type="password" name="password" id="password" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="tel" class="block montserrat fs-16 fw-600 mg-t-3">Ponsel</label>
                <input type="text" name="tel" id="tel" class="block input bg-grey montserrat fs-16 fw-600" value="{{ $user->tel }}">
                <label for="bank" class="block montserrat fs-16 fw-600 mg-t-3">Bank</label>
                <input type="text" name="bank" id="bank" class="block input bg-grey montserrat fs-16 fw-600" value="{{ $user->bank }}">
                <label for="rek" class="block montserrat fs-16 fw-600 mg-t-3">Nomor Rekening</label>
                <input type="text" name="rek" id="rek" class="block input bg-grey montserrat fs-16 fw-600" value="{{ $user->rek }}">
                <label for="pemilik" class="block montserrat fs-16 fw-600 mg-t-3">Nama Lengkap Pemilik</label>
                <input type="text" name="rekowner" id="pemilik" class="block input bg-grey montserrat fs-16 fw-600" value="{{ $user->rekowner }}">
                <label for="alamat" class="block montserrat fs-16 fw-600 mg-t-3">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="block input bg-grey montserrat fs-16 fw-600" value="{{ $user->alamat }}">
                <label for="provinsi" class="block montserrat fs-16 fw-600 mg-t-3">Provinsi</label>
                <select name="provinsi" id="provinsi" class="block input montserrat wp-97 fs-16 fw-600 mg-t-3">
                    <option value="">Pilih Provinsi</option>
                    @for ($i = 0; $i < count($prov); $i++)
                    <option value="{{ $prov[$i]['name'] }}" id="{{ $prov[$i]['id'] }}" {{ (isset($user->provinsi)&&$user->provinsi==$prov[$i]['name']?'selected':'') }}>{{ $prov[$i]['name'] }}</option>
                    @endfor
                </select>
                <label for="kota" class="block montserrat fs-16 fw-600 mg-t-3">Kota/Kabupaten</label>
                <select name="kota" id="kota" class="block input montserrat wp-97 fs-16 fw-600 mg-t-3">
                    <option value="{{ (isset($user->kota)?$user->kota:"") }}">{{ (isset($user->kota)?$user->kota:"Pilih Kota") }}</option>
                </select>
                <label for="" class="block montserrat fs-16 fw-600 mg-t-3">Maps</label>
                <input type="hidden" name="lng" id="lng" value="{{ $user->lng }}">
                <input type="hidden" name="lat" id="lat" value="{{ $user->lat }}">
                <div id="maps" class="wp-100 h-300"></div>
                @endif
                @if ($aksi=='ubah-admin')
                <label for="nama" class="block montserrat fs-16 fw-600 mg-t-3">Nama</label>
                <input type="text" name="nama" id="nama" class="block input bg-grey montserrat fs-16 fw-600" value="{{ $admin->nama }}">
                <label for="idAdmin" class="block montserrat fs-16 fw-600 mg-t-3">ID Admin</label>
                <input type="text" name="id_admin" id="idAdmin" class="block input bg-grey montserrat fs-16 fw-600" value="{{ $admin->id_admin }}">
                <label for="email" class="block montserrat fs-16 fw-600 mg-t-3">Email</label>
                <input type="email" name="email" id="email" class="block input bg-grey montserrat fs-16 fw-600" value="{{ $admin->email }}">
                <label for="password" class="block montserrat fs-16 fw-600 mg-t-3">Kata Sandi</label>
                <input type="password" name="password" id="password" class="block input bg-grey montserrat fs-16 fw-600">
                @endif
                @if ($aksi=='tambah-admin')
                <label for="nama" class="block montserrat fs-16 fw-600 mg-t-3">Nama</label>
                <input type="text" name="nama" id="nama" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="idAdmin" class="block montserrat fs-16 fw-600 mg-t-3">ID Admin</label>
                <input type="text" name="id_admin" id="idAdmin" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="username" class="block montserrat fs-16 fw-600 mg-t-3">Username</label>
                <input type="text" name="username" id="username" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="email" class="block montserrat fs-16 fw-600 mg-t-3">Email</label>
                <input type="email" name="email" id="email" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="password" class="block montserrat fs-16 fw-600 mg-t-3">Kata Sandi</label>
                <input type="password" name="password" id="password" class="block input bg-grey montserrat fs-16 fw-600">
                @endif
                @if ($aksi=='tambah-admin'||$aksi=='tambah-user')
                <button type="submit" class="block mg-ha-v-3 btn bg-orange montserrat fs-16 fw-600 pointer">Tambah</button>
                @else
                <button type="submit" class="block mg-ha-v-3 btn bg-orange montserrat fs-16 fw-600 pointer">Simpan</button>
                @endif
                @if (isset($data))
                    @foreach ($data as $item)
                        @foreach ($item as $msg)
                            <p class="ta-c montserrat red">{{ $msg }}</p>
                        @endforeach
                    @endforeach
                @endif
                @if (isset($gambar))
                <p class="ta-c montserrat red">{{ $gambar }}</p>
                @endif
            </form>
        </div>
    </div>
    @if ($aksi=='ubah-user')    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDMzbOwUZw-S8v7KzKj-d3-atmdr4nncE&callback=initMap&v=weekly"
    async></script>
    <script src="{{ asset('js/edit-akun.js') }}"></script>
    @endif
@endsection