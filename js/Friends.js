$(function(){
    $(document).on('click','.friendBtn',function(){
        var $this = $(this);
        var type = $this.data('type');

        switch(type)
        {
            case 'addfriend':
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
            break;

            case 'approvefriend':
                var id = $this.data('uid');

                if(id != "")
                {
                
                   $.post('http://localhost:8888/php-project2/parse.php', {tags: 'approveFriend', uid: id}, function(data){
                      
                        if(data.code == 1)
                        {
                            $this.text(data.msg);
                           // $this.attr('disabled', 'disabled');
                           $('.friendBtn'+ id).prop('disabled', true);
                        }else {
                            
                        } 
                        
                    },"json"); 
                }
            break;

            case 'destroyfriend':
            var id = $this.data('uid');

            if(id != "")
            {
            
               $.post('http://localhost:8888/php-project2/parse.php', {tags: 'destroyFriend', uid: id}, function(data){
                  
                    if(data.code == 1)
                    {
                        $this.text(data.msg);
                       // $this.attr('disabled', 'disabled');
                       $('.friendBtn'+ id).prop('disabled', true);
                    }else {
                        
                    } 
                    
                },"json"); 
            }
        break;
        }
    });
});
