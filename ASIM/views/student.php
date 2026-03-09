<?php
session_start();
require_once "../lib/database.php";
require_once "../lib/route.php";
ob_start();
?>
<main>
    <div class="container-fluid p-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h4 class="m-0">Student Table</h4>
            <button class="btn btn-outline-primary rounded-1 px-4" style="border-style: dashed;" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="fa fa-circle-plus"></i>
                Add Student
            </button>
        </div>
        <table class="text-center" id="datatablesSimple">
            <thead>
                <tr>
                    <th data-sortable="false">#</th>
                    <th data-sortable="false">Name</th>
                    <th data-sortable="false">Address</th>
                    <th data-sortable="false">Age</th>
                    <th data-sortable="false">Phone#</th>
                    <th data-sortable="false">Gender</th>
                    <th data-sortable="false">Course</th>
                    <th data-sortable="false">Yearlevel</th>
                    <th data-sortable="false">Status</th>
                    <th data-sortable="false">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT *, a.id AS student_id, b.description AS course_description, c.description AS yearlevel_description  FROM student  AS a
                INNER JOIN course AS b ON a.course_id = b.id
                INNER JOIN yearlevel AS c ON a.yearlevel_id = c.id";
                $counter = 1;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $counter++; ?></td>
                            <td><?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td>
                                <?php
                                $date1 = new DateTime($row['birthdate']);
                                $date2 = new DateTime();
                                $interval = $date1->diff($date2);
                                $total_days = $interval->y;
                                echo  $total_days;
                                ?>
                            </td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['gender'] == 1 ? "Male" : "Female"; ?></td>
                            <td><?php echo $row['course']; ?></td>
                            <td><?php echo $row['yearlevel_description']; ?></td>
                            <td>
                                <div class="d-flex justify-content-md-center align-items-md-center">
                                <?php if($row['status'] == 1) { ?>
                                    <span class="text-success p-2 rounded-2 w-100">
                                        <i class="fa fa-circle-check"></i>
                                        Active
                                    </span>
                               <?php } else { ?>
                                    <span class="text-danger p-2 rounded-2 w-100">
                                        <i class="fa fa-circle-xmark"></i>
                                        Inactive
                                    </span>
                                <?php } ?>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-md-center align-items-md-center gap-1">
                                    <button class="btn btn-outline-primary rounded-1 w-100 btn-edit" style="border-style: dashed;"
                                        data-object="<?php
                                                        $data = [
                                                            'id' => $row['student_id'],
                                                            'first_name' => $row['first_name'],
                                                            'middle_name' => $row['middle_name'],
                                                            'last_name' => $row['last_name'],
                                                            'address' => $row['address'],
                                                            'birthdate' => $row['birthdate'],
                                                            'phone_number' => $row['phone_number'],
                                                            'gender' => $row['gender'],
                                                            'course' => $row['course_id'],
                                                            'yearlevel_description' => $row['yearlevel_id'],
                                                        ];
                                                        echo htmlspecialchars(json_encode($data), ENT_QUOTES, "UTF-8"); ?>" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="fa fa-edit"></i>
                                        <span class="d-none d-md-inline">Edit</span>
                                    </button>
                                    <?php if ($row['status'] == 1) { ?>
                                        <button class="btn btn-outline-danger rounded-1 w-100 btn-status" style="border-style: dashed;" data-object="<?php
                                                        $data = [
                                                            'id' => $row['student_id'],
                                                            'status' => $row['status'],
                                                        ];
                                                        echo htmlspecialchars(json_encode($data), ENT_QUOTES, "UTF-8"); ?>" data-bs-toggle="modal" data-bs-target="#statusModal">
                                            <i class="fa fa-circle-xmark"></i>
                                            <span class="d-none d-md-inline">Inactive</span>
                                        </button>
                                    <?php } else { ?>
                                        <button class="btn btn-outline-success rounded-1 w-100 btn-status" style="border-style: dashed;" data-object="<?php
                                                        $data = [
                                                            'id' => $row['student_id'],
                                                            'status' => $row['status'],
                                                        ];
                                                        echo htmlspecialchars(json_encode($data), ENT_QUOTES, "UTF-8"); ?>" data-bs-toggle="modal" data-bs-target="#statusModal">
                                            <i class="fa fa-circle-check"></i>
                                            <span class="d-none d-md-inline">Active</span>
                                        </button>
                                    <?php } ?>
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-primary p-2">
                    <h1 class="modal-title text-white fs-5" id="addModalLabel">Add Modal</h1>
                </div>
                <form action="<?php echo ROUTE_ADDSTUDENT; ?>" method="POST">
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-12 col-md-4">
                                <label for="firstname" class="form-label fw-bold">Firstname:</label>
                                <input type="text" class="form-control rounded-1 shadow-none" id="firstname" name="firstname" placeholder="Firstname" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="middlename" class="form-label fw-bold">Middlename:</label>
                                <input type="text" class="form-control rounded-1 shadow-none" id="middlename" name="middlename" placeholder="Middlename" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="lastname" class="form-label fw-bold">Lastname:</label>
                                <input type="text" class="form-control rounded-1 shadow-none" id="lastname" name="lastname" placeholder="Lastname" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <label for="address" class="form-label fw-bold">Address:</label>
                                <textarea class="form-control rounded-1 shadow-none" id="address" name="address" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-md-6">
                                <label for="birthdate" class="form-label fw-bold">Birthdate:</label>
                                <input type="date" class="form-control rounded-1 shadow-none" id="birthdate" name="birthdate" placeholder="birthdate" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="phone" class="form-label fw-bold">Phone:</label>
                                <input type="tel" class="form-control rounded-1 shadow-none" id="phone" name="phone" pattern="09[0-9]{9}" maxlength="11" title="Please enter an 11-digit number starting with 09" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <label for="gender" class="form-label fw-bold">Gender:</label>
                                <select class="form-select rounded-1 shadow-none" id="gender" name="gender" aria-label="Default select example" required>
                                    <option value="" selected disabled>-- Select gender --</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="course" class="form-label fw-bold">Course:</label>
                                <select class="form-select rounded-1 shadow-none" id="course" name="course" aria-label="Default select example" required>
                                    <option value="" selected disabled>-- Select course --</option>
                                    <?php
                                    $sql = "SELECT * FROM course";
                                    $counter = 1;
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['course']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="yearlevel" class="form-label fw-bold">Yearlevel:</label>
                                <select class="form-select rounded-1 shadow-none" id="yearlevel" name="yearlevel" aria-label="Default select example" required>
                                    <option value="" selected disabled>-- Select yearlevel --</option>
                                    <?php
                                    $sql = "SELECT * FROM yearlevel";
                                    $counter = 1;
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['yearlevel']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-primary p-2">
                    <h1 class="modal-title text-white fs-5" id="editModalLabel">Edit Modal</h1>
                </div>
                <form action="<?php echo ROUTE_EDITSTUDENT; ?>" method="POST">
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-12 col-md-4">
                                <input type="text" id="e_id" name="id" hidden>
                                <input type="text" id="e_old_firstname" name="old_firstname" hidden>
                                <input type="text" id="e_old_middlename" name="old_middlename" hidden>
                                <input type="text" id="e_old_lastname" name="old_lastname" hidden>
                                <label for="e_firstname" class="form-label fw-bold">Firstname:</label>
                                <input type="text" class="form-control rounded-1 shadow-none" id="e_firstname" name="firstname" placeholder="Firstname" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="e_middlename" class="form-label fw-bold">Middlename:</label>
                                <input type="text" class="form-control rounded-1 shadow-none" id="e_middlename" name="middlename" placeholder="Middlename" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="e_lastname" class="form-label fw-bold">Lastname:</label>
                                <input type="text" class="form-control rounded-1 shadow-none" id="e_lastname" name="lastname" placeholder="Lastname" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <label for="e_address" class="form-label fw-bold">Address:</label>
                                <textarea class="form-control rounded-1 shadow-none" id="e_address" name="address" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-md-6">
                                <label for="e_birthdate" class="form-label fw-bold">Birthdate:</label>
                                <input type="date" class="form-control rounded-1 shadow-none" id="e_birthdate" name="birthdate" placeholder="birthdate" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="e_phone" class="form-label fw-bold">Phone:</label>
                                <input type="tel" class="form-control rounded-1 shadow-none" id="e_phone" name="phone" pattern="09[0-9]{9}" maxlength="11" title="Please enter an 11-digit number starting with 09" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <label for="e_gender" class="form-label fw-bold">Gender:</label>
                                <select class="form-select rounded-1 shadow-none" id="e_gender" name="gender" aria-label="Default select example" required>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="e_course" class="form-label fw-bold">Course:</label>
                                <select class="form-select rounded-1 shadow-none" id="e_course" name="course" aria-label="Default select example" required>
                                    <?php
                                    $sql = "SELECT * FROM course";
                                    $counter = 1;
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['course']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="e_yearlevel" class="form-label fw-bold">Yearlevel:</label>
                                <select class="form-select rounded-1 shadow-none" id="e_yearlevel" name="yearlevel" aria-label="Default select example" required>
                                    <?php
                                    $sql = "SELECT * FROM yearlevel";
                                    $counter = 1;
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['yearlevel']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
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

    <!-- Status Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-primary p-2">
                    <h1 class="modal-title text-white fs-5" id="statusModalLabel">Status Modal</h1>
                </div>
                <form action="<?php echo ROUTE_DELETESTUDENT; ?>" method="post">
                    <div class="modal-body">
                        <input type="text" id="d_id" name="id" hidden>
                        <input type="text" id="d_status" name="status" hidden>
                        <p class="text-center">Are you sure you want to update the status of this data?</p>
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
    const sidebar = document.getElementById('student');
    sidebar.classList.add('bg-primary', 'active');
    const e_id = document.getElementById('e_id');
    const e_old_firstname = document.getElementById('e_old_firstname');
    const e_old_middlename = document.getElementById('e_old_middlename');
    const e_old_lastname = document.getElementById('e_old_lastname');
    const e_firstname = document.getElementById('e_firstname');
    const e_middlename = document.getElementById('e_middlename');
    const e_lastname = document.getElementById('e_lastname');
    const e_address = document.getElementById('e_address');
    const e_birthdate = document.getElementById('e_birthdate');
    const e_phone = document.getElementById('e_phone');
    const e_gender = document.getElementById('e_gender');
    const e_course = document.getElementById('e_course');
    const e_yearlevel = document.getElementById('e_yearlevel');
    const d_id = document.getElementById('d_id');
    const d_status = document.getElementById('d_status');

    document.addEventListener('click', function(e) {
        const editButtons = e.target.closest('.btn-edit');
        const statusButtons = e.target.closest('.btn-status');

        if (editButtons) {
            const obj = JSON.parse(editButtons.dataset.object);
            e_id.value = obj['id'];
            e_old_firstname.value = obj['first_name'];
            e_old_middlename.value = obj['middle_name'];
            e_old_lastname.value = obj['last_name'];
            e_firstname.value = obj['first_name'];
            e_middlename.value = obj['middle_name'];
            e_lastname.value = obj['last_name'];
            e_address.value = obj['address'];
            e_birthdate.value = obj['birthdate'];
            e_phone.value = obj['phone_number'];
            e_gender.value = obj['gender'];
            e_course.value = obj['course'];
            e_yearlevel.value = obj['yearlevel_description'];
        }

        if (statusButtons) {
            const obj = JSON.parse(statusButtons.dataset.object);
            d_id.value = obj['id'];
            d_status.value = obj['status'];
        }
    });
</script>
<?php
$content = ob_get_clean();

include 'layout/layout.php';
?>