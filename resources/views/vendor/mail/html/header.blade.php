<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
    <img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="{{ $slot }}">
{{-- @if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif --}}
</a>
</td>
</tr>
