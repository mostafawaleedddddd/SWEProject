function openAddUserModal() {
    document.getElementById('addUserModal').style.display = 'block';
}

function closeAddUserModal() {
    document.getElementById('addUserModal').style.display = 'none';
}

function editUser() {
    alert('Edit user functionality coming soon!');
}

function deleteUser() {
    if (confirm('Are you sure you want to delete this user?')) {
        alert('User deleted!');
    }
}
