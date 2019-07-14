$(document).ready(function(){

    /*--schedule checking one and unchecking one--*/
    $('.avdate').click(function(){

			var t1= $('#'+$(this).prop('id')+'from');
			var t2= $('#'+$(this).prop('id')+'to');
            if(!this.checked)
            {
                t1.removeAttr('enabled');
                t2.removeAttr('enabled');
                t1.attr("disabled", "disabled"); 
                t2.attr("disabled", "disabled");
                t1.attr("value", "null"); 
                t2.attr("value", "null");
            }
            else
            {
                t1.removeAttr('disabled');
                t2.removeAttr('disabled');
                t1.removeAttr('value');
                t2.removeAttr('value');
                t1.attr("enabled", "enabled"); 
                t2.attr("enabled", "enabled");
            } 

    });
    /*--schedule checking one and unchecking one--*/
    
    /*--schedule checking all and unchecking all--*/
    $('#alldguy').click(function(){
        
        var all = $('.avdate');

        if($(this). prop("checked") == false)
           {
            
            all.each(function()
            {    
                var t1= $('#' + $(this).prop('id') + 'from');
			    var t2= $('#' + $(this).prop('id') + 'to');
                t1.removeAttr('enabled');
                t2.removeAttr('enabled');
                t1.attr("disabled" , true); 
                t2.attr("disabled", true);
                t1.attr("value", null); 
                t2.attr("value", null); 
                $(this).prop('checked', false);
             });
             $("#checklabel").text('Check all: ');
            }
        else
        {
            
            all.each(function(){
         
            var t1= $('#'+ $(this).prop('id')+'from');
            var t2= $('#'+$(this).prop('id')+'to');
            t1.removeAttr('disabled');
            t2.removeAttr('disabled');
            t1.attr("enabled", "enabled"); 
            t2.attr("enabled", "enabled");
            t1.removeAttr("value"); 
            t2.removeAttr("value"); 
            $(this).prop('checked', true);
         });
         $("#checklabel").text('Uncheck all: ');
        }
    });
    /*--End of schedule checking and unchecking--*/

    /*--change the profile picture--*/

    $('#changepic').click(function(){

        $("#changepic_action").trigger('click');
    });
    
    $('#changepic_action').change(function(){


        f1data = new FormData();
        if($(this).prop('files').length > 0)
        {
            file =$(this).prop('files')[0];
            f1data.append("change_pp", file);
        }
        else alert('no pic');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: '/change_pp',
            data:f1data,
            processData: false,
            contentType: false,
            success:function(data) {
                location.reload(true);
                if(data == 1)
                alert('Your profile picture has been changed');
               else
               alert('error');
            }
    });
});
    /*--End of change profile picture--*/

    /*--Add to cart--*/
    $('.add-to-cart-btn').click(function(){
    
        var id = $(this).attr('id');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: '/addtocart',
            data: { id:id },
            success:function(data) {
                $('#dropdown-refresh').load('/updateviewcart');
               alert('added');
            }
         });

         $.ajax({
            type:'POST',
            url: '/updateviewcart',
            success:function(data) {
                
             }
         });

    });
    
    /*--End of add to cart--*/

    /*--validate the profile pic--*/

    $('#pic').change(function(){
    
        fdata = new FormData();
        if($(this).prop('files').length > 0)
        {
            file =$(this).prop('files')[0];
            fdata.append("pic", file);
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: '/validateprofpic',
            data: fdata,
            processData: false,
            contentType: false,
            success:function(data) {
               alert(data);
            }
         });
    });

    /*--End of validate the profile pic--*/

    /*--usd to lbp--*/
    $('#tolbp').click(function(){
        $('.c_usd').css('display','none');
        $('.c_lbp').css('display','inline');

    });
    /*--End of usd to lbp--*/

    
    /*--lbp to usd--*/
    $('#tousd').click(function(){
        $('.c_lbp').css('display','none');
        $('.c_usd').css('display','inline');

    });
    /*--End of lbp to usd--*/


    $('.cat-a').click(function(){
        var cid = $(this).attr('id');
        $('.product').css('display','none');
        $('.'+cid).css('display','inline');
    });

    /*--changing password--*/
    $('#chpassb').click(function(){
        
        var cpass=$('#cpass');
        var npass=$('#npass');
        var cnpass=$('#cnpass');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/change_pass',
            data: { cpass:cpass,npass:npass,cnpass:cnpass },
            success:function(data) {
                if(data == -1)
                alert('Current Password Is Wrong!!');
                else if(data == -2)
               alert('Password and Comfirmation dont match...');
               else if(data == 1)
               alert('password successfully changed');
               else
               alert('Something Went Wrong... Retry');
            },
            error:function(){
                alert('error');
            }
        });
    });
    /*--End of changing password--*/

    /*--add to wishlist--*/
    $('.add-to-wishlist').click(function(){
        var pid = $(this).attr('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/addtowishlist',
            data: { pid:pid },
            success:function(data) {
                alert('added');
            },
            error:function(){
                alert('error');
            }
        });
    });
    /*--End of add to wishlist--*/
});