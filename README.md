### Proyecto SILOCOM
##### Aplicación en Desarrollo

Como inicio, mencionaré algunos cambios que fueron aplicados al framework **CodeIgniter** para un mantenimiento más rápido y eficiente, es por ello, que por motivos de seguridad fue cambiado el nombre del directorio **applications** por **app** y **system** por **vendor**, además, se incluyo un directorio llamado **public** en donde se almacena todos los complementos de la aplicación con privilegios públicos.

Por otra parte, antes de utilizar la aplicación desde este repositorio es necesario cargar unos complementos utilizando el manejador de paquetes **Bower** para realizar la instalación de los siguientes paquetes: 

1. jQuery - `bower install jquery`.
2. Bootstrap - `bower install bootstrap`.
3. Open Sans FontFace - `bower install open-sans-fontface`.
4. DataTables Plugin - `bower install DataTables`.
5. Bootstrap Slider Plugin - `bower install seiyria-bootstrap-slider`.
6. Sweet Alert for Bootstrap - `bower install boostrap-sweetalert`.

Este proyecto esta desarrollado en el Framework **CodeIgniter** debido a que la curva de aprendizaje del mismo es más corta a diferencia de otros frameworks, posiblemente más adelante, se migre a algún framework más robusto como Symphony o Laravel.

Ademas, es necesario también crear un nuevo archivo y nomrarlo **.htaccess** en el directorio principal, ya que el proyecto utiliza unas reglas para la formación de URL's amigables.

```
RewriteEngine on
RewriteCond $1 !^(index\.php|public|robots\.txt)
RewriteRule ^(.*)$ index.php/$1 [L]
```

###### Licencia de Proyecto
Coming Soon

###### Screenshots
Coming Soon


Copyright (c) 2015 **Paloma Corona Huerta**