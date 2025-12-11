## Tecnologias usadas en el despliegue

* PHP 8.2 con apache para la generacion de chistes y la gestion de la encuesta

* MYSQL 8.0 para la persistencia 

* nginx alpine como proxy intermedio


## Pasos que he seguido

Identifique que servicios necesitaba, al tener 2 diferentes dominios, (uno para la encuesta y otro para la generacion de chistes, los cuales he agregado a el fichero hosts de windows a la ip 127.0.0.1), he hecho un fichero php para cada uno.

Para la persistencia de los votos de la encuesta, he creado una pequeña base de datos con un fichero init.sql.

Y elegi nginx alpine para el proxy ya que lo habia usado anteriormente en clase y tenia un claro ejemplo de como aplicarlo

--- 
 
He creado los archivos php, que con la practica anterior de de nginx la mayorida ha sido copiar y pegar, cambiando los datos de la conexion PDO y alguna cosa mas.

Despues he hecho el init.sql, que crea una base de datos con una tabla donde guardo un atributo voto en texto.

---

Despues he creado los Dockerfile de los servicios php, que son los mismos para ambos por lo que realmente podria haber hecho solo uno.

Y finalmente he hecho el Dockerfile de la base de datos, en la que copio el init.sql dentro del contenedor para que se cree la base de datos.

--- 

Ahora he creado el fichero docker-compose.yml para la orquestacion de los servicios.

Como necesitaba 3 diferentes servicios para la encuesta, los he llamado encuesta1, encuesta2 y encuesta3, para luego en el fichero de configuracion de nginx unirlos y hacer el balanceo de carga.

Despues he realizado el servicio de los chistes, los dos servicios php los he creado con volumenes, para no tener que cargarme los contenedores y crearlos otra vez cada vez que quiera cambiar el codigo.

El servicio de la base de datos que simplemente tiene contexto para su Dockerfile y por ultimo hago el servicio de nginx alpine, el cual le creo un volumen para su fichero de configuracion.

---

Por ultimo, para hacer el fichero de configuracion de nginx me he basado en el que hicimos un dia en clase para tener varios servicios en un solo dominio, y en upstream he puesto los servicios de encuesta y su balanceo de carga.


## Despliegue final

Para desplegar finalmente la aplicacion se necesita tener docker y docker compose instalado.

En la raiz de estas carpetas, donde se encuentra el fichero docker-compose.yml se ejecuta el comando:

docker-compose up -d --build

Tendriamos funcionando en el puerto 80:

www.chiquito.com            servicio de chiste aleatorio

www.freedomforLinares.com   servicio de encuesta

Para mostrar el balanceo de carga, muestro la ip del servidor en la pagina de encuesta, si recargamos varias veces vemos que el 60% de las veces nos dara una ip, el 20% otra distinta, y el otro 20% otra diferente a las anteriores.