<div class="container">
    <h2>Stacked form</h2>
    <form method="post" action="addcourse.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">ID:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter ID" name="id">
        </div>
        <div class="form-group">
            <label for="email">Semester:</label>
            <input type="number" class="form-control" id="email" placeholder="Enter Semester" name="sem">
        </div>

        <div class="form-group">
            <label for="email">Course 1:</label>
            <input type="text" class="form-control" name="c1" required>
        </div>
        <div class="form-group">
            <label for="email">Credit 1:</label>
            <input type="number" class="form-control" name="cr1" required>
        </div>
        <div class="form-group">
            <label for="email">Course 2:</label>
            <input type="text" class="form-control" name="c2" required>
        </div>
        <div class="form-group">
            <label for="email">Credit 2:</label>
            <input type="number" class="form-control" name="cr2" required>
        </div>
        <div class="form-group">
            <label for="email">Course 3:</label>
            <input type="text" class="form-control" name="c3" required>
        </div>
        <div class="form-group">
            <label for="email">Credit 3:</label>
            <input type="number" class="form-control" name="cr3" required>
        </div>
        <div class="form-group">
            <label for="email">Course 4:</label>
            <input type="text" class="form-control" name="c4" required>
        </div>
        <div class="form-group">
            <label for="email">Credit 4:</label>
            <input type="number" class="form-control" name="cr4" required>
        </div>
        <div class="form-group">
            <label for="email">Course 5:</label>
            <input type="text" class="form-control" name="c5" required>
        </div>
        <div class="form-group">
            <label for="email">Credit 5:</label>
            <input type="number" class="form-control" name="cr5" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>