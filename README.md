# RegEx

Objetivos:
Validar el documento llamado formulario.php con el uso de expresiones regulares, ésta validación debe
realizarse tanto en Javascript como en PHP. No se permite el uso de frameworks, ni en PHP, ni en Javascript.
Reglas de validación:
El formulario posee los siguientes campos que deberán respetar estos patrones:
Nombre y apellido:
 Obligatorio.
 Formado por letras (mayúsculas, minúsculas... indistinto) y espacios.
 No pueden llevar guiones, puntos, números ni caracteres raros
DNI:
 Obligatorio.
 Solo números y puntos.
 Debe ser un DNI argentino: XX.XXX.XXX
Fecha de Nacimiento:
 Obligatorio.
 Tres valores separados por barra ó guion.
 Debe representar día, mes y año.
 Es indistinto si tiene o no el cero adelante el dia y mes
Foto:
 Obligatorio.
Email:
 Optativo.
 Puede tener letras, guiones (medio y bajo) y números.
 Debe tener un solo arroba.
 Antes del arroba mínimo 3 caracteres. Puede tener puntos (como gmail)
 Después del arroba como mínimo un punto.
 Entre el arroba y el punto mínimo 3 caracteres.
 Después del último punto, entre dos y cuatro caracteres (.ar / .com / .info, por dar ejemplos).
Usuario:
 Optativo.
 Mínimo 4 caracteres.
 Todo en mayúsculas.
 No puede tener espacios, guiones, caracteres raros, ni números.
Clave:
 Optativo.
 Entre 3 y 15 caracteres.
 Letras, números y símbolos.
 Sin ningún espacio.
Calle:
 Optativo.
 Letras, números y guiones del medio.
Numero:
 Optativo.
 Si se completa, solo números.
 Como excepción puede decir S/N (sin número).
Piso:
 Optativo.
 Solo números.
 Como excepción puede decir S/N (sin número) o PB (planta baja).
Depto:
 Optativo.
 Si se completa deben ser números o 1 letra.
