var host = $("meta[name='host']").attr("content"); 

$(document).ready(function(){
    'use strict'

    $(document).on('click', '.viewDetailLead', function(){
        var id = $(this).data('id');
        $('#leadDetailModal').modal('show');
        $('#leadDetailModalBody').html('<img src="'+host+'/public/assets/images/loader.gif"/>');

        $.get(host+"/admin/leads/details/"+id, function(data, status){
            $('#leadDetailModalBody').html(data);
        });
    });
});