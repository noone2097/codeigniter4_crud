<?php

$this->extend('layout/main');
$this->section('body');
?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?=session()->getFlashdata('success')?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif;?>

<h2>List of Student</h2>
<a href="/student/create" class="btn btn-primary">Add Student</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><center>ID</center></th>
            <th scope="col"><center>NAME</center></th>
            <th scope="col"><center>AGE</center></th>
            <th scope="col"><center>PROFILE</center></th>
            <th scope="col"><center>ACTION</center></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($student as $stud): ?>
            <tr>
                <th scope="row"> <center><?=$stud['id']?></center> </th>
                <td> <center><?=$stud['name']?></center> </td>
                <td> <center><?=$stud['age']?></center> </td>
                <td> <center><img src="/uploads/<?=$stud['profile']?>" alt="" width="50"></center> </td>
                <td>
                    <center>
                    <a href="/student/edit/<?=$stud['id']?>" class="btn btn-primary">EDIT</a>
                    <a href="/student/delete/<?=$stud['id']?>" class="btn btn-danger">DELETE</a>
                    </center>
                </td>
            </tr>
            <?php endforeach;?>
    </tbody>
</table>

<?php
$this->endSection();
?>