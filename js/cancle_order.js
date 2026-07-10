function showDeleteSuccess() {
    alert('Order deleted successfully!');
}

function showDeleteError() {
    alert('Error deleting the order!');
}

function checkMessage(message) {
    if (message === 'Order deleted successfully!') {
        showDeleteSuccess();
    } else if (message === 'Error deleting the order!') {
        showDeleteError();
    }
}
