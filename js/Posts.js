$(function(){
    $(document).on('click','.loadmore',function(){
       // var $this = $(this);
        var startpos = Number($('#start').val())
        var endpos = Number($('#end').val());

       
        
                var ids = $('#ids').val();

                if(ids != "")
                {
                
                   $.post('http://localhost:8888/php-project2/loadmorepost.php', {start: startpos, end: endpos, ids: ids}, function(data){
                   alert (data);   
                   $('.center-div-image:last').after(data).show();
                      //$('#start') = startpos + 20;
                     // $('#end') = endpos + 20;
                        
                    }); 
                }
        
    });
});
