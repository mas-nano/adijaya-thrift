@extends('layouts.main')
@section('content')
    <div class="wrapper">
        <div class="left">
            <div class="profil">
                <div>
                    <img src="img/uploads/profile_images/{{ (session('dataUser')['gambar']?session('dataUser')['gambar']:"phooo 1.png") }}" alt="">
                </div>
                <div>
                    <p class="nama-toko">{{ session('dataUser')['nama'] }}</p>
                    <p class="nama-pengguna">{{ '@'.session('dataUser')['username'] }}</p>
                    @for ($j = 1; $j <= 5; $j++)
                        <i class="{{ ($j<=$rating?"fas":"far") }} fa-star checked"></i>
                    @endfor
                </div>
            </div>
            <div class="pilihan">
                <div>
                    <a href="" class="atas terpilih">Edit Profil</a>
                    <a href="/riwayat" class="">Riwayat</a>
                    <a href="/penjualan" class="">Penjualan</a>
                    <a href="wishlist" class="">Wishlist</a>
                    <a href="/chat" class="bawah">Pesan</a>
                </div>
            </div>
            <div class="center">
                <p class="link"><a class="link" href="/toko/{{ session('dataUser')['id'] }}">Profil</a></p>
                <p><i class="fa fa-sign-out" aria-hidden="true"></i><a class="link" href="/logout"> Keluar</a></p>
            </div>
        </div>
        <div class="split"></div>
        <div class="right">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex-center">
                    <img src="img/uploads/profile_images/{{ (session('dataUser')['gambar']?session('dataUser')['gambar']:"phooo 1.png") }}" alt="" class="foto-profil">
                    <button class="btn-foto" type="button">Unggah Foto</button>
                    <input type="text" id="file-name" disabled class="input-hidden">
                    <input type="file" name="photo" id="foto" style="display: none;">
                </div>
                <hr>
                <div class="width-45">
                    @if (isset($gambar))
                        <p class="warn">{{ $gambar }}</p>
                    @endif
                    @if (isset($message))
                        @foreach ($message as $item)
                            @foreach ($item as $msg)
                            <div class="warn">
                                <p class="center">{{ $msg }}</p>
                            </div>
                            
                            @endforeach
                        @endforeach
                    @endif
                    <label for="nama" class="block">Nama</label>
                    <input type="text" id="nama" class="block input" name="name" value="{{ (isset($data[0]['name'])?$data[0]['name']:"") }}">
                    <label for="username" class="block">Nama Pengguna</label>
                    <input type="text" id="username" class="block input" name="username" value="{{ (isset($data[0]['username'])?$data[0]['username']:"") }}">
                    <label for="email" class="block">Email</label>
                    <input type="email" id="email" class="block input" name="email" value="{{ (isset($data[0]['email'])?$data[0]['email']:"") }}">
                    <label for="password" class="block">Kata Sandi</label>
                    <input type="password" id="password" class="block input" name="password">
                    <label for="ponsel" class="block">Ponsel</label>
                    <input type="text" id="ponsel" class="block input" name="tel" value="{{ (isset($data[0]['tel'])?$data[0]['tel']:"") }}">
                    <label for="bank" class="block">Bank</label>
                    <input type="text" name="bank" id="bank" class="block input" name="bank" value="{{ (isset($data[0]['bank'])?$data[0]['bank']:"") }}">
                    <label for="rekening" class="block">Nomor Rekening</label>
                    <input type="text" id="rekening" class="block input" name="rek" value="{{ (isset($data[0]['rek'])?$data[0]['rek']:"") }}">
                    <label for="pemilik" class="block">Nama Lengkap Pemilik</label>
                    <input type="text" id="pemilik" class="block input" name="rekowner" value="{{ (isset($data[0]['rekowner'])?$data[0]['rekowner']:"") }}">
                    <label for="alamat" class="block">Alamat</label>
                    <input type="text" id="alamat" class="block input" name="alamat" value="{{ (isset($data[0]['alamat'])?$data[0]['alamat']:"") }}">
                    <label for="provinsi" class="block">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="block" name="provinsi">
                        <option value="">Pilih Provinsi</option>
                        @for ($i = 0; $i < count($prov['provinsi']); $i++)
                        <option value="{{ $prov['provinsi'][$i]['nama'] }}" id="{{ $prov['provinsi'][$i]['id'] }}" {{ (isset($data[0]['provinsi'])&&$data[0]['provinsi']==$prov['provinsi'][$i]['nama']?'selected':'') }}>{{ $prov['provinsi'][$i]['nama'] }}</option>
                        @endfor
                    </select>
                    <label for="kota" class="block">Kota</label>
                    <select name="kota" id="kota" class="block" name="kota">
                        <option value="{{ (isset($data[0]['kota'])?$data[0]['kota']:"") }}">{{ (isset($data[0]['kota'])?$data[0]['kota']:"Pilih Kota") }}</option>
                    </select>
                    <input type="hidden" name="lat" id="lat" value="{{ (isset($data[0]['lat'])?$data[0]['lat']:"") }}">
                    <input type="hidden" name="lng" id="lng" value="{{ (isset($data[0]['lng'])?$data[0]['lng']:"") }}">
                    <label for="" class="block">Maps</label>
                        <div id="maps">
    
                        </div>
                </div>
                <button type="submit" class="btn-simpan">Simpan</button>
            </form>
        </div>
    </div>
    <script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDMzbOwUZw-S8v7KzKj-d3-atmdr4nncE&callback=initMap&v=weekly"
async
></script>
    <script src="js/edit-akun.js"></script>
@endsection