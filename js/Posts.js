$(function(){
    $(document).on('click','.loadmore',function(){
       // var $this = $(this);
        var startpos = Number($('#start').val())
       // var endpos = Number($('#end').val());

       
       var num = startpos + 2;
       var n = num.toString();
         $('input[name=start]').val(n);
         
                var ids = $('#ids').val();

                if(ids != "")
                {
                
                   $.post('http://localhost:8888/php-project2/loadmorepost.php', {start: startpos, ids: ids}, function(data){
                   
                   
                   $('.center-div-image:last').after(data).show();
                  
                    // $('#end').val(endpos + 20);
                        
                    }); 
                }
        
    });
});
