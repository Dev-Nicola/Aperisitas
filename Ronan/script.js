
function NBplus(nom) {
    nb = document.getElementById(nom).value;
    nb++;
    document.getElementById(nom).value = nb;
    calcPrixTotal()
}

function NBmoins(nombre,nom,panier) {
    nb = document.getElementById(nombre).value;
    nb--;
    document.getElementById(nombre).value = nb;
    if (nb <= 0) {
        nb = 0;
        document.getElementById(nombre).value = "";
        if (panier == true) {
            vrai = confirm("Voulez vous suprimmer " + nom)
            if (vrai == true) {
                document.getElementById(nom).style.display = "none";
            }
            else {
                nb = 1;
                document.getElementById(nombre).value = nb;
            }
        }
    }
    calcPrixTotal()
}
var nomgout = ["Jambon", "High et Fines Herbes", "Salade Tomate Oignon", "Cacahuète"]
var tableauPrix = [5, 6.5, 5.5, 4];
    function calcPrixTotal() {
        lePrixTotal = 0;
            for (ii = 0; ii < 4; ii++) {
                quantiter = document.getElementById(nomgout[ii]);
                console.log("qt"+quantiter);
                if (quantiter != null) {
                    lePrixTotal += document.getElementById(nomgout[ii]).value * tableauPrix[ii];
                }
                console.log("prix total"+lePrixTotal);
            }
        document.getElementById("prixTotal").innerHTML = lePrixTotal;
    }
