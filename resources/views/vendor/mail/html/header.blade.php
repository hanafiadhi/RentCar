<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('/webset/'.\App\website::get('Logo')->first()->Logo ?? '')}}" class="logo" alt="Ngeland Tour">
@else
<img src="{{asset('/webset/'.\App\website::get('Logo')->first()->Logo ?? '')}}" class="logo" alt="Ngeland Tour">
{{ $slot }}
@endif
</a>
</td>
</tr>
