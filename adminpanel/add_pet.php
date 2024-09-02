<?php
include 'header.php';
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
                        <form id="addPetForm" method="post" enctype="multipart/form-data" action="process_add_pet.php">
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
                                            <option value="1">Category 1</option>
                                            <option value="2">Category 2</option>
                                            <!-- Add more categories as needed -->
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
                                                    checked
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
                                            <option value="Not Vaccinated">Not Vaccinated</option>
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
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="index.php" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
