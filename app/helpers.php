<?php
if(!function_exists('format_rupiah')){
        function format_rupiah($amount)
        {
            return "Rp. ".number_format($amount, 0,",",".");
        }
    }