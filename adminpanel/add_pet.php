<?php
include 'header.php';

// Fetch categories for the dropdown
$categories = [];
$categoryQuery = "SELECT * FROM categories";
$categoryResult = $con->query($categoryQuery);

if ($categoryResult) {
    while ($row = $categoryResult->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $breed = $_POST['breed'];
    $price = $_POST['price'];
    $age = $_POST['age'];
    $colour = $_POST['colour'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $gender = $_POST['gender'];
    $vaccination_status = $_POST['vaccination_status'];
    $description = $_POST['description'];
    $role = 'Admin'; // Get the role from the session

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imagePath = 'uploads/' . basename($image);
        
        // Move the file to the uploads directory
        if (!move_uploaded_file($imageTmpName, $imagePath)) {
            $alertMessage = "Failed to upload image.";
            echo "<script>alert('$alertMessage');</script>";
            exit(); // Exit script if image upload fails
        }
    } else {
        $image = null; // Set default value if no file is uploaded
    }

    // Determine pet status
    $status = ($role === 'Admin') ? 'Approved' : 'Unapproved';

    // Prepare SQL query
    $stmt = $con->prepare("INSERT INTO pets (`user_id`, `name`, `category_id`, `breed`, `price`, `age`, `description`, `image`, `role`, `colour`, `weight`, `height`, `gender`, `vaccination_status`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $user_id = 1;
    //$user_id = $_SESSION['user_id']; // Ensure user_id is set in session
    $stmt->bind_param("isisddssssddsss", $user_id, $name, $category_id, $breed, $price, $age, $description, $image, $role, $colour, $weight, $height, $gender, $vaccination_status, $status);

    if ($stmt->execute()) {
        echo "<script>alert('Pet added successfully.'); window.location.href='pets.php';</script>";
    } else {
        $alertMessage = "Error: " . $stmt->error;
        echo "<script>alert('$alertMessage');</script>";
    }

    $stmt->close();
    $con->close();
}
?>



<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Pet</div>
                    </div>
                    <div class="card-body">
                        <form id="addPetForm" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Basic Pet Information -->
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="petName">Pet Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="petName"
                                            name="name"
                                            placeholder="Enter pet name"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="petCategory">Category</label>
                                        <select
                                            class="form-select"
                                            id="petCategory"
                                            name="category_id"
                                            required
                                        >
                                            <option value="">Select Category</option>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?php echo htmlspecialchars($category['id']); ?>">
                                                    <?php echo htmlspecialchars($category['name']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="petBreed">Breed</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="petBreed"
                                            name="breed"
                                            placeholder="Enter pet breed"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="petPrice">Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">PKR</span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                aria-label="Amount (to the nearest pkr)"
                                                id="petPrice"
                                                name="price"
                                                placeholder="Enter pet price"
                                                required
                                            />
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="petAge">Age</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="petAge"
                                            name="age"
                                            placeholder="Enter pet age"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="petColour">Colour</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="petColour"
                                            name="colour"
                                            placeholder="Enter pet colour"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="petWeight">Weight</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="petWeight"
                                            name="weight"
                                            placeholder="Enter pet weight"
                                            step="0.01"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="petHeight">Height</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="petHeight"
                                            name="height"
                                            placeholder="Enter pet height"
                                            step="0.01"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Gender</label><br />
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="gender"
                                                    id="genderMale"
                                                    value="Male"
                                                    required
                                                />
                                                <label
                                                    class="form-check-label"
                                                    for="genderMale"
                                                >
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check ms-3">
                                                <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="gender"
                                                    id="genderFemale"
                                                    value="Female"
                                                    required                                                    
                                                />
                                                <label
                                                    class="form-check-label"
                                                    for="genderFemale"
                                                >
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="petVaccinationStatus">Vaccination Status</label>
                                        <select
                                            class="form-select"
                                            id="petVaccinationStatus"
                                            name="vaccination_status"
                                            required
                                        >
                                            <option value="">Select Vaccination Status</option>
                                            <option value="Fully Vaccinated">Fully Vaccinated</option>
                                            <option value="Partially Vaccinated">Partially Vaccinated</option>
                                            <option selected value="Not Vaccinated">Not Vaccinated</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="petDescription">Description</label>
                                        <textarea
                                            class="form-control"
                                            id="petDescription"
                                            name="description"
                                            rows="5"
                                            placeholder="Enter a description for the pet"
                                            required
                                        ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="petImage">Image</label>
                                        <input
                                            type="file"
                                            class="form-control-file"
                                            id="petImage"
                                            name="image"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Add Pet</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>