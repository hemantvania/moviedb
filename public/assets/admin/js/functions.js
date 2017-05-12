jQuery(function($) {
  
    /****** Admin Users *******/
    $(document).on('click','.delete-btn',function(){ 
        if(!confirm("Are you sure about remove this user?"))
        {
            return false;
        }
    });
      
})