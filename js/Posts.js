$(function(){
    $(document).on('click','.friendBtn',function(){
        var $this = $(this);
        var type = $this.data('type');

       
        
                var id = $this.data('uid');

                if(id != "")
                {
                
                   $.post('http://localhost:8888/php-project2/parse.php', {tags: 'addFriend', uid: id}, function(data){
                      
                        if(data.code == 1)
                        {
                            $this.text(data.msg);
                            $this.attr('disabled', 'disabled');
                        }else {
                            
                        } 
                        
                    },"json"); 
                }
        
    });
});
