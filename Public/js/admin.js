$(document).ready(function() {
	$(".sidebar-menu ul.menu-dropdown").hide(); 

  	$(".sidebar-menu a.has-dropdown").click( function () {
        // Si le sous-menu était déjà ouvert, on le referme :
        if ($(this).next("ul.menu-dropdown:visible").length != 0) {
            $(this).next("ul.menu-dropdown").slideUp("normal");
        }
        // Si le sous-menu est caché, on ferme les autres et on l'affiche :
        else {
            $(".sidebar-menu ul.menu-dropdown").slideUp("normal");
            $(this).next("ul.menu-dropdown").slideDown("normal");
        }
        // On empêche le navigateur de suivre le lien :
        return false;
    });

    if (document.querySelector('#color')) {
        const span = document.querySelector('#color')
        const color = document.querySelector('#lol')
        const inputColor = document.querySelector('#inputColor')
        if (inputColor.value) {
            color.style.color = inputColor.value
            inputColor.value = inputColor.value
        } else {
            color.style.color = "#000000"
            inputColor.value = "#000000"
        }
        span.addEventListener('click', (e) => {
            e.preventDefault()
            var input = document.createElement("input")
            input.type = "color"

            input.click()

            input.addEventListener('change' , () => {
                
                color.style.color = input.value
                inputColor.value = input.value
            })
        })
    }
    if (document.querySelector('#inputColor')) {
        const colorIn = document.querySelector('#inputColor')
        colorIn.addEventListener('change',() => {
            const colors = document.querySelector('#lol')
            colors.style.color = colorIn.value
        })
        colorIn.addEventListener('mouseup',() => {
            const colors = document.querySelector('#lol')
            colors.style.color = colorIn.value
        })
        colorIn.addEventListener('keyup',(e) => {
            const colors = document.querySelector('#lol')
            colors.style.color = colorIn.value
        })
    }

    var wbbOpt = {
        buttons: "bold,italic,underline,|,justifyleft,bullist,justifycenter,justifyright,|,img,link,|,code,quote",
        allButtons: {
            code: {
                transform: {
                '<div class="quote">{SELTEXT}</div>':'[code]{SELTEXT}[/code]',
                '<div class="quote"><cite>{AUTHOR} wrote:</cite>{SELTEXT}</div>':'[code={AUTHOR}]{SELTEXT}[/code]'
                }
            }
        }
    }
    $("#text-editor").css("height","150px");
    $("#text-editor").wysibb(wbbOpt);

    $( "#inputCreated" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
});

