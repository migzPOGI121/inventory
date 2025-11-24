document.getElementById("loginForm").addEventListener("submit", function(e){
    e.preventDefault();

    let user = document.getElementById("username").value;
    let pass = document.getElementById("password").value;

    fetch("auth/login.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `username=${user}&password=${pass}`
    })
    .then(res => res.text())
    .then(data => {
        if(data.includes("Invalid") || data.includes("error")){
            document.getElementById("error").innerText = "Invalid login credentials!";
        } else {
            window.location.href = "dashboard.php";
        }
    });
});
