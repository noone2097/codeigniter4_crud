<?php

$this->extend('layout/main');
$this->section('body');
?>
<h2>Edit Student</h2>
<form action="/student/update/<?=$student['id'];?>" method="post" enctype="multipart/form-data">
<div class="mb-3">
  <label for="name" class="form-label">Student Name</label>
  <input type="text" class="form-control" name="name" placeholder="John Doe" value="<?=$student['name'];?>">
</div>

<div class="mb-3">
  <label for="age" class="form-label">Age</label>
  <input type="number" class="form-control" name="age" placeholder="20" value="<?=$student['age'];?>">
</div>

<div class="mb-3">
<label for="profile" class="form-label">Profile</label>
  <input type="file" class="form-control" name="profile">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
$this->endSection();
?>