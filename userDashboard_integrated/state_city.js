document.addEventListener("DOMContentLoaded", function () {
    const stateDropdown = document.getElementById("state");
    const cityDropdown = document.getElementById("city");

    // Function to populate the state dropdown
    function populateStateDropdown() {
        fetch("fetch_states.php")
            .then((response) => response.json())
            .then((data) => {
                data.forEach((state) => {
                    const option = document.createElement("option");
                    option.value = state.id;
                    option.text = state.name;
                    stateDropdown.appendChild(option);
                });
            });
    }

    // Function to populate the city dropdown based on the selected state
    function populateCityDropdown(selectedStateId) {
        cityDropdown.innerHTML = "<option>Select a City</option>";

        if (selectedStateId !== "0") {
            fetch(`fetch_cities.php?state_id=${selectedStateId}`)
                .then((response) => response.json())
                .then((data) => {
                    data.forEach((city) => {
                        const option = document.createElement("option");
                        option.value = city.id;
                        option.text = city.name;
                        cityDropdown.appendChild(option);
                    });
                });
        }
    }

    // Populate the initial state dropdown
    populateStateDropdown();

    // Update city dropdown based on the selected state
    stateDropdown.addEventListener("change", function () {
        const selectedStateId = stateDropdown.value;
        populateCityDropdown(selectedStateId);
    });
});
