 <?php
  include 'connection.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajax Update</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<br/>
  <h2>Student Informtion Update</h2>
  <form action="./index.php" method="post">
    <span><button class="btn btn-primary"> Back </button></span>
  </form>
  
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Gender</th>
        <th>College</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
          $table  = mysqli_query($connection ,'SELECT * FROM user');
          while($row  = mysqli_fetch_array($table)){ ?>
              <tr id="<?php echo $row['id']; ?>">
                <td data-target="name"><?php echo $row['name']; ?></td>
                <td data-target="gender"><?php echo $row['gender']; ?></td>
                <td data-target="college"><?php echo $row['college']; ?></td>
                <td data-target="email"><?php echo $row['email']; ?></td>
                <td data-target="mob"><?php echo $row['mob']; ?></td>
                <td><a href="#" data-role="update" data-id="<?php echo $row['id'] ;?>">Update</a></td>
              </tr>
         <?php }
       ?>
       
    </tbody>
  </table>

  
</div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" class="form-control">
              </div>
              <div class="form-group">
                <label>Gender</label>
                <input type="text" id="gender" class="form-control">
              </div>
              <div class="form-group">
                <label>College</label>
                <input type="text" id="college" class="form-control">
              </div>

               <div class="form-group">
                <label>Email</label>
                <input type="text" id="email" class="form-control">
              </div>
              <div class="form-group">
                <label>Contact</label>
                <input type="text" id="mob" class="form-control">
              </div>
                <input type="hidden" id="userId" class="form-control">


          </div>
          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

</body>

<script>
  $(document).ready(function(){

    //  append values in input fields
      $(document).on('click','a[data-role=update]',function(){
            var id  = $(this).data('id');
            var name  = $('#'+id).children('td[data-target=name]').text();
            var gender  = $('#'+id).children('td[data-target=gender]').text();
            var college  = $('#'+id).children('td[data-target=college]').text();
            var email  = $('#'+id).children('td[data-target=email]').text();
            var mob  = $('#'+id).children('td[data-target=mob]').text();

            $('#name').val(name);
            $('#gender').val(gender);
            $('#college').val(college);
            $('#email').val(email);
            $('#mob').val(mob);
            $('#userId').val(id);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var id  = $('#userId').val(); 
          var name =  $('#name').val();
          var gender =  $('#gender').val();
          var college =   $('#college').val();
          var email =   $('#email').val();
          var mob =   $('#mob').val();


          $.ajax({
              url      : 'connection.php',
              method   : 'post', 
              data     : {name : name , gender: gender , college : college , email: email , mob : mob , id: id},
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=name]').text(name);
                             $('#'+id).children('td[data-target=gender]').text(gender);
                             $('#'+id).children('td[data-target=college]').text(college);
                             $('#'+id).children('td[data-target=email]').text(email);
                             $('#'+id).children('td[data-target=mob]').text(mob);

                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>
</html>
