$(function(){



    $("#byStatus").change(function(){
        var postData=$(this).val();

        $.ajax({
           type:'get',
           url: "/filtrer/"+postData,
           //data:postData,
           dataType:'json',
           success:function(result){
               console.log(result.clients)
           }
        
        
        
        })
    })
})