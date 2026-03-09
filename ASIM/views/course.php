<?php
session_start();
require_once "../lib/database.php";
require_once "../lib/route.php";
ob_start();
?>
<main>
    <div class="container-fluid p-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h4 class="m-0">Course Table</h4>
            <button class="btn btn-outline-primary rounded-1 px-4" style="border-style: dashed;" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="fa fa-circle-plus"></i>
                Add Course
            </button>
        </div>
        <table class="text-center" id="datatablesSimple">
            <thead>
                <tr>
                    <th data-sortable="false">#</th>
                    <th data-sortable="false">Course</th>
                    <th data-sortable="false">Description</th>
                    <th data-sortable="false">Date Created</th>
                    <th data-sortable="false">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM course";
                $counter = 1;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $counter++; ?></td>
                            <td><?php echo $row['course']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <?php
                                $timestamp = strtotime($row['date_created']);
                                $newFormat = date('M d, Y', $timestamp);
                                echo $newFormat;
                                ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-md-center align-items-md-center gap-1">
                                    <button class="btn btn-outline-primary rounded-1 btn-edit" style="border-style: dashed;" data-id="<?php echo $row['id']; ?>" data-course="<?php echo $row['course']; ?>" data-description="<?php echo $row['description']; ?>" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="fa fa-edit"></i>
                                        Edit
                                    </button>
                                    <button class="btn btn-outline-danger rounded-1 btn-edit" style="border-style: dashed;" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        <i class="fa fa-trash"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-primary p-2">
                    <h1 class="modal-title text-white fs-5" id="addModalLabel">Add Modal</h1>
                </div>
                <form action="<?php echo ROUTE_ADDCOURSE; ?>" method="POST">
                    <div class="modal-body">
                        <div class="row gap-2">
                            <div class="col-12">
                                <label for="course" class="form-label fw-bold">Course:</label>
                                <input type="text" class="form-control rounded-1 shadow-none" id="course" name="course" placeholder="Course">
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label fw-bold">Description:</label>
                                <input type="text" class="form-control rounded-1 shadow-none" id="description" name="description" placeholder="Description">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                            <i class="fa fa-close"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa fa-file-arrow-down"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-primary p-2">
                    <h1 class="modal-title text-white fs-5" id="editModalLabel">Edit Modal</h1>
                </div>
                <form action="<?php echo ROUTE_EDITCOURSE; ?>" method="post">
                    <div class="modal-body">
                        <div class="row gap-2">
                            <div class="col-12">
                                <input type="text" id="e_id" name="id" hidden>
                                <input type="text" id="e_old_course" name="old_course" hidden>
                                <label for="course" class="form-label fw-bold">Course:</label>
                                <input type="text" class="form-control rounded-1 shadow-none" id="e_course" name="course" placeholder="Course">
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label fw-bold">Description:</label>
                                <input type="text" class="form-control rounded-1 shadow-none" id="e_description" name="description" placeholder="Description">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                            <i class="fa fa-close"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa fa-file-arrow-down"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-primary p-2">
                    <h1 class="modal-title text-white fs-5" id="deleteModalLabel">Delete Modal</h1>
                </div>
                <form action="<?php echo ROUTE_DELETECOURSE; ?>" method="post">
                    <div class="modal-body">
                        <input type="text" id="d_id" name="id" hidden>
                        <p class="text-center">Are you sure you want to delete this data?</p>
                    </div>
                    <div class="modal-footer d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                            <i class="fa fa-close"></i>
                            No
                        </button>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa fa-file-arrow-down"></i>
                            Yes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script>
    const sidebar = document.getElementById('course');
    sidebar.classList.add('bg-primary', 'active');
    const e_id = document.getElementById('e_id');
    const e_old_course = document.getElementById('e_old_course');
    const e_course = document.getElementById('e_course');
    const e_description = document.getElementById('e_description');
    const d_id = document.getElementById('d_id');

    document.addEventListener('click', function(e) {
        const editButtons = e.target.closest('.btn-edit');
        if (editButtons) {
            e_id.value = editButtons.dataset.id;
            e_old_course.value = editButtons.dataset.course;
            e_course.value = editButtons.dataset.course;
            e_description.value = editButtons.dataset.description;

            d_id.value = editButtons.dataset.id;
        }
    });
</script>
<?php
$content = ob_get_clean();

include 'layout/layout.php';
?>