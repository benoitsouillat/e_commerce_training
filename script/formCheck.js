
formAddItem = document.getElementById("form_add_item");
formModifyItem = document.getElementById("form_modify_item");
formAddUser = document.getElementById("form_add_user");

regStr = new RegExp('[A-z]');
regNum = new RegExp('[0-9]');

if (formAddItem || formModifyItem) {
    form = Array.from(document.getElementsByTagName('form'));
    form.forEach(element => {
        element.addEventListener("submit", (e) => {
            articleName = document.getElementById("name").value;
            articlePrice = document.getElementById("price").value;
            articleDescription = document.getElementById("description").value;
            error = "";
            if (articleDescription.length <= 10) {
                error = "La description doit être plus longue pour définir l'article";
            }
            if (!regNum.test(articlePrice)) {
                error = "Merci d'écrire uniquement des chiffres pour définir le prix";
            }
            if (!articleDescription) {
                error = "Vous devez définir une description de l'article";
            }
            if (!articlePrice) {
                error = "Vous devez définir un prix";
            }
            if (!regStr.test(articleName)) {
                error = "Merci d'utiliser que des caractères normaux";
            }
            if (articleName.length <= 4) {
                error = "Le nom de l'article est trop petit";
            }
            if (error != "") {
                e.preventDefault();
                document.getElementById('error').innerHTML = error;
            }
        });
    });
}
if (formAddUser) {
    formAddUser.addEventListener("submit", (e) => {
        firstName = document.getElementById('firstname').value;
        lastName = document.getElementById('lastname').value;
        email = document.getElementById('email').value;
        emailVerification = document.getElementById('email-verification').value;
        error = "";

        if (!regStr.test(firstName) || !regStr.test(lastName)) {
            error = "Le nom et le prénom doivent être en caractère romains";
        }
        if (email != emailVerification) {
            error = "Les deux emails doivent être identiques";
        }
        if (firstName.length < 3 || lastName.length < 3) {
            error = "Les noms et prénoms ne peuvent être inférieur à trois caractères !";
        }
        if (error != "") {
            e.preventDefault();
            document.getElementById('error').innerHTML = error;
        }


    });
}
