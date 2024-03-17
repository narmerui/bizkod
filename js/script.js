document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting in the traditional way

    // Collect form data
    const userData = {
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
        phone: document.getElementById('phone').value,
        gender: document.getElementById('gender').value,
        date_of_birth: document.getElementById('date_of_birth').value,
        name: document.getElementById('name').value,
        surname: document.getElementById('surname').value,
        university: document.getElementById('university').value,
    };

    // Call the registerUser function
    registerUser(userData)
        .then(data => alert('User registered successfully!'))
        .catch(error => alert(`Failed to register user: ${error}`));
});

async function registerUser(userData) {
    const apiUrl = 'api/sign_up_api_fs.php'; // Change to your actual API URL

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(userData),
        });

        if (!response.ok) {
            // If the server response was not OK, throw an error with the status
            throw new Error(`Error: ${response.status}`);
        }

        const data = await response.json(); // Assuming the response is JSON
        console.log('Registration successful:', data);
        return data;
    } catch (error) {
        console.error('Registration failed:', error);
        throw error; // Rethrow to let the caller handle it
    }
}

registerUser(userData)
    .then(data => console.log('User registered successfully:', data))
    .catch(error => console.error('Failed to register user:', error));
