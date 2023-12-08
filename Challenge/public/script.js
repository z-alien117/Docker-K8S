document.getElementById('createUserForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const age = document.getElementById('age').value;

    fetch('/users', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ name, email, age }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        // Optionally, clear the form fields
    })
    .catch((error) => {
        console.error('Error:', error);
    });
});

document.getElementById('loadUsers').addEventListener('click', function() {
    fetch('/users')
    .then(response => response.json())
    .then(data => {
        const usersList = document.getElementById('usersList');
        usersList.innerHTML = '';
        data.forEach(user => {
            const listItem = document.createElement('li');
            listItem.textContent = `${user.name} - ${user.email}`;
            usersList.appendChild(listItem);
        });
    })
    .catch((error) => {
        console.error('Error:', error);
    });
});
