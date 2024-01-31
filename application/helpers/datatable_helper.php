<?php

if (!function_exists('datatable_header')) {
    function datatable_header()
    {
        return array(
            '<link rel="stylesheet" href="' . base_url('assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') . '">',
            '<link rel="stylesheet" href="' . base_url('assets/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') . '">',
            '<link rel="stylesheet" href="' . base_url('assets/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') . '">'
        );
    }
}

if (!function_exists('datatable_footer')) {
    function datatable_footer()
    {
        return array(
            '<script src="' . base_url('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js') . '"></script>',
            '<script src="' . base_url('assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') . '"></script>',
            '<script src="' . base_url('assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') . '"></script>',
            '<script src="' . base_url('assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') . '"></script>',
            '<script src="' . base_url('assets/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') . '"></script>',
            '<script src="' . base_url('assets/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') . '"></script>',
            '<script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo(\'#example1_wrapper .col-md-6:eq(0)\');
                $(\'#example2\').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "lengthMenu": [10, 15, 25, 50], 
                    "pageLength": 10
                });
            });
            </script>'
        );
    }
}
