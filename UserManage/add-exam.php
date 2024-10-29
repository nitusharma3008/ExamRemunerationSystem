<?php
require_once(__DIR__ . '/../classes/FacultyData.php');
require_once(__DIR__ . '/../classes/Class.php');
require_once(__DIR__ . '/../classes/DurationClass.php');
require_once(__DIR__ . '/../classes/ExamPatternClass.php');
require_once(__DIR__ . '/../classes/ExamTypeClass.php');
require_once(__DIR__ . '/../classes/DepartmentTable.php');
require_once(__DIR__ . '/../classes/SemClass.php');
require_once(__DIR__ . '/../classes/TimeClass.php');

$facultidata = new FacultyDataTable();
$classTable = new ClassTable();
$durationTable = new DurationTable();
$examTypeTable = new ExamTypeTable();
$examPatternTable = new ExamPatternClass();
$departmentTable = new DepartmentTable();
$semesterTable = new SemClass();
$timeTable = new TimeClass();

$classes = $classTable->readAll();

$durations = $durationTable->readAll();

// echo $durations;

$examTypes = $examTypeTable->readAll();

// echo $examTypes;

$examPatterns = $examPatternTable->readAll();

// echo $examPatterns;

$departments = $departmentTable->readAll();

// echo $departments;

//echo semester
$semester = $semesterTable->readAll();

$times = $timeTable->readAll();


?>

<?php
include('user_dashboard.php');
?>
<main>
    <div class="container table-content shadow p-3 mb-5 mt-5 pt-5 bg-body rounded px-5">
        <div class="form-title mt-5">
            <h3 class="text-center">Add Exam Task</h3>
        </div>
        <div class="exam-form p-3">

            <div class="div-child mb-3">
                <form action="submit-exam-task.php" method="POST">

                    <div class="form-group mt-4">
                        <select class="form-control" id="class_id" name="class_id" required>
                            <option disabled selected>Classes</option>
                            <?php foreach ($classes as $class): ?>
                                <option value="<?php echo $class['class_id']; ?>">
                                    <?php echo $class['class_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="form-group mt-4">
                        <select class="form-control" id="duration_id" name="duration_id" required>
                            <option disabled selected>Durations</option>
                            <?php foreach ($durations as $duration): ?>
                                <option value="<?php echo $duration['id']; ?>">
                                    <?php echo $duration['duration']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="form-group mt-4">
                        <select class="form-control" id="examType_id" name="examType_id" required>
                            <option disabled selected>Exam Type</option>
                            <?php foreach ($examTypes as $examType): ?>
                                <option value="<?php echo $examType['id']; ?>">
                                    <?php echo $examType['type']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group mt-4">
                        <select class="form-control" id="examPattern_id" name="examPattern_id" required>
                            <option disabled selected>Exam pattern</option>
                            <?php foreach ($examPatterns as $examPattern): ?>
                                <option value="<?php echo $examPattern['id']; ?>">
                                    <?php echo $examPattern['pattern']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <select class="form-control" id="department_id" name="department_id" required>
                            <option disabled selected>Department</option>
                            <?php foreach ($departments as $department): ?>
                                <option value="<?php echo $department['dept_id']; ?>">
                                    <?php echo $department['dept_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="form-group mt-4">
                            <select class="form-control" id="semester_id" name="semester_id" required>
                                <option disabled selected>Semester</option>
                                <?php foreach ($semester as $sem): ?>
                                    <option value="<?php echo $sem['id']; ?>">
                                        <?php echo $sem['sem']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <select class="form-control" id="time_id" name="time_id" required>
                                <option disabled selected>Time</option>
                                <?php foreach ($times as $time): ?>
                                    <option value="<?php echo $time['id']; ?>">
                                        <?php echo $time['timing']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark text-light mt-4 w-100">Submit Task</button>
                </form>
            </div>
        </div>
    </div>
</main>



<?php

include('../footer.php');

?>