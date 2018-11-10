<a href="index.php?r=job">Back to Jobs</a>
<h2 class="page-header"><?= $job->title; ?> <small> in <?= $job->city;?> <?= $job->state; ?></small></h2>
<?php if(!empty($job->description)) : ?>
<div class="well">
  <h4>Job Desc</h4>
  <?= $job->description; ?>
</div>
<?php endif; ?>

<ul class="list-group">
<?php if(!empty($job->create_date)) : ?>
  <?php $phpdate = strtotime($job->create_date); ?>
  <?php $formatted_date = date('F j, Y, g:i a', $phpdate); ?>
  <li class="list-group-item"><strong> Listing Date : </strong><?=$job->create_date; ?> </li>
<?php endif; ?>

<?php if(!empty($job->category->name)) : ?>
  <li class="list-group-item"><strong> Category : </strong><?=$job->category->name; ?> </li>
<?php endif; ?>

<?php if(!empty($job->type)) : ?>
  <li class="list-group-item"><strong> Employment Type : </strong><?=$job->type; ?> </li>
<?php endif; ?>

<?php if(!empty($job->salary_range)) : ?>
  <li class="list-group-item"><strong> Salary : </strong><?=$job->salary_range; ?> </li>
<?php endif; ?>

<?php if(!empty($job->contact_email)) : ?>
  <li class="list-group-item"><strong> Email : </strong><?=$job->contact_email; ?> </li>
<?php endif; ?>

<?php if(!empty($job->contact_phone)) : ?>
  <li class="list-group-item"><strong> Phone : </strong><?=$job->contact_phone; ?> </li>
<?php endif; ?>
</ul>
<a href="mailto:<?=$job->contact_email; ?>Subject=Job%Application" class="btn btn-primary">Contact Employer</a>