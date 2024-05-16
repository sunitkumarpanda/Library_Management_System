<!-- Add this section after the </div> of your current code -->

<!-- Book Table Section -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Book List
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Book Name</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>ISBN Number</th>
                                <th>Price</th>
                                <th>Book Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT b.*, c.CategoryName, a.AuthorName FROM tblbooks b
                                    INNER JOIN tblcategory c ON b.CatId = c.id
                                    INNER JOIN tblauthors a ON b.AuthorId = a.id";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_ASSOC);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) { ?>
                                    <tr>
                                        <td><?php echo $cnt++; ?></td>
                                        <td><?php echo htmlentities($result['BookName']); ?></td>
                                        <td><?php echo htmlentities($result['CategoryName']); ?></td>
                                        <td><?php echo htmlentities($result['AuthorName']); ?></td>
                                        <td><?php echo htmlentities($result['ISBNNumber']); ?></td>
                                        <td><?php echo htmlentities($result['BookPrice']); ?></td>
                                        <td><img src="bookimg/<?php echo htmlentities($result['bookImage']); ?>" width="100" height="150"></td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="7">No Books Found</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
