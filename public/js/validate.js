$(document).ready(function(){
    $('#submitbutton').click(function(){
        var check = true;
        $("input:radio").each(function(){
            var name = $(this).attr("name");
            if($("input:radio[name="+name+"]:checked").length == 0){
                check = false; 
                if(check==false)
                { 
                    $("#div_"+name).css('border', '1px solid red');
                }
                  
                
            }else
            {
                $("#div_"+name).css('border', '');
            }
            
        });
        
        if(check){
            return true;
        }else{
            
            return false;
        }
    });
});