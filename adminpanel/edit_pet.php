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
    $name = htmlspecialchars($_POST['name']);
    $category_id = intval($_POST['category_id']);
    $breed = htmlspecialchars($_POST['breed']);
    $price = floatval($_POST['price']);
    $age = intval($_POST['age']);
    $colour = htmlspecialchars($_POST['colour']);
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);
    $gender = htmlspecialchars($_POST['gender']);
    $vaccination_status = htmlspecialchars($_POST['vaccination_status']);
    $description = htmlspecialchars($_POST['description']);
    $pet_id = intval($_POST['pet_id']);
    $role = 'Admin'; // Get the role from the session

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = basename($_FILES['image']['name']);
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imagePath = 'uploads/' . $image;
        
        // Validate image file
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['image']['type'], $allowedTypes)) {
            echo "<script>alert('Invalid image type.');</script>";
            exit();
        }
        
        // Move the file to the uploads directory
        if (!move_uploaded_file($imageTmpName, $imagePath)) {
            echo "<script>alert('Failed to upload image.');</script>";
            exit(); // Exit script if image upload fails
        }
    } else {
        $image = htmlspecialchars($_POST['existing_image']); // Keep existing image if no new file is uploaded
    }

    // Determine pet status
    $status = ($role === 'Admin') ? 'Approved' : 'Unapproved';

    // Prepare SQL query for update
    $stmt = $con->prepare("UPDATE `pets` SET `name` = ?, `category_id` = ?, `breed` = ?, `price` = ?, `age` = ?, `description` = ?, `image` = ?, `role` = ?, `colour` = ?, `weight` = ?, `height` = ?, `gender` = ?, `vaccination_status` = ?, `status` = ? WHERE `id` = ?");
    $stmt->bind_param("sisddssssddsssi", $name, $category_id, $breed, $price, $age, $description, $image, $role, $colour, $weight, $height, $gender, $vaccination_status, $status, $pet_id);

    if ($stmt->execute()) {
        echo "<script>alert('Pet updated successfully.'); window.location.href='pets.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $con->close();
}

// Fetch the pet details for editing
$pet_id = intval($_GET['id']);
$petQuery = "SELECT * FROM `pets` WHERE id = $pet_id";
$petResult = $con->query($petQuery);
$pet = $petResult->fetch_assoc();
?>

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Pet</div>
                    </div>
                    <div class="card-body">
                        <form id="editPetForm" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="pet_id" value="<?php echo htmlspecialchars($pet['id']); ?>">
                            <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($pet['image']); ?>">
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
                                            value="<?php echo htmlspecialchars($pet['name']); ?>"
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
                                                <option value="<?php echo htmlspecialchars($category['id']); ?>" <?php echo ($category['id'] == $pet['category_id']) ? 'selected' : ''; ?>>
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
                                            value="<?php echo htmlspecialchars($pet['breed']); ?>"
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
                                                value="<?php echo htmlspecialchars($pet['price']); ?>"
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
                                            value="<?php echo htmlspecialchars($pet['age']); ?>"
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
                                            value="<?php echo htmlspecialchars($pet['colour']); ?>"
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
                                            value="<?php echo htmlspecialchars($pet['weight']); ?>"
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
                                            value="<?php echo htmlspecialchars($pet['height']); ?>"
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
                                                    <?php echo ($pet['gender'] == 'Male') ? 'checked' : ''; ?>
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
                                                    <?php echo ($pet['gender'] == 'Female') ? 'checked' : ''; ?>
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
                                            <option value="Fully Vaccinated" <?php echo ($pet['vaccination_status'] == 'Fully Vaccinated') ? 'selected' : ''; ?>>Fully Vaccinated</option>
                                            <option value="Partially Vaccinated" <?php echo ($pet['vaccination_status'] == 'Partially Vaccinated') ? 'selected' : ''; ?>>Partially Vaccinated</option>
                                            <option value="Not Vaccinated" <?php echo ($pet['vaccination_status'] == 'Not Vaccinated') ? 'selected' : ''; ?>>Not Vaccinated</option>
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
                                        ><?php echo htmlspecialchars($pet['description']); ?></textarea>
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
                                        />
                                        <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($pet['image']); ?>">
                                        <?php if ($pet['image']): ?>
                                            <img src="uploads/<?php echo htmlspecialchars($pet['image']); ?>" width="100" height="100" alt="Current Image">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Update Pet</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
