@extends('layouts.public') <!-- opcional, se quiser herdar o básico -->

@section('content')
<div class="flex">
    <aside class="w-1/4">
        <!-- Menu do cliente: pedidos, favoritos, etc -->
    </aside>

    <section class="w-3/4">
        @yield('profile-content')
    </section>
</div>
@endsection