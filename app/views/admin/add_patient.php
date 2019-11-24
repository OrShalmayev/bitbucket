<form method="POST" action="<?php echo URLROOT; ?>admins/add_patient">
    <!-- Patient Type -->
    <div class="form-group">
        <label for="exampleFormControlSelect1">Patient Type:</label>
        <select class="form-control" name="patient_type">
            <option value="0">Please Select Patient Type</option>
            <option value="1">type 1</option>
            <option value="2">type 2</option>
            <option value="3">type 3</option>
        </select>
    </div>
    <!-- Patient Email -->
    <div class="form-group">
        <label for="exampleFormControlInput1">Patient Email address:</label>
        <input type="email" name="patient_email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <!-- Submit Button -->
    <div class="form-group">
        <button id="id_b" class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
    </div>
</form>