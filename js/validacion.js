function tn(p,e,n){
	if(!isNaN(n)){
		return p.getElementsByTagName(e)[n];
	}
	return p.getElementsByTagName(e);
}
function id(e){
	return document.getElementById(e);
}
function ce(e){
	return document.createElement(e);
}
function ac(p,e){
	return p.appendChild(e);
}
function rc(p,e){
	return p.removeChild(e);
}
function txt(s){
	return document.createTextNode(s);
}
function opacidad(t){
	t.style.opacity='0.1';
	setTimeout(function () {
	t.style.opacity='1';
	}, 200);
}
function validar(e){
	switch(e.name){
					case 'nombre': case 'apellido':
						if(!nombre_apellido(e.value)){
							if(!e.value==''){
								var tx=txt('Solo puede poseer letras y espacios');				
							}
						}
					break;
					case 'dni':
						if(!dni_f(e.value)){
							if(!e.value==''){
								var tx=txt('El DNI debe contener el formato correcto. XX.XXX.XX');
							}
						}
					break;
					case 'fecha':
						if(!fecha_f(e.value)){
							if(!e.value==''){
								var tx=txt('La fecha debe ser valida. Separada por barra o guión');
							}
						}
					break;
					case 'foto':
						if(!foto_f(e.value)){
							if(!e.value==''){
								var tx=txt('El formato debe ser PNG o JPG');
							}
						}
					break;
					case 'email':
						if(!email_f(e.value)){
							var tx=txt('el email es invalido.');
						}
					break;
					case 'usuario':
						if(!usuario_f(e.value)){
							var tx=txt('Solo puede contener MAYUSCULAS. Minimo 4 letras');
						}
					break;
					case 'clave':
						if(!clave_f(e.value)){
							var tx=txt('Minimo 3 caracteres, máximo 15. Sin espacios.');
						}
					break;
					case 'calle':
						if(!calle_f(e.value)){
							var tx=txt('Solo letras, números y guión del medio.');
						}
					break;
					case 'numero':
						if(!numero_f(e.value)){
							var tx=txt('Solo números o S/N (sin número).');
						}
					break;
					case 'piso':
						if(!piso_f(e.value)){
							var tx=txt('Solo números o S/N (sin número) o PB (planta baja)');
						}
					break;
					case 'depto':
						if(!depto_f(e.value)){
							var tx=txt('Solo una letra o números.');
						}
				}
				if(tx){
					e.style.border='solid red 1px';
					var p=tn(e.parentNode,'p',0);
					if(p==undefined){
						p=ce('p');
						ac(p,tx);
						opacidad(p);
						ac(e.parentNode,p);
					}
				}
				else{
					e.style.border='1px solid #aaa';
					var p=tn(e.parentNode,'p',0);
					if(p!=undefined){
						rc(p.parentNode,p);
					}
				}
}
var inputs=[];
var nombre=id('nombre');
inputs.push(nombre);
var apellido=id('apellido');
inputs.push(apellido);
var dni=id('dni');
inputs.push(dni);
var fecha=id('fecha');
inputs.push(fecha);
var foto=id('foto');
inputs.push(foto);
var email=id('email');
inputs.push(email);
var usuario=id('usuario');
inputs.push(usuario);
var clave=id('clave');
inputs.push(clave);
var calle=id('calle');
inputs.push(calle);
var numero=id('numero');
inputs.push(numero);
var piso=id('piso');
inputs.push(piso);
var depto=id('depto');
inputs.push(depto);
for(var i=0;i<inputs.length;i++){
	inputs[i].onblur=function(){
		validar(this);
	}
}









	