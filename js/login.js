function generaLoginForm(loginerror = null) {
    let form = `
    <div class="login-form">
        <h1>Accedi</h1>
        <form action="#" method="POST">
            <p></p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Inserisci la tua email" required />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Inserisci la tua password" required />

            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="submit" class="login-btn">Accedi</button>
        </form>

        <div class="divider">OR</div>

        <button class="register-btn" onclick="window.location.href='registration.html';" >Registrati</button>
    </div>`;
    return form;
}

async function getLoginData() {
    const url = 'api-login.php';
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }
        const json = await response.json();
        console.log(json);
        if(json["logineseguito"]){
            console.log("accesso eseguito");
        }
        else{
            visualizzaLoginForm();
        }


    } catch (error) {
        console.log(error.message);
    }
}

const main = document.querySelector("main");
getLoginData();  


function visualizzaLoginForm() {
    // Utente NON loggato
    let form = generaLoginForm();
    main.innerHTML = form;
    // Gestisco tentativo di login
    document.querySelector("main form").addEventListener("submit", function (event) {
        event.preventDefault();
        const username = document.querySelector("#username").value;
        const password = document.querySelector("#password").value;
        login(username, password);
    });
}

async function login(username, password) {
    const url = 'api-login.php';
    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);
    try {

        const response = await fetch(url, {
            method: "POST",                   
            body: formData
        });

        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }
        const json = await response.json();
        if(json["logineseguito"]){
            document.querySelector("form > p").innerText = "login successful";
        }
        else{
            document.querySelector("form > p").innerText = json["errorelogin"];
        }


    } catch (error) {
        console.log(error.message);
    }
}