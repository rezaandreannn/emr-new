<?php

if (!function_exists('select2_header')) {
    function select2_header()
    {
        return array(
            '<link rel="stylesheet" href="' . base_url('assets/AdminLTE/plugins/select2/css/select2.min.css') . '">',
            '<link rel="stylesheet" href="' . base_url('assets/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') . '">'
        );
    }
}

if (!function_exists('select2_footer')) {
    function select2_footer()
    {
        return array(
            
           
            '<script src="' .  base_url('assets/AdminLTE/plugins/select2/js/select2.full.min.js') . '"></script>',
        

            '<script>
            $(function () {
    
                $(".select2").select2(),
    
       
                $(".select2bs4").select2({
                "theme" : bootstrap4
                });
            });
         </script>'

            
        );
    }
}
