<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('assets/img/peekaboo/peekaboo_logo.png') }}" class="logo" alt="Peekaboo Daycare">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
