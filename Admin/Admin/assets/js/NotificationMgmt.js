const composeForm = document.getElementById('compose-form');
const notificationTable = document.getElementById('notification-table').getElementsByTagName('tbody')[0];

composeForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const subject = document.getElementById('subject').value;
    const content = document.getElementById('content').value;
    const recipient = document.getElementById('recipient').value;
    const sentDate = new Date().toLocaleString();
    const deliveryStatus = 'Pending'; // You can implement a delivery status logic here

    // Add new row to the table
    const newRow = notificationTable.insertRow(0);
    newRow.innerHTML = `
        <td>${notificationTable.rows.length}</td>
        <td>${subject}</td>
        <td>${recipient}</td>
        <td>${sentDate}</td>
        <td>${deliveryStatus}</td>
    `;

    // Clear form fields
    composeForm.reset();
});
