
@if (session()->has('created'))

<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
   <span class="font-medium">  {{ session('created') }}</span>
</div>

@endif



@if (session()->has('updated'))

<div class="p-4 mb-4 text-sm text-cyan-600-700 bg-cyan-100 rounded-lg" role="alert">
   <span class="font-medium">  {{ session('updated') }}</span>
</div>

@endif
