<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>


<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            pageLength: 50,


            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm  btn-info ma-5'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm  btn-secondary ma-5'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm  btn-success ma-5'
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-sm  btn-warning ma-5'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm  btn-primary ma-5'
                },
            ],
        });
    });
</script>
