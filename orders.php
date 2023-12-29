<?php include 'foo_orders.php' ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/3b467fbeb2.js" crossorigin="anonymous"></script>

    <title>Замовлення</title>
</head>

<body>

<?php include 'header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover mt-2">
                    <thead class="thead-dark">
                        <th>ID</th>
                        <th>Користувач</th>
                        <th>Товар</th>
                        <th>Кількість</th>
                        <th>Повна ціна</th>
                        <th>Дата</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $res) { ?>
                            <tr>
                                <td>
                                    <?php echo $res->Order_id; ?>
                                </td>
                                <td>
                                    <?php echo $res->UserName; ?>
                                </td>
                                <td>
                                    <?php echo $res->GoodName; ?>
                                </td>
                                <td>
                                    <?php echo $res->Quantity; ?>
                                </td>
                                <td>
                                    <?php echo $res->Full_Price; ?>
                                </td>
                                <td>
                                    <?php echo $res->Date; ?>
                                </td>


                                <td><a href="?id=<?php echo $res->Order_id; ?>" data-toggle="modal"
                                        data-target="#edit<?php echo $res->Order_id; ?>" class="btn btn-success"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="" data-toggle="modal" data-target="#delete<?php echo $res->Order_id; ?>"
                                        class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete<?php echo $res->Order_id; ?>"><i
                                            class="fa fa-trash-alt"></i></a>
                                </td>

                            </tr>
                            <!-- Modal edit-->
                            <div class="modal fade" id="edit<?php echo $res->Order_id; ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Додати запис</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="?id=<?php echo $res->Order_id; ?>" method="POST">

                                                <div class="form-group">
                                                    <small>Користувач</small>
                                                    <select type="text" class="form-control" name="user">
                                                        <?php foreach ($user_result as $user): ?>
                                                            <option value="<?php echo $user['User_id']; ?>">
                                                                <?php echo $user['Name']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <small>Товар</small>
                                                    <select type="text" class="form-control" name="good">
                                                        <?php foreach ($good_result as $good): ?>
                                                            <option value="<?php echo $good['Good_id']; ?>">
                                                                <?php echo $good['Name']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <small>Кількість</small>
                                                    <input type="text" class="form-control" name="quantity"
                                                        value="<?php echo $res->Quantity; ?>">
                                                </div>


                                                <div class="form-group">
                                                    <small>Ціна</small>
                                                    <input type="text" class="form-control" name="full_price"
                                                        value="<?php echo $res->Full_Price; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <small>Дата</small>
                                                    <input type="date" class="form-control" name="date"
                                                        value="<?php echo $res->Date; ?>">
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Закрити</button>
                                            <button type="submit" class="btn btn-primary" name="edit">Зберегти</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal edit-->

                            <!-- Modal delete-->
                            <div class="modal fade" id="delete<?php echo $res->Order_id; ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Видалити запис №
                                                <?php echo $res->Order_id; ?>?
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-footer">
                                            <form action="?id=<?php echo $res->Order_id; ?>" method="post">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Закрити</button>
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

                <button class="btn btn-success mt-2" data-toggle="modal" data-target="#create"><i
                        class="fa fa-plus"></i></button>

            </div>
        </div>
    </div>

    <!-- Modal create-->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                            <small>Користувач</small>
                            <select type="text" class="form-control" name="user">
                                <?php foreach ($user_result as $user): ?>
                                    <option value="<?php echo $user['User_id']; ?>">
                                        <?php echo $user['Name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <small>Товар</small>
                            <select type="text" class="form-control" name="good">
                                <?php foreach ($good_result as $good): ?>
                                    <option value="<?php echo $good['Good_id']; ?>">
                                        <?php echo $good['Name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <small>Кількість</small>
                            <input type="text" class="form-control" name="quantity">
                        </div>


                        <div class="form-group">
                            <small>Повна Ціна</small>
                            <input type="text" class="form-control" name="full_price">
                        </div>

                        <div class="form-group">
                            <small>Дата</small>
                            <input type="date" class="form-control" name="date">
                        </div>


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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>