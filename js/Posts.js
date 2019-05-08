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
    $(document).on('click','.RemoveBtn',function(){
        // var $this = $(this);
        var $this = $(this);
        var id = $this.data('id');
 
        

                 
                    $.post('http://localhost:8888/php-project2/parse.php', {tags: 'destroyPost', imageId: id}, function(data){
                    
                    $this.parents('article').toggle();
                   
                   
                         
                     }); 
         
     });
     $(document).on('click','.ModifyBtn',function(){
        // var $this = $(this);
        var $this = $(this);
        var id = $this.data('id');
        var imgDescription = $this.parents('article').find('#Description').val();
       
        

                 
                    $.post('http://localhost:8888/php-project2/parse.php', {tags: 'modifyPost', imageId: id, imgDescription: imgDescription}, function(data){
                    
           
                         
                     }); 
         
     });
});
