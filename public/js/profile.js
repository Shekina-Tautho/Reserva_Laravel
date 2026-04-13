function editField(boxId) {
    const box = document.getElementById(boxId);
    box.querySelector('.box-content').style.display = 'none';
    box.querySelector('.box-buttons').style.display = 'none';
    box.querySelector('.edit-form').style.display = 'block';
}

function cancelEdit(boxId) {
    const box = document.getElementById(boxId);
    box.querySelector('.edit-form').style.display = 'none';
    box.querySelector('.box-content').style.display = 'block';
    box.querySelector('.box-buttons').style.display = 'flex';
}

function saveEdit(boxId) {
    const box = document.getElementById(boxId);
    const firstInput = box.querySelector('.firstInput');
    if (!firstInput) {
        alert('Edit form not found. Please try again.');
        return;
    }
    const firstValue = firstInput.value.trim();
    const secondInput = box.querySelector('.secondInput');
    const secondValue = secondInput ? secondInput.value.trim() : '';
    let newText = '';
    let field = '';
    let value = '';

    if (boxId === 'nameBox' && firstValue && secondValue) {
        updateProfile('first_name', firstValue);
        updateProfile('last_name', secondValue);
        setTimeout(() => location.reload(), 500);
    } else if (boxId === 'phoneBox' && firstValue) {
        box.querySelector('.fieldText').textContent = firstValue;
        updateProfile('phone', firstValue);
    } else if (boxId === 'addressBox' && firstValue) {
        box.querySelector('.fieldText').textContent = firstValue;
        updateProfile('address', firstValue);
    } else {
        alert('Please fill in all required fields.');
        return;
    }
    cancelEdit(boxId);
}

function updateProfile(field, value) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_profile.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (!response.success) {
                alert(response.message);
            }
        }
    };
    xhr.send(`field=${encodeURIComponent(field)}&value=${encodeURIComponent(value)}`);
}

document.addEventListener('DOMContentLoaded', function() {
    const confirmDeleteBtn = document.getElementById('confirmDelete');
    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener('click', function() {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_account.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        window.location.href = 'login.php?message=Account deleted successfully.';
                    } else {
                        alert(response.message);
                    }
                }
            };
            xhr.send();
        });
    }
});
