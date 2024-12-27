document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const showRegister = document.getElementById("show-register");
    const showLogin = document.getElementById("show-login");

    // Show Register form
    showRegister.addEventListener("click", (event) => {
        event.preventDefault();
        loginForm.classList.add("hidden");
        registerForm.classList.remove("hidden");
    });

    // Show Login form
    showLogin.addEventListener("click", (event) => {
        event.preventDefault();
        registerForm.classList.add("hidden");
        loginForm.classList.remove("hidden");
    });
});


document.getElementById('login-form').addEventListener('submit', function (event) {
    event.preventDefault();
    const email = document.getElementById('loginEmail').value.trim();
    const password = document.getElementById('password').value.trim();

   console.log('test email');
   
   
        const emailPattern = /^[a-zA-Z][a-zA-Z0-9._-]*@[a-zA-Z]+\.[a-zA-Z]{2,}$/;
        res = emailPattern.test(email);

     if (!res) {
        alert('Please enter a valid email address.');
      
        return;
    }
    
    if (password === '') {
        alert('Password cannot be empty.');
     
    }

    this.submit();
   
});


document.getElementById('register-form').addEventListener('submit', function (event) {
  
    event.preventDefault();

    
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email-register').value.trim();
    const password = document.getElementById('password-register').value.trim();
    



    if (name === '') {
        alert('Name cannot be empty.');
       
        return;
    }

    if (!isValidEmail(email)) {
        alert('Please enter a valid email address.');
      
        return;
    }

    if (password === '') {
        alert('Password cannot be empty.');
        
        return;
    }


    this.submit();
});

function isValidEmail(email) {
    const emailPattern = /^[a-zA-Z][\w.-]*@[a-zA-Z]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
}
