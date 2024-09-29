
<!-- HTML code with Bootstrap classes for the customized alert -->
<div class="container mt-4">
    <div class="alert alert-dismissible alert-<?php echo $alertType; ?> custom-alert" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?php echo $message; ?></strong>
    </div>
</div>

<style>
/* Custom CSS for the alert */
.custom-alert {
    border-radius: 8px;
    font-size: 18px;
    padding: 15px;
}

/* Adjust colors as per your preference */
.alert-success {
    background-color: #D4EDDA;
    border-color: #C3E6CB;
    color: #155724;
}

.alert-danger {
    background-color: #F8D7DA;
    border-color: #F5C6CB;
    color: #721C24;
}
</style>
