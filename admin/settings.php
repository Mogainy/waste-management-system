<?php
include "includes/header.php";
include "includes/sidebar.php";
include "includes/topbar.php";

$result = mysqli_query($conn,"SELECT * FROM settings LIMIT 1");

if(mysqli_num_rows($result)==0){

    mysqli_query($conn,"
    INSERT INTO settings
    (company_name,email,phone,address)
    VALUES
    ('WasteMS','info@wastems.com','0700000000','Nairobi')
    ");

    $result=mysqli_query($conn,"SELECT * FROM settings LIMIT 1");
}

$settings=mysqli_fetch_assoc($result);
?>

<div class="content">

<div class="container-fluid">

<h3 class="mb-4">
<i class="bi bi-gear-fill"></i>
System Settings
</h3>

<div class="card shadow">

<div class="card-body">

<form action="save_settings.php" method="POST">

<div class="mb-3">
<label>Company Name</label>
<input type="text"
name="company_name"
class="form-control"
value="<?= htmlspecialchars($settings['company_name']); ?>">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email"
name="email"
class="form-control"
value="<?= htmlspecialchars($settings['email']); ?>">
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text"
name="phone"
class="form-control"
value="<?= htmlspecialchars($settings['phone']); ?>">
</div>

<div class="mb-3">
<label>Address</label>
<textarea
name="address"
class="form-control"><?= htmlspecialchars($settings['address']); ?></textarea>
</div>

<button class="btn btn-success">
Save Settings
</button>

</form>

</div>

</div>

</div>

</div>

<?php include "includes/footer.php"; ?>