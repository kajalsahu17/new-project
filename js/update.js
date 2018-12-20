<script>
  $(document).ready(function(){

    //  append values in input fields
      $(document).on('click','a[data-role=update]',function(){
            var id  = $(this).data('id');
            var firstName  = $('#'+id).children('td[data-target=firstName]').text();
            var lastName  = $('#'+id).children('td[data-target=lastName]').text();
            var email  = $('#'+id).children('td[data-target=email]').text();

            $('#firstName').val(firstName);
            $('#lastName').val(lastName);
            $('#email').val(email);
            $('#userId').val(id);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var id  = $('#userId').val(); 
          var firstName =  $('#firstName').val();
          var lastName =  $('#lastName').val();
          var email =   $('#email').val();

          $.ajax({
              url      : 'dbConnection.php',
              method   : 'post', 
              data     : {firstName : firstName , lastName: lastName , email : email , id: id},
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=firstName]').text(firstName);
                             $('#'+id).children('td[data-target=lastName]').text(lastName);
                             $('#'+id).children('td[data-target=email]').text(email);
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>