@if(session()->has('message'))
    <div class="p-4 border-green-900 bg-green-500 text-white mb-8 rounded">
    <h3>{{session('message')}}</h3>
    </div>
@endif
