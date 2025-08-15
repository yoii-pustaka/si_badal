@if(auth()->user()->hasRole('admin'))
    <script>window.location = "{{ route('admin.orders.index') }}";</script>
@elseif(auth()->user()->hasRole('user'))
    <script>window.location = "{{ route('orders.index') }}";</script>
@elseif(auth()->user()->hasRole('pelaksana'))
    <script>window.location = "{{ route('pelaksana.orders.index') }}";</script>
@endif
