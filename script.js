var i = 0;
var licznikOdpowiedzi = 0;

function dodajOtwarte()
{
    i++;
    document.getElementById("formularz").innerHTML = document.getElementById("formularz").innerHTML + '<form method="post"><div class="pole"><div class="row"><div class="col-sm-1" id="otwarta'+i+'">Pytanie'+i+'<br><input type="text" name="pytanie_otwarte"><br>Odpowiedź<br><input type="text" name="odp_otwarta" id="odp'+licznikOdpowiedzi+'"></form>'
}

function dodajZamkniete()
{
    i++;
    document.getElementById("formularz").innerHTML = document.getElementById("formularz").innerHTML + '<form method="post"><div class="pole"><div class="row"><div class="col-sm-1" id="zamknieta1'+i+'">Pytanie'+i+'<br><input type="text" name="pytanie_zamkniete"><br>Odpowiedź<input type=button value="+" onclick="dodajOdpowiedzJedno()"></form>'
}

function dodajZamkniete2()
{
    i++;
    document.getElementById("formularz").innerHTML = document.getElementById("formularz").innerHTML + '<form method="post"><div class="pole"><div class="row"><div class="col-sm-1" id="zamknieta2'+i+'">Pytanie'+i+'<br><input type="text name="multichoice""><br>Odpowiedź<input type=button value="+" onclick="dodajOdpowiedzWielo()"></form>'
}

function dodajOdpowiedzJedno()
{
    document.getElementById("zamknieta1"+i+"").innerHTML = document.getElementById("zamknieta1"+i+"").innerHTML + '<br><form method="post"><input type="text" name="odp_zamkniete"></form>'
}

function dodajOdpowiedzWielo()
{
    document.getElementById("zamknieta2"+i+"").innerHTML = document.getElementById("zamknieta2"+i+"").innerHTML + '<br><form method="post"><input type="text name="odp_multi""></form>'
}
