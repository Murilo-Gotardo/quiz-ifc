porcentagem = 0


var c1 = document.getElementById("c1")

c1.addEventListener("click", certo1);

function certo1(){
    c1.removeEventListener("click", certo1);
    porcentagem = porcentagem + 1
    document.getElementById("porcentagem").innerText =  (`Acertos: ${porcentagem}/10`)
}

var c2 = document.getElementById("c2")

c2.addEventListener("click", certo2);

function certo2(){
    c2.removeEventListener("click", certo2);
    porcentagem = porcentagem + 1
    document.getElementById("porcentagem").innerText =  (`Acertos: ${porcentagem}/10`)
}

var c3 = document.getElementById("c3")

c3.addEventListener("click", certo3);

function certo3(){
    c3.removeEventListener("click", certo3);
    porcentagem = porcentagem + 1
    document.getElementById("porcentagem").innerText =  (`Acertos: ${porcentagem}/10`)
}

var c4 = document.getElementById("c4")

c4.addEventListener("click", certo4);

function certo4(){
    c4.removeEventListener("click", certo4);
    porcentagem = porcentagem + 1
    document.getElementById("porcentagem").innerText =  (`Acertos: ${porcentagem}/10`)
}

var c5 = document.getElementById("c5")

c5.addEventListener("click", certo5);

function certo5(){
    c5.removeEventListener("click", certo5);
    porcentagem = porcentagem + 1
    document.getElementById("porcentagem").innerText =  (`Acertos: ${porcentagem}/10`)
}

var c6 = document.getElementById("c6")

c6.addEventListener("click", certo6);

function certo6(){
    c6.removeEventListener("click", certo6);
    porcentagem = porcentagem + 1
    document.getElementById("porcentagem").innerText =  (`Acertos: ${porcentagem}/10`)
}

var c7 = document.getElementById("c7")

c7.addEventListener("click", certo7);

function certo7(){
    c7.removeEventListener("click", certo7);
    porcentagem = porcentagem + 1
    document.getElementById("porcentagem").innerText =  (`Acertos: ${porcentagem}/10`)
}

var c8 = document.getElementById("c8")

c8.addEventListener("click", certo8);

function certo8(){
    c8.removeEventListener("click", certo8);
    porcentagem = porcentagem + 1
    document.getElementById("porcentagem").innerText =  (`Acertos: ${porcentagem}/10`)
}

var c9 = document.getElementById("c9")

c9.addEventListener("click", certo9);

function certo9(){
    c9.removeEventListener("click", certo9);
    porcentagem = porcentagem + 1
    document.getElementById("porcentagem").innerText =  (`Acertos: ${porcentagem}/10`)
}

var c10 = document.getElementById("c10")

c10.addEventListener("click", certo10);

function certo10(){
    c10.removeEventListener("click", certo10);
    porcentagem = porcentagem + 1
    document.getElementById("porcentagem").innerText =  (`Acertos: ${porcentagem}/10`)
}

var progresso = 0

function iniciar(){
    setTimeout(function() {
    document.getElementById("pontos").style.opacity="100%"
    document.getElementById("tempo1").style.width="100%"
}, 400)
    document.getElementById("inicio").style.opacity="0"
    document.getElementById("questoes").style.left="15.85vw"
    setTimeout(proximo1, 25000)
    document.getElementById("progresso1").style.opacity="100%"
}


document.getElementById('box-1').style.left="0"


function proximo1(){
    setTimeout(function(){
        c1.removeEventListener("click", certo1);
    },10)
    setTimeout(function(){
        document.getElementById("tempo1").style.opacity="0"
        document.getElementById("tempo1").style.transition="2s"
        setTimeout(function() {
            document.getElementById("tempo2").style.width="100%"
        }, 3000)

        document.getElementById("c1").style.backgroundColor="green"
        document.getElementById("progresso2").style.opacity="100%"
        setTimeout(function() {
            document.getElementById('box-1').style.left="-400vh"
            document.getElementById('box-1').style.opacity="0"
            document.getElementById('box-2').style.left="0"
            setTimeout(proximo2, 25000)
        }, 2500)
    },200)

}

function proximo2(){
    setTimeout(function(){
        c2.removeEventListener("click", certo2);
    },10)
    document.getElementById("tempo2").style.opacity="0"
    document.getElementById("tempo2").style.transition="2s"
    setTimeout(function() {
        document.getElementById("tempo3").style.width="100%"
    }, 3000)

    document.getElementById("c2").style.backgroundColor="green"
    document.getElementById("progresso3").style.opacity="100%"

    setTimeout(function() {
        document.getElementById('box-2').style.left="-400vh"
        document.getElementById('box-2').style.opacity="0"
        document.getElementById('box-3').style.left="0"
        setTimeout(proximo3, 25000)
    }, 2500)
}



function proximo3(){
    setTimeout(function(){
        c3.removeEventListener("click", certo3);
    },10)
    document.getElementById("tempo3").style.opacity="0"
    document.getElementById("tempo3").style.transition="2s"
    setTimeout(function() {
        document.getElementById("tempo4").style.width="100%"
    }, 3000)

    document.getElementById("c3").style.backgroundColor="green"
    document.getElementById("progresso4").style.opacity="100%"
    setTimeout(function() {
        document.getElementById('box-3').style.left="-400vh"
        document.getElementById('box-3').style.opacity="0"
        document.getElementById('box-4').style.left="0"
        setTimeout(proximo4, 25000)
    }, 2500)
}

