<?php include 'foo_goods.php' ?>

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

    <title>Товари</title>
</head>

<body>

<?php include 'header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover mt-2">
                    <thead class="thead-dark">
                        <th>ID</th>
                        <th>Категорія</th>
                        <th>Назва</th>
                        <th>Інформація</th>
                        <th>Виробник</th>
                        <th>Зображення</th>
                        <th>Ціна</th>
                        <th>Кількість</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $res) { ?>
                            <tr>
                                <td>
                                    <?php echo $res->Good_id; ?>
                                </td>
                                <td>
                                    <?php echo $res->CategoryName; ?>
                                </td>
                                <td>
                                    <?php echo $res->Name; ?>
                                </td>
                                <td>
                                    <?php echo $res->Info; ?>
                                </td>
                                <td>
                                    <?php echo $res->ManufacturerName; ?>
                                </td>
                                <td>

                                    <img class="picture" src="<?php echo $res->Image; ?>" width="200" height="200" />
                                </td>
                                <td>
                                    <?php echo $res->Price; ?>
                                </td>
                                <td>
                                    <?php echo $res->Quantity; ?>
                                </td>
                                <td><a href="?id=<?php echo $res->Good_id; ?>" data-toggle="modal"
                                        data-target="#edit<?php echo $res->Good_id; ?>" class="btn btn-success"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="" data-toggle="modal" data-target="#delete<?php echo $res->Good_id; ?>"
                                        class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete<?php echo $res->Good_id; ?>"><i
                                            class="fa fa-trash-alt"></i></a>
                                </td>

                            </tr>
                            <!-- Modal edit-->
                            <div class="modal fade" id="edit<?php echo $res->Good_id; ?>" tabindex="-1" role="dialog"
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
                                            <form action="?id=<?php echo $res->Good_id; ?>" method="POST">

                                                <div class="form-group">
                                                    <small>Категорія</small>
                                                    <select type="text" class="form-control" name="category"
                                                        value="<?php echo $res->Category_id; ?>">
                                                        <?php foreach ($category_result as $category): ?>
                                                            <option value="<?php echo $category['Category_id']; ?>">
                                                                <?php echo $category['Name']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <small>Назва</small>
                                                    <input type="text" class="form-control" name="name"
                                                        value="<?php echo $res->Name; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <small>Інформація</small>
                                                    <input type="text" class="form-control" name="info"
                                                        value="<?php echo $res->Info; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <small>Виробник</small>
                                                    <select type="text" class="form-control" name="manufactory"
                                                        value="<?php echo $res->Manufactory_id; ?>">
                                                        <?php foreach ($manufactory_result as $manufactory): ?>
                                                            <option value="<?php echo $manufactory['Manufactory_id']; ?>">
                                                                <?php echo $manufactory['Name']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <small>Зображення</small>
                                                    <input type="text" class="form-control" name="image"
                                                        value="<?php echo $res->Image; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <small>Ціна</small>
                                                    <input type="text" class="form-control" name="price"
                                                        value="<?php echo $res->Price; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <small>Кількість</small>
                                                    <input type="text" class="form-control" name="quantity"
                                                        value="<?php echo $res->Quantity; ?>">
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
                            <div class="modal fade" id="delete<?php echo $res->Good_id; ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Видалити запис №
                                                <?php echo $res->Good_id; ?>?
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-footer">
                                            <form action="?id=<?php echo $res->Good_id; ?>" method="post">
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
                            <small>Категорія</small>
                            <select type="text" class="form-control" name="category">
                                <?php foreach ($category_result as $category): ?>
                                    <option value="<?php echo $category['Category_id']; ?>">
                                        <?php echo $category['Name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <small>Назва</small>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <small>Інформація</small>
                            <input type="text" class="form-control" name="info">
                        </div>

                        <div class="form-group">
                            <small>Виробник</small>
                            <select type="text" class="form-control" name="manufactory">
                                <?php foreach ($manufactory_result as $manufactory): ?>
                                    <option value="<?php echo $manufactory['Manufactory_id']; ?>">
                                        <?php echo $manufactory['Name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <small>Зображення</small>
                            <input type="text" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <small>Ціна</small>
                            <input type="text" class="form-control" name="price">
                        </div>

                        <div class="form-group">
                            <small>Кількість</small>
                            <input type="text" class="form-control" name="quantity">
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