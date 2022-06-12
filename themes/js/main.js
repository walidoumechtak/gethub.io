$(function(){

        'use strict';

        // $(".dropdown-toggle").dropdown();

        $('[placeholder]').focus(function () {
                $(this).attr('text-place', $(this).attr('placeholder'));
                $(this).attr('placeholder', '');
        }).blur(function (){
                $(this).attr('placeholder',$(this).attr('text-place'));
        });

});



