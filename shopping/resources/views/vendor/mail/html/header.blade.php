<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/2x/external-shopping-cart-technology-ecommerce-flaticons-lineal-color-flat-icons.png" class="logo rounded-full" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
