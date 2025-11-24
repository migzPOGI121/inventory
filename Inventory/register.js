document.getElementById("registerForm").addEventListener("submit", function(e){
    const username = document.getElementById("username").value.trim();
    const email    = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    // Simple frontend validation
    if(username === "" || email === "" || password === ""){
        alert("Please fill in all fields!");
        e.preventDefault();
        return;
    }

    if(password.length < 6){
        alert("Password must be at least 6 characters long.");
        e.preventDefault();
        return;
    }
});
