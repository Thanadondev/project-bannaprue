document.addEventListener('DOMContentLoaded', () => {
    fetchUsers(); // Function to populate the users table
});

function showModal(modalId, isEdit = false, userId = null) {
    const modal = document.getElementById(modalId);
    const modalTitle = document.getElementById('modal-title');
    const form = document.getElementById('userForm');
    form.reset(); // Reset the form to clear any previous input

    if (isEdit) {
        modalTitle.textContent = 'Edit User';
        fetchUserData(userId); // Pre-fill the form with existing user data
    } else {
        modalTitle.textContent = 'Add User';
    }

    modal.classList.remove('hidden');
}

function hideModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
}


document.getElementById('userForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    const id = formData.get('id');

    if (id) {
        updateUser(formData);
    } else {
        addUser(formData);
    }
});


// Handle form submission
document.getElementById('userForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent default form submission

    const isEditing = this.getAttribute('data-editing') === 'true';
    const formData = new FormData(this);

    if (isEditing) {
        updateUser(formData);
    } else {
        addUser(formData);
    }
});

function fetchUserData(userId) {
    fetch(`getUserData.php?id=${userId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('userId').value = data.id;
            document.getElementById('firstname').value = data.firstname;
            document.getElementById('lastname').value = data.lastname;
            document.getElementById('email').value = data.email;
            document.getElementById('address').value = data.address || '';
            document.getElementById('tel').value = data.tel || '';
            document.getElementById('lineid').value = data.lineid || '';
            // Specify that we're editing an existing user
            document.getElementById('userForm').setAttribute('data-editing', 'true');
        })
        .catch(error => console.error('Error fetching user data:', error));
}


function fetchUsers() {
    fetch('getUserData.php')
        .then(response => response.json())
        .then(data => {
            const usersTableBody = document.querySelector('#usersTable tbody');
            usersTableBody.innerHTML = ''; // Clear existing rows
            data.forEach(user => {
                usersTableBody.innerHTML += `
                    <tr>
                        <td class="px-4 py-2">${user.firstname}</td>
                        <td class="px-4 py-2">${user.lastname}</td>
                        <td class="px-4 py-2">${user.email}</td>
                        <td class="px-4 py-2">${user.address}</td>
                        <td class="px-4 py-2">${user.tel}</td>
                        <td class="px-4 py-2">${user.lineid}</td>
                        <td class="px-4 py-2">
                            <button onclick="showEditUserModal(${user.id})" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">Edit</button>
                            <button onclick="deleteUser(${user.id})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">Delete</button>
                        </td>
                    </tr>
                `;
            });
        })
        .catch(error => console.error('Error fetching users:', error));
}


// Add a new user
function addUser(formData) {
    fetch('addUser.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                fetchUsers(); // Refresh the user table
                hideModal('addUserModal'); // Hide the modal
            }
        })
        .catch(error => console.error('Error adding user:', error));
}

// Update an existing user
function updateUser(formData) {
    fetch('editUser.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                fetchUsers(); // Refresh the user table
                hideModal('addUserModal'); // Hide the modal
            }
        })
        .catch(error => console.error('Error updating user:', error));
}

// Delete a user
function deleteUser(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
        fetch('deleteUser.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${userId}`,
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    fetchUsers(); // Refresh the user table
                }
            })
            .catch(error => console.error('Error deleting user:', error));
    }
}

function showEditUserModal(userId) {
    fetch(`getUserData.php?id=${userId}`)
        .then(response => response.json())
        .then(user => {
            document.getElementById('userId').value = user.id;
            document.getElementById('firstname').value = user.firstname;
            document.getElementById('lastname').value = user.lastname;
            document.getElementById('email').value = user.email;
            document.getElementById('address').value = user.address || '';
            document.getElementById('tel').value = user.tel || '';
            document.getElementById('lineid').value = user.lineid || '';
            showModal('addUserModal');
            document.getElementById('modal-title').textContent = 'Edit User';
        })
        .catch(error => console.error('Error loading user:', error));
}

function submitUserForm() {
    const formData = new FormData(document.getElementById('userForm'));
    const id = formData.get('id');
    const actionUrl = id ? 'editUser.php' : 'addUser.php';

    fetch(actionUrl, {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                fetchUsers();
                hideModal('addUserModal');
            }
        })
        .catch(error => console.error('Error:', error));
}

function deleteUser(userId) {
        fetch('deleteUser.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${userId}`
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    fetchUsers();
                }
            })
            .catch(error => console.error('Error deleting user:', error));
}


function openModal(isEdit, userId = null) {
    const modal = document.getElementById('addUserModal'); // Assuming this is your modal's ID
    const form = document.getElementById('userForm'); // The form inside your modal
    const modalTitle = document.getElementById('modal-title'); // The title element inside your modal
    const userIdField = document.getElementById('userId'); // A hidden input field in your form to store the user's ID when editing

    // Reset the form fields to their default values
    form.reset();

    // Set the action attribute of the form based on whether you're adding or editing
    form.action = isEdit ? 'editUser.php' : 'addUser.php';

    // If editing, fetch the user's existing data and populate the form fields
    if (isEdit && userId) {
        fetch(`getUserData.php?id=${userId}`)
            .then(response => response.json())
            .then(data => {
                // Populate the form fields with the fetched user data
                document.getElementById('firstname').value = data.firstname;
                document.getElementById('lastname').value = data.lastname;
                document.getElementById('email').value = data.email;
                document.getElementById('address').value = data.address || '';
                document.getElementById('tel').value = data.tel || '';
                document.getElementById('lineid').value = data.lineid || '';
                userIdField.value = userId; // Store the user's ID in the hidden field

                modalTitle.textContent = 'Edit User'; // Update the modal title
            })
            .catch(error => console.error('Error:', error));
    } else {
        modalTitle.textContent = 'Add User'; // Update the modal title for adding
    }

    // Display the modal
    modal.classList.remove('hidden');
}

// This function is a utility to hide the modal, used in your cancel button's onclick handler or after successful form submission
function hideModal() {
    const modal = document.getElementById('addUserModal');
    modal.classList.add('hidden');
}


function confirmDeleteUser(userId) {
    if(confirm('Are you sure you want to delete this user?')) {
        deleteUser(userId);
        window.location.reload()
    }
}