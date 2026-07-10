// This function shows an alert for error fetching user details
function showFetchError() {
    alert("Oops! We couldn't retrieve your details.");
}

// This function shows an alert for successfully updating user details
function showUpdateSuccess() {
    alert('User details updated successfully!');
}

// This function shows an alert for any error during the update process
function showUpdateError(error) {
    alert('Error updating user details: ' + error);
}
