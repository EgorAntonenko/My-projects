<?php include'foo_users.php' ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/3b467fbeb2.js" crossorigin="anonymous"></script>

    <title>Користувачі</title>
  </head>
  <body>

  <?php include 'header.php'?>
  <div class="container">
    <div class="row">
        <div class="col-12">
        <table class="table table-striped table-hover mt-2">
            <thead class="thead-dark">
                <th>ID</th>
                <th>Ім'я</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Дата народження</th>
                <th>Адреса</th>
                <th>Пароль</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php foreach ($result as $res) {?>
                <tr>
                <td><?php echo $res->User_id; ?></td>
                <td><?php echo $res->Name; ?></td>
                <td><?php echo $res->Email; ?></td>
                <td><?php echo $res->Phone; ?></td>
                <td><?php echo $res->Date_of_birth; ?></td>
                <td><?php echo $res->Address; ?></td>
                <td><?php echo $res->Password; ?></td>
                <td><a href="?id=<?php echo $res->User_id; ?>" data-toggle="modal" data-target="#edit<?php echo $res->User_id; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="" data-toggle="modal" data-target="#delete<?php echo $res->User_id; ?>" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $res->User_id; ?>"><i class="fa fa-trash-alt"></i></a></td>
                
</tr>
<!-- Modal edit-->
<div class="modal fade" id="edit<?php echo $res->User_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Додати запис</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?id=<?php echo $res->User_id; ?>" method="POST">

                <div class="form-group">
                <small>Ім'я</small>
                <input type="text" class="form-control" name="name" value= "<?php echo $res->Name; ?>"></div>

                <div class="form-group">
                <small>Email</small>
                <input type="text" class="form-control" name="email" value= "<?php echo $res->Email; ?>"></div>

                <div class="form-group">
                <small>Телефон</small>
                <input type="text" class="form-control" name="phone" value= "<?php echo $res->Phone; ?>"></div>

                <div class="form-group">
                <small>Дата народження</small>
                <input type="date" class="form-control" name="date" value="<?php echo $res->Date_of_birth; ?>"></div>

                <div class="form-group">
                <small>Адреса</small>
                <input type="text" class="form-control" name="address" value="<?php echo $res->Address; ?>"></div>

                <div class="form-group">
                <small>Пароль</small>
                <input type="text" class="form-control" name="password" value="<?php echo $res->Password; ?>"></div>
            
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary" name="edit">Зберегти</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal edit-->

<!-- Modal delete-->
<div class="modal fade" id="delete<?php echo $res->User_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Видалити запис № <?php echo $res->User_id; ?>?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       
      <div class="modal-footer">
        <form action="?id=<?php echo $res->User_id; ?>"  method="post">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-danger" name="delete">Видалити</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal delete-->


<?php } ?>
</tbody>
        </table>

        <button class="btn btn-success mt-2" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i></button>

        </div>
    </div>
  </div>

  <!-- Modal create-->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Додати запис</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">

                <div class="form-group">
                <small>Ім'я</small>
                <input type="text" class="form-control" name="name"></div>

                <div class="form-group">
                <small>Email</small>
                <input type="text" class="form-control" name="email"></div>

                <div class="form-group">
                <small>Телефон</small>
                <input type="text" class="form-control" name="phone"></div>

                <div class="form-group">
                <small>Дата народження</small>
                <input type="date" class="form-control" name="date"></div>

                <div class="form-group">
                <small>Адреса</small>
                <input type="text" class="form-control" name="address"></div>

                <div class="form-group">
                <small>Пароль</small>
                <input type="text" class="form-control" name="password"></div>
            
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary" name="add">Зберегти</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal create-->
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>