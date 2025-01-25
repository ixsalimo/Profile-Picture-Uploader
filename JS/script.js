document
    .querySelector("input[type='file']")
    .addEventListener("change" , e => {

        document
            .getElementById("profile").src = URL.createObjectURL(e.target.files[0]);

        document
            .getElementById("file-name").textContent = e.target.files[0].name;

    });

document
    .querySelector("button[type='reset']")
    .addEventListener("click" , () => {

        document
            .getElementById("profile").src = "default.jpg";

        document
            .getElementById("file-name").textContent = "- Choose Your Profile -";

    });