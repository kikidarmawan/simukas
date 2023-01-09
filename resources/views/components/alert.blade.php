{{-- <script src="{{ asset('admin/node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script> --}}
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

<!-- Toastr -->
<script src="/plugins/toastr/toastr.min.js"></script>
@if (session()->has('berhasil'))
    <script>
        toastr.success("{{ session('berhasil') }}")
    </script>
@endif

@if (session()->has('peringatan'))
    <script>
        toastr.warning("{{ session('peringatan') }}")
    </script>
@endif

@if (session()->has('info'))
    <script>
        toastr.info("{{ session('info') }}")
    </script>
@endif

@if (session()->has('gagal'))
    <script>
        toastr.error("{{ session('gagal') }}")
    </script>
@endif
