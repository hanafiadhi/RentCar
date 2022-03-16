@component('mail::message')
{{-- <img src="{{asset('/webset/'.\App\website::get('Logo')->first()->Logo ?? '')}}" class="logo" alt="Ngeland Tour"> --}}

<h1 style="text-align: center">{{$data['title']}}</h1>
<h1 style="text-align: center"><u>{{"Invoice: ".$data['invoice']}}</u></h1>
<p style="text-align: center">{{$data['pesan']}}</p>
<p style="text-align: center">Silahkan klik tombol di bawah agar langsung di bawa ke web Ngeland Tour</p>

@component('mail::button', ['url' => $data['url']])
Ngeland Tour
@endcomponent

Thanks, Admin<br>
{{ config('app.name') }}
@endcomponent
