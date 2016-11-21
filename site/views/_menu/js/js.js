$(document).ready(function(){


$(document).on("change","#nav",function(){

$("#muestra_nav").css("background-color","#"+this.value);

});
$(document).on("change","#header",function(){

$("#muestra_header").css("background-color","#"+this.value);

});
$(document).on("change","#header-letra-border",function(){

$("#muestra_header").css("color","#"+this.value);
$("#muestra_header").css("border-color","#"+this.value);

});
$(document).on("change","#titulos",function(){

$("#muestra_titulos").css("background-color","#"+this.value);

});

$(document).on("change","#titulo-letra-border",function(){

$("#muestra_titulos").css("color","#"+this.value);
$("#muestra_titulos").css("border-color","#"+this.value);

});
$(document).on("change","#piee",function(){

$("#muestra_pie").css("background-color","#"+this.value);

});
$(document).on("change","#pie-letra-border",function(){

$("#muestra_pie").css("color","#"+this.value);
$("#muestra_pie").css("border-color","#"+this.value);

});
$(document).on("change","#fondo",function(){

$("#color_aplicacion").css("background-color","#"+this.value);

});
$(document).on("change","#ancho_header",function(){

$(".header-content").css("min-height",this.value+"px");

});
$(document).on("change","#permisos_ch",function(){

console.log("menu--"+this.dataset.menu);
console.log("rol--"+this.dataset.rol);
console.log(this.checked);


$.get(base_url+"_menu/permisos_ch",{

'menu'        : this.dataset.menu,
'rol'         : this.dataset.rol,
'estado'      : this.checked

});



});





$(document).on("click","#cambiar_color",function(){


$.get(base_url+"_menu/estilos",{

'nav'                  : $('#nav').val(),
'letra_nav'            : $('#letra_nav').val(),
'letra_nav_principal'  : $('#letra_nav_principal').val(),
'letra_nav_hover'      : $('#letra_nav_hover').val(),
'header'               : $('#header').val(),
'header-letra-border'  : $('#header-letra-border').val(),
'titulos'              : $('#titulos').val(),
'titulo-letra-border'  : $('#titulo-letra-border').val(),
'pie'                  : $('#piee').val(),
'pie-letra-border'     : $('#pie-letra-border').val(),
'fondo'                : $('#fondo').val(),
'ancho_header'              : $('#ancho_header').val()
});


});






});