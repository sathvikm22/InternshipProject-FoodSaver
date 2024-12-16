document.addEventListener('DOMContentLoaded', function() {
    var locationInput = document.getElementById('locationInput');
    var showMapButton = document.getElementById('showMapButton');
    var donateButton = document.getElementById('donateButton');

    // Function to show location on map
    function showLocation() {
        var location = locationInput.value;
        if (location) {
            var mapUrl = "https://www.google.com/maps?q=" + encodeURIComponent(location);
            window.open(mapUrl, '_blank');
        } else {
            alert("Please enter a location.");
        }
    }

    // Event listener for Show on Map button
    showMapButton.addEventListener('click', function() {
        showLocation();
    });

    // Event listener for Donate Now button
    donateButton.addEventListener('click', function() {
        var location = locationInput.value;
        if (location) {
            localStorage.setItem('location', location);
            // Delay redirection to ensure localStorage is set
            setTimeout(function() {
                window.location.href = "last_page.html"; // Update to your actual page
            }, 100); // Short delay to ensure redirection happens smoothly
        } else {
            alert("Please enter a location before donating.");
        }
    });

    // Allow pressing Enter to trigger the Show on Map button
    locationInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            showLocation();
        }
    });
});
