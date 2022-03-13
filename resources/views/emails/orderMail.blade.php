@component('mail::message')
<h1 style="text-align: center">{{$data['title']}}</h1>

<p style="text-align: center">Hai Admin, Ada yang Mau rental Mobil</p>
<p style="text-align: center">Silahkan klik tombol di bawah agar langsung di bawa ke web Anda</p>

@component('mail::button', ['url' => $data['url']])
Cek pesanan
@endcomponent

@endcomponent
