@section('title', 'dashboard')
@section('breadcrumbs')
<!-- breadcrumbs-start -->
<div class="section-header">
    <h1>Dashboard</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Rekap Data</a></div>
    </div>
</div>
<!-- breadcrumbs-end -->
@endsection

<div class="col-lg-12">
    <livewire:rekap-data-index />
</div>