function proximo4(){
    setTimeout(function(){
        c4.removeEventListener("click", certo4);
    },10)
    document.getElementById("tempo4").style.opacity="0"
    document.getElementById("tempo4").style.transition="2s"
    setTimeout(function() {
        document.getElementById("tempo5").style.width="100%"
    }, 3000)

    document.getElementById("c4").style.backgroundColor="green"
    document.getElementById("progresso5").style.opacity="100%"
    setTimeout(function() {
        document.getElementById('box-4').style.left="-400vh"
        document.getElementById('box-4').style.opacity="0"
        document.getElementById('box-5').style.left="0"
        setTimeout(proximo5, 25000)
    }, 2500)

}

function proximo5(){
    setTimeout(function(){
        c5.removeEventListener("click", certo5);
    },10)
    document.getElementById("tempo5").style.opacity="0"
    document.getElementById("tempo5").style.transition="2s"
    setTimeout(function() {
        document.getElementById("tempo6").style.width="100%"
    }, 3000)

    document.getElementById("c5").style.backgroundColor="green"
    document.getElementById("progresso6").style.opacity="100%"
    setTimeout(function() {
        document.getElementById('box-5').style.right="400vh"
        document.getElementById('box-5').style.opacity="0"
        document.getElementById('box-6').style.left="0"
        setTimeout(proximo6, 25000)
    }, 2500)

}

function proximo6(){
    setTimeout(function(){
        c6.removeEventListener("click", certo6);
    },10)
    document.getElementById("tempo6").style.opacity="0"
    document.getElementById("tempo6").style.transition="2s"
    setTimeout(function() {
        document.getElementById("tempo7").style.width="100%"
    }, 3000)

    document.getElementById("c6").style.backgroundColor="green"
    document.getElementById("progresso7").style.opacity="100%"
    setTimeout(function() {
        document.getElementById('box-6').style.right="400vh"
        document.getElementById('box-6').style.opacity="0"
        document.getElementById('box-7').style.left="0"
        setTimeout(proximo7, 25000)
    }, 2500)

}


function proximo7(){
    setTimeout(function(){
        c7.removeEventListener("click", certo7);
    },10)
    document.getElementById("tempo7").style.opacity="0"
    document.getElementById("tempo7").style.transition="2s"
    setTimeout(function() {
        document.getElementById("tempo8").style.width="100%"
    }, 3000)

    document.getElementById("c7").style.backgroundColor="green"
    document.getElementById("progresso8").style.opacity="100%"
    setTimeout(function() {
        document.getElementById('box-7').style.right="400vh"
        document.getElementById('box-7').style.opacity="0"
        document.getElementById('box-8').style.left="0"
        setTimeout(proximo8, 25000)
    }, 2500)

}

function proximo8(){
    setTimeout(function(){
        c8.removeEventListener("click", certo8);
    },10)
    document.getElementById("tempo8").style.opacity="0"
    document.getElementById("tempo8").style.transition="2s"
    setTimeout(function() {
        document.getElementById("tempo9").style.width="100%"
    }, 3000)

    document.getElementById("c8").style.backgroundColor="green"
    document.getElementById("progresso9").style.opacity="100%"
    setTimeout(function() {
        document.getElementById('box-8').style.right="400vh"
        document.getElementById('box-8').style.opacity="0"
        document.getElementById('box-9').style.left="0"
        setTimeout(proximo9, 25000)
    }, 2500)

}

function proximo9(){
    setTimeout(function(){
        c9.removeEventListener("click", certo9);
    },10)
    document.getElementById("tempo9").style.opacity="0"
    document.getElementById("tempo9").style.transition="2s"
    setTimeout(function() {
        document.getElementById("tempo10").style.width="100%"
    }, 3000)

    document.getElementById("c9").style.backgroundColor="green"
    document.getElementById("progresso10").style.opacity="100%"
    setTimeout(function() {
        document.getElementById('box-9').style.right="400vh"
        document.getElementById('box-9').style.opacity="0"
        document.getElementById('box-10').style.left="0"
        setTimeout(proximo10, 25000)
    }, 2500)

}

var acertos = document.getElementById("acertos")

function proximo10(){
    setTimeout(function(){
        c10.removeEventListener("click", certo10);
    },10)
    document.getElementById("tempo10").style.opacity="0"
    document.getElementById("tempo10").style.transition="2s"
    document.getElementById("pontos").style.opacity="0%"
    document.getElementById("c10").style.backgroundColor="green"
    setTimeout(function(){
        document.getElementById("obrigado").style.left="70vh"
        document.getElementById("obrigado").style.transition="1.5s"
    },2700)
    setTimeout(function() {
        document.getElementById('questoes').style.opacity="0"
        document.getElementById('progresso').style.opacity="0"
        document.getElementById('progresso').style.transition="1s"
    }, 2500)

    acertos.innerHTML = `<h1 id="acertos">Você acertou ${porcentagem}0%<br>das questões</h1>`
}


