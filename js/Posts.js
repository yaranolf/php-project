$(function(){
    $(document).on('click','.loadmore',function(){
       
        var startpos = Number($('#start').val())
       

       
       var num = startpos + 3;
       var n = num.toString();
         $('input[name=start]').val(n);
         
                var ids = $('#ids').val();

                if(ids != "")
                {
                
                   $.post('./loadmorepost.php', {start: startpos, ids: ids}, function(data){
                   
                   
                   $('.posts--list:last').after(data).show();
                
                  
                        
                    }); 
                }
            });
    $(document).on('click','.RemoveBtn',function(){
        // var $this = $(this);
        var $this = $(this);
        var id = $this.data('id');
 
        

                 
                    $.post('./parse.php', {tags: 'destroyPost', imageId: id}, function(data){
                    
                    $this.parents('article').toggle();
                   
                   
                         
                     }); 
         
     });
     $(document).on('click','.ModifyBtn',function(){
        // var $this = $(this);
        var $this = $(this);
        var id = $this.data('id');
        var imgDescription = $this.parents('article').find('#Description').val();
       
        

                 
                    $.post('./parse.php', {tags: 'modifyPost', imageId: id, imgDescription: imgDescription}, function(data){
                    
           
                         
                     }); 
         
     });
});
