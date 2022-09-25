@if (Session::has('success.message'))
    <script>
        swal({   title: "Success"  , text: "{{ Session::get('success.message') }}", type: "success",  html: true });
    </script>
    @elseif (Session::has('error.message'))
    <script>
        swal({   title: "Failed", text: "{{ Session::get('error.message') }}", type: "error",  html: true });
    </script>
@endif
<script>

    $('body').on('click', '.sa-remove', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var postId = $(this).data('id'); 
        swal({
            title: "are u sure?",
            text: "you will lose data",
            type: "error",
            html: true,
            showCancelButton: true,
            confirmButtonClass: 'btn-danger waves-effect waves-light',
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(){
            window.location.href = url;
        });
    });

    $('body').on('click', '.sa-approve', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var postId = $(this).data('id'); 
        swal({
            title: "Apakah anda yakin ?",
            text: "Kamu akan mensetujui transaksi ini",
            type: "success",
            html: true,
            showCancelButton: true,
            confirmButtonClass: 'btn-success waves-effect waves-light',
            confirmButtonText: "Ok, yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(){
            window.location.href = url;
        });
    });
</script>