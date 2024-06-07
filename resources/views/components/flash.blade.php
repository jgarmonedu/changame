
@if(session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="alert border-t-4 rounded-b-lg shadow-md alert-success alert-dismissible fade show" role="alert">
        <i class="fa-regular fa-circle-check fa-xl p-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('error'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="alert border-t-4 rounded-b-lg shadow-md alert-danger alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-exclamation fa-xl p-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@if (session()->has('warning'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="alert border-t-4 rounded-b-lg shadow-md alert-warning alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-triangle-exclamation fa-xl p-2"></i>
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

